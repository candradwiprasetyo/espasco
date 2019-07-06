<?php

function select_detail($date1, $date2){
	global $mysqli;	
	$query = mysqli_query($mysqli, "SELECT a.menu_id , a.menu_price, a.menu_name, b.jumlah, jumlah_dasar, jumlah_omset, c.partner_name
								FROM menus a
								join menu_types z on z.menu_type_id = a.menu_type_id
								JOIN (
								
									SELECT 	sum( transaction_detail_qty ) AS jumlah,
											sum( transaction_detail_qty * transaction_detail_original_price ) AS jumlah_dasar, 
											sum( transaction_detail_qty * transaction_detail_price ) AS jumlah_omset, 
											menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								join partners c on c.partner_id = a.partner_id
								order by z.menu_type_id, menu_name desc
						");
	
	return $query;
}

function select_transaction($date1, $date2){
	global $mysqli;
	$query = mysqli_query($mysqli, "select b.*, c.table_name, d.building_name 
									from transactions b 
									left join tables c on c.table_id = b.table_id
									left join buildings d on d.building_id = c.building_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									order by transaction_id
						");
	
	return $query;
}

function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT a.*, b.unit_name, c.transaction_type_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN transaction_types c on c.transaction_type_id = a.transaction_type_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}

function get_jumlah_penjualan($date1, $date2){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT count(transaction_id) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1 00:00:00'
							AND transaction_date <= '$date2 23:59:59'
							 ");
	$result = mysqli_fetch_object($query);
	return $result->jumlah;
}

function get_total_penjualan($date1, $date2){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1 00:00:00'
							AND transaction_date <= '$date2 23:59:59'
							 ");
	$result = mysqli_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0"; 
	return $result;
}

function get_menu_terlaris($date1, $date2){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								limit 1
								
							 ");
	$result = mysqli_fetch_array($query);
	$result = ($result['menu_name']) ? $result['menu_name'] : "-"; 
	return $result;
}

function select_partner($date1, $date2){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT a.partner_id, a.partner_name, jumlah_qty, jumlah_margin, jumlah_original, jumlah_omset
								FROM partners a
								JOIN (
								
									SELECT sum(transaction_detail_qty) as jumlah_qty, 
											sum(transaction_detail_qty * transaction_detail_margin_price ) AS jumlah_margin, 
											sum(transaction_detail_qty * transaction_detail_original_price ) AS jumlah_original,
											sum(transaction_detail_qty * transaction_detail_price ) AS jumlah_omset,
											partner_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									JOIN menus c on c.menu_id = a.menu_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									AND partner_id <> 1
									GROUP BY partner_id
								) AS b ON b.partner_id = a.partner_id
							
									
								");
	
	return $query;
}


function delete_transaction($transaction_id){
		global $mysqli;
		mysqli_query($mysqli, "delete from transaction_details where transaction_id = '".$transaction_id."'");	
		
		mysqli_query($mysqli, "delete from transactions where transaction_id = '$transaction_id'");
}

function get_total_dasar($date1, $date2, $partner_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								limit 1
								
							 ");
	$result = mysqli_fetch_array($query);
	$result = ($result['menu_name']) ? $result['menu_name'] : "-"; 
	return $result;
}

function select_menu(){
	global $mysqli;	
	$query = mysqli_query($mysqli, "SELECT *, b.menu_type_name
								FROM menus a
								join menu_types b on b.menu_type_id = a.menu_type_id
								order by b.menu_type_id, menu_name
						");
	
	return $query;
}

function get_stock_counter($menu_id, $date) {
	global $mysqli;
	$query = mysqli_query($mysqli, "
									SELECT sum( stock_amount ) AS jumlah
									FROM stocks a
									WHERE  a.stock_date >= '$date 00:00:00'
									AND a.stock_date <= '$date 23:59:59'
									and stock_type = 2
									and menu_id = '$menu_id'
							 ");
	$result = mysqli_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : 0; 
	return $result;
}

function get_stock_counter_yesterday($menu_id, $date) {
	global $mysqli;
	$query = mysqli_query($mysqli, "
									SELECT sum( stock_amount ) AS jumlah
									FROM stocks a
									WHERE  a.stock_date >= '2019-05-24 00:00:00'
									AND a.stock_date <= '$date 23:59:59'
									and stock_type = 2
									and menu_id = '$menu_id'
							 ");
	$result = mysqli_fetch_array($query);
	$stock_yesterday = ($result['jumlah']) ? $result['jumlah'] : 0; 

	$query_terjual = mysqli_query($mysqli, "
									SELECT 	sum( transaction_detail_qty ) AS jumlah
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '2019-05-24 00:00:00'
									AND b.transaction_date <= '$date 23:59:59'
									AND a.menu_id = '$menu_id'
							 ");
	$result_terjual = mysqli_fetch_array($query_terjual);
	$terjual_yesterday = ($result_terjual['jumlah']) ? $result_terjual['jumlah'] : 0;

	$sisa_yesterday = $stock_yesterday - $terjual_yesterday;

	return $sisa_yesterday;
}


function get_stock_terjual($menu_id, $date) {
	global $mysqli;
	$query = mysqli_query($mysqli, "
									SELECT 	sum( transaction_detail_qty ) AS jumlah
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date 00:00:00'
									AND b.transaction_date <= '$date 23:59:59'
									AND a.menu_id = '$menu_id'
							 ");
	$result = mysqli_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : 0; 
	return $result;
}

?>