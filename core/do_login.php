<?php define('DarkCoreCMS',TRUE);
include 'config.php'; 
include 'functions/global_functions.php'; 
if (!isset($_SESSION)) { 
		session_start(); 
	}
if (isset($_POST['login_username']) && strlen($_POST['login_username'])>=3 && isset($_POST['login_password']) && strlen($_POST['login_password'])>=3){
	$username = $_POST['login_username'];
	$password = $_POST['login_password'];
	$password = encrypt($username, $password);
	$check_result = login($username,$password);
	if ($check_result == 'yes'){
		$_SESSION['usr'] = $username;
		header("Location: ../user");
	}
	else{
		header("Location: ../index?errlogin=1");
	}
}
else 
	header('Location: ../');
?>