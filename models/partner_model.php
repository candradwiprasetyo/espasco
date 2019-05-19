<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* 
							from partners a	
							where partner_id <> 1					
							order by partner_id");
	return $query;
}

function select_partner(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from partners order by partner_id ");
	return $query;
}


function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from partners
			where partner_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into partners values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update partners set ".$data." where partner_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from partners where partner_id = '$id'");
}
?>