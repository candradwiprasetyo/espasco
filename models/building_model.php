<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* 
							from buildings a
							
							order by building_id");
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
			from buildings
			where building_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into buildings values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update buildings set ".$data." where building_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from buildings where building_id = '$id'");
}
function get_img_old($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select building_img
			from buildings
			where building_id = '$id'");
	$result = mysqli_fetch_array($query);
	return $result['building_img'];
}


?>