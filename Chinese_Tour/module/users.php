<?php

require_once "hashing.php";


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

function registerUser() {

global $connect;

$username = $_POST["username"];
$password = hashPassword(''.$_POST["password"].'');
$firstName = $_POST["firstname"];
$middleName = $_POST["middlename"];
$lastName = $_POST["lastname"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$dob = date('Y-m-d',strtotime($_POST["yyyy"] . "-" . $_POST["mm"] . "-" . $_POST["dd"]));
$salary = $_POST["salary"];
$occupation = $_POST["occupation"];

$npassword =  makePassword($password);
if($npassword){
	$sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, address, phone, email, date_of_birth, occupation, salary) VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$address', '$phone', '$email', '$dob', '$occupation', '$salary')";
  $query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}//if
$connect->close();
// close the database connection
}// register user funtion

function makePassword($password) {
	return hash('sha256', $password);
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

function login($username, $password) {
	global $connect;
	$userdata = userdata($username);

	if($userdata) {
		$makePassword = makePassword($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$makePassword'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
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

function users_exists_by_id($id, $username) {
	global $connect;

	$sql = "SELECT * FROM users WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: login.php');
	}
}

function passwordMatch($id,$password){
  global $connection;

  $userdata = getUserDataByUserId($id);

	$makePassword = makePassword($password);

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

	$makePassword = makePassword($password);

	$sql = "UPDATE users SET password = '$makePassword' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

 ?>
