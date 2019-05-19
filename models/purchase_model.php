<?php

function select(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.* , b.supplier_name,c.unit_name
							from purchases a
							join suppliers b on b.supplier_id = a.supplier_id
							join units c on c.unit_id = a.unit_id
							order by purchase_id");
	return $query;
}

function select_supplier(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from suppliers order by supplier_id ");
	return $query;
}

function select_unit(){
	global $mysqli;
	$query = mysqli_query($mysqli, "select * from units");
	return $query;
}
function read_id($id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select a.*,b.supplier_name,c.unit_name
			from purchases a
			join suppliers b on b.supplier_id = a.supplier_id
			join units c on c.unit_id = a.unit_id
			where purchase_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}


function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into purchases values(".$data.")");
}

function update($data, $id){
	global $mysqli;
	mysqli_query($mysqli, "update purchases set ".$data." where purchase_id = '$id'");
}

function delete($id){
	global $mysqli;
	mysqli_query($mysqli, "delete from purchases where purchase_id = '$id'");
}
?>