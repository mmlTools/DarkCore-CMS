<?php define('DarkCoreCMS',TRUE);
include 'config.php'; 
include 'functions/vote_functions.php' ;
include 'functions/global_functions.php';
if (isset($_POST['pbid'])){
	$site_data = getSite_data_byID(4);
	$do_vote = vote($_POST['pbid'],$_GET['siteid']);
	if ($day_number == 6 || $day_number == 0)
			add_points($_POST['pbid'],$site_data['end_week_points']);
		else 
			add_points($_POST['pbid'],$site_data['points']);
}
else 
	header('Location: ../');
?>