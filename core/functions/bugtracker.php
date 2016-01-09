<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted');} 
function get_list_buggs(){
global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$connection = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".bugtracker order by id DESC";
	$result = mysqli_query($connection,$sql);
	$i=1;
	while($row = mysqli_fetch_array($result)){
	$bug[$i] = array(
		'id' => $row['id'],
		'body' => $row['body'],
		'autor' => $row['autor'],
		'solved' => $row['solved'],
		'date' => $row['date'],
		'so_date' => $row['so_date']);
		$i++;
	}
	return $bug;
}
function get_basic_buggs(){
global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$connection = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".bugtracker order by id DESC limit 5";
	$result = mysqli_query($connection,$sql);
	$i=1;
	while($row = mysqli_fetch_array($result)){
	$bug[$i] = array(
		'id' => $row['id'],
		'body' => $row['body'],
		'solved' => $row['solved'],
		'date' => $row['date'],
		'so_date' => $row['so_date'],
		'icon' => $row['icon']);
		$i++;
	}
	return $bug;
}
function get_bug_byid($id){
global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$connection = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".bugtracker where id=".$id;
	$result = mysqli_query($connection,$sql);
	while($row = mysqli_fetch_array($result)){
	$bug = array(
		'id' => $row['id'],
		'body' => $row['body'],
		'autor' => $row['autor'],
		'solved' => $row['solved'],
		'date' => $row['date'],
		'so_date' => $row['so_date']);
	}
	return $bug;
}
function statustring($ct){
	switch($ct){
		case 0: $str = '<font color="#CCCC33">Pending</font>';break;
		case 1: $str = '<font color="#66CCFF">W.I.P</font>';break;
		case 2: $str = '<font color="#66CC33">Fixed</font>';break;
		case 3: $str = '<font color="#FF0000">Postponed</font>';break;
		case 4: $str = '<font color="#FF0000">Denied</font>';break;
	}
	return $str;
}
function postbug($username,$body){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$connection = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO ".$DB_WEBSITE.".`bugtracker` ( `body`, `autor`, `solved`, `date`, `so_date`) VALUES ( '".mres($body)."', '".$username."', 0, '".$date."', '".$date."')";
	mysqli_query($connection,$sql);
}
?>