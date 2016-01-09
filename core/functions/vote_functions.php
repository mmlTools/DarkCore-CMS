<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 
function check_if_voted($acc_id,$site_id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT expire FROM ".$DB_WEBSITE.".`vote_logs` WHERE account=? AND site=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("ii", $acc_id, $site_id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_expire);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$expiration_time = $_expire;
				$date = new DateTime();
				$cur_time = $date->getTimestamp();
			}
			if ($cur_time >= $expiration_time)
				return 0;
			else
				return 1;
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function get_expir_time($acc_id,$site_id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT expire FROM ".$DB_WEBSITE.".`vote_logs` WHERE account=? AND site=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("ii", $acc_id, $site_id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_expire);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$expiration_time = $_expire;
				return $expiration_time;
			}
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function vote($acc_id, $site_id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$date = new DateTime();
	$cur_time = $date->getTimestamp();
	$exp = $cur_time + (3600*12);
	$sql = "REPLACE INTO ".$DB_WEBSITE.".`vote_logs` VALUES (?,?,?,?)";
	if (check_if_voted($acc_id, $site_id) == 0 || check_if_voted($acc_id, $site_id) == 2){
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("iiii", $acc_id, $site_id, $cur_time, $exp);
			$stmt->execute();
			$stmt->store_result();
			return 1;
		}
	}
	else
		return 0;
	$stmt->close();
	$con->close();
}

function add_points($user,$points){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "UPDATE ".$DB_AUTH.".`account` set vp=vp+?,`total_votes`=`total_votes`+1 where id=?";
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("ii",$points,$user);
		$stmt->execute();
	}
	$stmt->close();
	$con->close();
}

function time2string($time) {
	$d = floor($time/86400);
    $_d = ($d < 10 ? '0' : '').$d;
	
    $h = floor(($time-$d*86400)/3600);
    $_h = ($h < 10 ? '0' : '').$h;

    $m = floor(($time-($d*86400+$h*3600))/60);
    $_m = ($m < 10 ? '0' : '').$m;

    $s = $time-($d*86400+$h*3600+$m*60);
    $_s = ($s < 10 ? '0' : '').$s;

    $time_str = $_h.' H '.$_m.' Min '.$_s.' Sec ';

    return $time_str;
}

function get_vote_sites(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select id,title,link,logo,points,end_week_points from ".$DB_WEBSITE.".`vote_sites`";
	$i = 1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_id,$_title,$_link,$_logo,$_points,$_end_week_points);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$sites[$i] = array(
					'id' => $_id,
					'title' => $_title,
					'link' => $_link,
					'logo' => $_logo,
					'points' => $_points,
					'end_week_points' => $_end_week_points
				);
				$i++;
			}
		}
		return $sites;
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function getSite_data_byID($siteid){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select id,title,link,postback,logo,points,end_week_points from ".$DB_WEBSITE.".`vote_sites` where id=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $siteid);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_id, $_title, $_link, $_postback, $_logo, $_points, $_end_week_points);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$sites = array(
					'id' => $_id,
					'title' => $_title,
					'link' => $_link,
					'postback' => $_postback,
					'logo' => $_logo,
					'points' => $_points,
					'end_week_points' => $_end_week_points
				);
			}
			return $sites;
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function getlink_byID($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select link from ".$DB_WEBSITE.".`vote_sites` where id=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_link);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$link = $_link;
			}
			return $link;
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function top_voters(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select username,total_votes from ".$DB_AUTH.".`account` order by total_votes DESC limit 10";
	$i = 1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_username, $_total_votes);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$accin[$i] = array(
					'username' => $_username,
					'total_votes' => $_total_votes);
				$i++;
			}
			return $accin;
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}

function get_day_string(){
	$date = new DateTime();
	$cur_time = $date->getTimestamp();
	$unkkt = idate('w', $cur_time).'<BR>';
	switch ($unkkt){
		case 1: $day = 'Luni'; break;
		case 2: $day = 'Marti'; break;
		case 3: $day = 'Miercuri'; break;
		case 4: $day = 'Joi'; break;
		case 5: $day = 'Vineri'; break;
		case 6: $day = 'Sambata'; break;
		case 0: $day = 'Duminica'; break;
	}
	return $day;
}

function get_vote_ann(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,body,date FROM ".$DB_WEBSITE.".`vote_an` ORDER BY `date` DESC";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($_id, $_body, $_date);
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$announce[$i] = array(
					'id' => $_id,
					'date' => $_body,
					'body' => $_date);
				$i++;
			}
			return $announce;
		}
	}
	else 
		return 0;
	$stmt->close();
	$con->close();
}
?>