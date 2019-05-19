<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
							from suppliers
							order by supplier_id");
	return $query;
}


function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
							from suppliers
			where supplier_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into suppliers values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update suppliers set ".$data." where supplier_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from suppliers where supplier_id = '$id'");
}
?>