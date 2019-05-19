<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from users");
	return $query;
}

function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from users 
			where user_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into users values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update users set ".$data." where user_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from users  where user_id = '$id'");
}
function cek_name_login($name){
	global $mysqli;
	$query = mysqli_query($mysqli, "select count(user_id)
							from users 
						where user_login = '".$name."'");
	$result = mysqli_fetch_array($query);
	$row = $result['0'];
	return $row;
}

?>