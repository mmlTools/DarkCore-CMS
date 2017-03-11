<?php 
	define('DarkCoreCMS',TRUE);
	if (isset($_POST['send-comm']) && 
		isset($_POST['news-id']) && 
		isset($_POST['com-autor']) && 
		isset($_POST['comment-body']))
	{
		$newsid = $_POST['news-id'];
		$autor = $_POST['com-autor'];
	    $body =	$_POST['comment-body'];
		include 'config.php'; 
		include 'functions/global_functions.php'; 
		$linkstring = '../board?forum=1&topic='.$newsid.'&page=1';
		leave_comment($newsid,$autor,$body);
		header('Location: '.$linkstring);
	}
	else{
		header('Location: ../');
	}
