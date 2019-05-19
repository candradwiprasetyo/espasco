<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.*, b.table_name, c.building_name 
							from transactions a
							left join tables b on b.table_id = a.table_id
							left join buildings c on c.building_id = b.building_id 
							order by transaction_id");
	return $query;
}

function select_list_transaction(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from list_transactions order by list_transaction_id ");
	return $query;
}


function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from list_transactions
			where list_transaction_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into list_transactions values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update list_transactions set ".$data." where list_transaction_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from list_transactions where list_transaction_id = '$id'");
}
?>