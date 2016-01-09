<?php define('DarkCoreCMS',TRUE);
include 'config.php'; 
include 'functions/global_functions.php'; 
require_once 'functions/bugtracker.php'; 
if (isset($_POST['send-bugg'])){
	if (isset($_POST['bugg-body']) && strlen($_POST['bugg-body'])>100){
		$autor = $_POST['bugg-autor'];
		$body = $_POST['bugg-body'];
		postbug($autor,$body);
		header("Location: ../bugtracker?errno=0");
	}
	else
	{
		header("Location: ../bugtracker?errno=1");
	}
}
else 
	header('Location: ../');
?>