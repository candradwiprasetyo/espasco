<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");

$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':
		
		$first_building_id = get_first_building_id();
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id; 
		$building_name = get_building_name($building_id);
		$building_img = get_building_img($building_id);
		$query_table_merger = select_table_merger($building_id, '');
		
		//get_header2($title);
		
		//$query = select();
		$action_room = "order.php?page=save_room";
		$action_table = "order.php?page=save_table&building_id=$building_id";
		$action_logout = "logout.php";
		
		//$building_next();
		//$building_prev();

		include '../views/order/list.php';
		//get_footer();
	break;
	
	case 'save_table_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];
		
		save_table_location($id, $data_x, $data_y);
		
	
	break;
	
	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: order.php');
	break;
	
	case 'save_table':
		$building_id = $_GET['building_id'];
		$table_name = $_POST['i_table_name'];
		$data = "'',
				'$building_id',
				'".$table_name."',
				'200',
				'200'
				";
		save_table($data);
		header("location: order.php?building_id=$building_id");
	break;
	
	case 'save_payment':
		
		$i_payment = $_GET['i_payment'];
		$i_change = 0;
	
		$table_id = $_GET['table_id'];
		// $building_id = $_GET['building_id'];
		
		$data_total = get_data_total($table_id);
		$total_discount = get_total_discount($table_id);
		
		// echo $i_payment.'-'.$data_total;
		
		if($i_payment < $data_total){
			header("location: payment.php?table_id=$table_id&err=1");
		}else{
		
		$query =  mysqli_query($mysqli, "select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
								
		
		
		// simpan transaksi
		while($row = mysqli_fetch_array($query)){
			
			// create settlement
			
			$get_discount_type = get_discount_type($row['member_id']);
			
			if($total_discount > 0 && $get_discount_type == 2){
				update_settlement($total_discount, $row['member_id']);
			}
			
			$data = "'',
					'$table_id',
					'".$row['member_id']."',
					'".$row['transaction_date']."', 
					'".$data_total."',
					'".$i_payment."',
					'".$i_change."'
			";
			create_config("transactions", $data);
			$transaction_id = mysqli_insert_id($mysqli);
			
			
			
			$query_detail =  mysqli_query($mysqli, "select * 
								from transaction_tmp_details a
								where a.transaction_id = '".$row['transaction_id']."'
								");
			while($row_detail = mysqli_fetch_array($query_detail)){
				
				// simpan transaksi detail
				$data_detail = "'',
									'$transaction_id',
									'".$row_detail['menu_id']."',
									'".$row_detail['transaction_detail_original_price']."',
									'".$row_detail['transaction_detail_margin_price']."',
									'".$row_detail['transaction_detail_price']."',
									'".$row_detail['transaction_detail_price_discount']."',
									'".$row_detail['transaction_detail_grand_price']."',
									'".$row_detail['transaction_detail_qty']."',
									'".$row_detail['transaction_detail_total']."'
									";
					create_config("transaction_details", $data_detail);
			}
			
			delete_tmp($table_id);
			
		}
		
		//include '../views/order/print.php';
		
		header("location: transaction.php?success=1");
		}
		
		
	break;
	
	case 'cancel_order':
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];
		
		
		cancel_order($table_id);
		header("location: order.php?building_id=$building_id");
	break;
	
	case 'merger_table':
		
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		$building_name = get_building_name($building_id);
		$query_table_merger = select_table_merger($building_id, $table_id);
		$query_exist = mysqli_query($mysqli, "select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."'");
		$row_exist = mysqli_fetch_array($query_exist);
		$jumlah_child = $row_exist['jumlah'];

		$action = "order.php?page=save_merger_table&table_id=".$table_id."&building_id=".$building_id;
		$delete_merger_action = "order.php?page=delete_all_merger&table_id=".$table_id."&building_id=".$building_id;
		$close_button = "order.php?building_id=$building_id";
		
		include '../views/order/merger_table.php';
		
	break;
	
	case 'delete_all_merger':
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		// update status merger si parent
		update_merger_status($table_id, 0);
		
		// looping childnya
		$query = mysqli_query($mysqli, "select * from table_mergers where table_parent_id = '$table_id'");
		while($row = mysqli_fetch_array($query)){
			// update status merger si child
			update_merger_status($row['table_id'], 0);
		}
		delete_merger_table($table_id);
		header("location: order.php?building_id=$building_id");
		
	break;
	
	case 'save_merger_table':
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		
		delete_merger_table($table_id);
		update_merger_status($table_id, 1);
		
		$query_table_merger = select_table_merger($building_id, $table_id);
		while($row = mysqli_fetch_array($query_table_merger)){
			
			if($row['tms_id']==0){
					update_merger_status($row['table_id'], 0);
					
					if($_POST['i_table_id_'.$row['table_id']] == 1){
						$data = "'',
							'$table_id',
							'".$row['table_id']."'
							";
						save_merger_table($data);
						update_merger_status($row['table_id'], 2);
					}
			}else{
				// cek apakah child sendiri ?
				$query_exist = mysqli_query($mysqli, "select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."' and table_id = '".$row['table_id']."'");
				$row_exist = mysqli_fetch_array($query_exist);
													// jika ya tampilkan
				if($row_exist['jumlah'] > 0){
					
					update_merger_status($row['table_id'], 0);
					
					if($_POST['i_table_id_'.$row['table_id']] == 1){
						$data = "'',
							'$table_id',
							'".$row['table_id']."'
							";
						save_merger_table($data);
						update_merger_status($row['table_id'], 2);
					}
				}
			}
		}
		header("location: order.php?building_id=$building_id");
	break;
	
	
}

?>