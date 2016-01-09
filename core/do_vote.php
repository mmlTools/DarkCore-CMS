<?php define('DarkCoreCMS',TRUE);
include 'config.php'; 
include 'functions/vote_functions.php' ;
include 'functions/global_functions.php';
if (isset($_GET['user']) && isset($_GET['siteid'])){
	$user = $_GET['user'];
	$siteid = $_GET['siteid'];
	
	$site_data = getSite_data_byID($siteid);
	if (isset($site_data['postback']) && $site_data['postback'] != NULL)
		header('Location: '.$site_data['link'].$site_data['postback'].$user);
	else{
		$do_vote = vote($user,$siteid);
		if ($do_vote != 0){
			$date = new DateTime();
			$cur_time = $date->getTimestamp();
			$day_number = idate('w', $cur_time);
			if ($day_number == 6 || $day_number == 0)
				add_points($user,$site_data['end_week_points']);
			else 
				add_points($user,$site_data['points']);
			header('Location: ../user?done=1');
		}
		header('Location: '.$site_data['link']);
	}
}
else 
	header('Location: ../');
?>