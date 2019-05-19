<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from menus order by menu_id");
	return $query;
}

function select_cat(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from menu_types order by menu_type_id");
	return $query;
}

function select_history($table_id){
	global $mysqli;
	 $query = mysqli_query($mysqli, "select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'
							  order by transaction_detail_id 
							  ");
	return $query;
}

function select_menu($keyword){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from menus where menu_name like '%$keyword%' order by menu_id");
	$row = mysqli_fetch_array($query);
	return $row['menu_id'];
}

function create_config($table, $data){
	global $mysqli;
	mysqli_query($mysqli, "insert into $table values(".$data.")");
}

function update_config($table, $data, $column, $id){
	global $mysqli;
	mysqli_query($mysqli, "update $table set $data where $column = $id");
}

function delete_history($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from transaction_tmp_details  where transaction_detail_id = '$id'");
}

function check_table($table_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select count(transaction_id) as jumlah
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysqli_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_transaction_id_old($table_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select transaction_id
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysqli_fetch_array($query);
	
	return $row['transaction_id'];
	
}


function check_history($table_id, $menu_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select count(b.transaction_detail_id) as jumlah
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	$row = mysqli_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_data_history($table_id, $menu_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select b.*
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	return $query;
}

?>