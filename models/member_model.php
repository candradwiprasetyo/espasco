<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* 
							from members a	
												
							order by member_id");
	return $query;
}

function select_partner(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* 
							from partners a	
							order by partner_id");
	return $query;
}

function select_menu($partner_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* 
							from menus a	
							where partner_id = '$partner_id'
							order by menu_id");
	return $query;
}

function select_item($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.*, b.menu_name
							from member_items a
							join menus b on b.menu_id = a.menu_id	
							where member_id = '$id'	
							order by member_item_id");
	return $query;
}

function select_member(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from members order by member_id ");
	return $query;
}


function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from members
			where member_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into members values(".$data.")");
}

function create_item($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into member_items values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update members set ".$data." where member_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from members where member_id = '$id'");
}

function delete_item($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from member_items where member_item_id = '$id'");
}

function delete_member_item($member_id, $menu_id){
	global $mysqli;
	mysqli_query($mysqli, "delete from member_items where member_id = '$member_id' and menu_id = '$menu_id'");
}

function check_exist($member_id, $menu_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select count(member_item_id) as jumlah
							  from member_items
							  where member_id = '".$member_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysqli_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}


?>