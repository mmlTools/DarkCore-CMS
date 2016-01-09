<?php define('DarkCoreCMS',TRUE);
include 'config.php'; 
include 'functions/global_functions.php'; 
if (isset($_POST['deletecomm'])) 
{ 
	remove_comment($_POST['newsid'],$_POST['commid']);
	header('Location: ../');
} 
else 
	header('Location: ../');
?>