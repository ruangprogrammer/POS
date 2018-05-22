<?php
require_once('config.php');
$var_username = $_POST['frm_username'];
$var_password = $_POST['frm_password'];
$query = "select * from users 
where user_username='" . $var_username . "' 
AND 
user_password='" . md5($var_password) . "' ";
$result = mysqli_query($mysqli,$query);

$rows = mysqli_num_rows($result);

if ($rows > 0) {
	session_start();
	$data = mysqli_fetch_array($result);
	$_SESSION['user_id'] = $data['user_id'];
	$_SESSION['username'] = $data['user_username'];
	$_SESSION['password'] = $data['user_password'];
	$_SESSION['level'] = $data['user_level'];
	header('location: index.php?hal=dashboard');
} else {
	header('location: login.php?action=failed');
}

