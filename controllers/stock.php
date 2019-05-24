<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/stock_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Stock Counter");

$_SESSION['menu_active'] = 8;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();

		$action = "stock.php?page=save";

		include '../views/stock/list.php';
		get_footer();
	break;

	case 'save':

		// extract($_POST);

		$query = select();
		while($row = mysqli_fetch_array($query)){

			$stock = $_POST['i_stock_'.$row['menu_id']];
			$table_id = $_POST['i_table_id'];
			$id = $row['menu_id'];
			$date = date('Y-m-d H:i:s');

			$stok_gudang = get_stock_gudang($row['menu_id']);

			if ($stok_gudang >= $stock && ($stock != 0)) {
				$new_stock = $stok_gudang - $stock;
				$data = " menu_stock = '$new_stock'";
				update($data, $row['menu_id']);

				$data_stock = " '',
						'$id',
						'$date',
						'$stok_gudang',
						'$stock',
						'$new_stock',
						'2',
						'$table_id'
					 ";
	
				update_stock($data_stock);

			} else {
				header('Location: stock.php?page=list&err=1');
			}
			

			
		}
		
		
	break;
}

?>