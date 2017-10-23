<?php

include "module/hashing.php";
include "register.php";

function userExists($username) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = $connect->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function userdata($username) {
	global $connect;
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM users WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}

function hashPassword($password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    return $password;
}

function passwordMatch($id,$password){
  global $connection;

  $userdata = getUserDataByUserId($id);

	$makePassword = hashPassword($password);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();

}

function changePassword($id, $password) {
	global $connect;

	$hashPassword = hashPassword($password);

	$sql = "UPDATE users SET password = '$hashPassword' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

 ?>
