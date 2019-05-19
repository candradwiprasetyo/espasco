<?
function read_id($id){
	$query = mysqli_query($mysqli, "select *
				from users 
				where user_id = '$id'");
	$result = mysqli_fetch_object($query);
	return $result;
}

function cek_name_login($name,$id){
	$query = mysqli_query($mysqli, "select user_id
							from users 
						where user_login = '".$name."' AND user_id <>'".$id."'");
	$result = mysqli_num_rows($query);
	return $result;
}
function update_pas($pass,$id){
	mysqli_query($mysqli, "UPDATE users SET user_password='".$pas."' where user_id = '".$id."'");
}
	
function create($data){
	mysqli_query($mysqli, "insert into users values(".$data.")");
}

function update($data, $id){
	mysqli_query($mysqli, "update users set ".$data." where user_id = '$id'");
}

function delete($id){
	mysqli_query($mysqli, "delete from users  where user_id = '$id'");
}


?>
