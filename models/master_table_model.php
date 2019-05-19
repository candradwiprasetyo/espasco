<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* , b.building_name as nama_gedung
							from tables a
							join buildings b on b.building_id = a.building_id
							order by table_id");
	return $query;
}

function select_building(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from buildings order by building_id ");
	return $query;
}


function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from tables
			where table_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into tables values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update tables set ".$data." where table_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from tables where table_id = '$id'");
}
?>