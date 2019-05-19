<?php

function select($table_id){
	global $mysqli;
	$query = mysqli_query($mysqli, "select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'");
	return $query;
}

function create($data){
	global $mysqli;
	mysqli_query($mysqli, "insert into buildings values(".$data.")");
}

?>