<?php

function select_login($login, $password){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from users where user_login = '$login' and user_password = '$password'");
	$result = mysqli_num_rows($query);
	return $result;
}

function select_user($login, $password){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from users where user_login = '$login' and user_password = '$password'");
	$result = mysqli_fetch_object($query);
	return $result;
}

?>