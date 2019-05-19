<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* , b.menu_type_name, c.partner_name
							from menus a
							join menu_types b on b.menu_type_id = a.menu_type_id 
							join partners c on c.partner_id = a.partner_id
							order by menu_id");
	return $query;
}

function select_menu_type(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from menu_types order by menu_type_id");
	return $query;
}

function select_partner(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from partners order by partner_id");
	return $query;
}

function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select *
			from menus 
			where menu_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into menus values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update menus set ".$data." where menu_id = '$id'");
}

function update_stock($data_stock){
	global $mysqli;
	mysqli_query($mysqli, "insert into stocks values(".$data_stock.")");
}


function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from menus  where menu_id = '$id'");
}
function get_img_old($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select menu_img from menus 
						where menu_id = '".$id."'");
	$result = mysqli_fetch_array($query);
	$row = $result['menu_img'];
	return $row;
}

?>