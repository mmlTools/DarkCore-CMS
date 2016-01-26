<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 
 //error_reporting(1);
 function leave_comment($new_id,$autor,$body){
	 global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	 $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	 //$_body = mres($body);
	 $stmt = $con->prepare("INSERT INTO ".$DB_WEBSITE.".`news_comments` (`news_id`, `autor`, `body`) VALUES (?,?,?)");
	 $_body = mysqli_real_escape_string($con,$body);
	 $stmt->bind_param('iss', $new_id, $autor, $_body);
	 $stmt->execute();
	 $stmt->close();
	 $con->close();
}
function mres($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

function encrypt($username, $password)
{
  $password = sha1(strtoupper($username) . ":" . strtoupper($password));
    $password = strtoupper($password);
      return $password;
}
function get_reg_errors($type){
	$errors = str_split ($type);
	for ($i=0;$i<count($errors);$i++){
		switch ($errors[$i]){
			case "A": echo "<div id='notify'>This username already exist</div>";break;
			case "B": echo "<div id='notify'>Username must contain at least 3 charactes</div>";break;
			case "C": echo "<div id='notify'>Password must be at least 8 characters long</div>";break;
			case "D": echo "<div id='notify'>There is already an account registered with this email</div>";break;
			case "E": echo "<div id='notify'>Email must contain at least 10 characters long (email is required for password changes)</div>";break;
			case "F": echo "<div id='notify'>Country must contain at least 2 characters EX: USA/DK/CZ/NORWAY</div>";break;
			case "G": echo "<div id='notify'>Age must be between 16 and 99 numeric only</div>";break;
			case "H": echo "<div id='notify'>Found us field must contain at least 5 characters EX: YOUTUBE/TOP SITES</div>";break;
			case "I": echo "<div id='notify'>Human verification math problem must contain at least 1 character to be validated</div>";break;
			case "J": echo "<div id='notify'>Human verification text field must contain at least 1 character to be validated</div>";break;
			case "K": echo "<div id='notify'>Passwords does not match</div>";break;
			case "L": echo "<div id='notify'>Emails does not match</div>";break;
			case "M": echo "<div id='notify'>Human verification math problem incorect answer</div>";break;
			case "N": echo "<div id='notify'>Human verification text field incorect answer</div>";break;
		}
	}
}
function check_user_exist($username){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$stmt = $con->prepare("SELECT * FROM ".$DB_AUTH.".account WHERE `username`=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows;
	$stmt->close();
	$con->close();
}
function check_email_exist($email){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$stmt = $con->prepare("SELECT * FROM ".$DB_AUTH.".account WHERE `email`=?");
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows;
	$stmt->close();
	$con->close();
}

function register_user($username,$password,$re_password,$email,$re_email,$country,$age,$foundus,$robot1,$total = 0,$robot2,$checktext = NULL){
	$_error= '';
	if (check_user_exist($Username) > 0)
		$_error = $_error . 'A';
	if (strlen($username)  < 3)
		$_error = $_error . 'B';
	if (strlen($password)  < 8)
		$_error = $_error . 'C';
	if (check_email_exist($email) > 0)
		$_error = $_error . 'D';
	if (strlen($email)  < 10)
		$_error = $_error . 'E';
	if (strlen($country)  < 2)
		$_error = $_error . 'F';
	if (strlen($age)  < 2)
		$_error = $_error . 'G';
	if (strlen($foundus)  < 5)
		$_error = $_error . 'H';
	if (strlen($robot1)  < 1)
		$_error = $_error . 'I';
	if (strlen($robot2) < 1)
		$_error = $_error . 'J';
	if ($password != $re_password)
		$_error = $_error . 'K';
	if ($email != $re_email)
		$_error = $_error . 'L';
	if ($robot1 != $total)
		$_error = $_error . 'M';
	if (strtoupper($robot2) != $checktext)
		$_error = $_error . 'N';
	if (strlen($_error) > 0)
		echo "<script> window.location.href = 'register?regerror=1&errtype=$_error';</script>";
	else {
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "INSERT INTO ".$DB_AUTH.".account (username, sha_pass_hash, email, country, age, foundus) VALUES (?,?,?,?,?,?)";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("ssssss", $username, $password, $email, $country, $age, $foundus);
			$stmt->execute();
			$stmt->close();
		}
		$con->close();
		//echo "<script> window.location.href = 'inc/success?page=register&user=$username';</script>";
		header('Location: register?success');
	}


}
function login($USR,$PSW){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_AUTH.".`account` WHERE username=? and sha_pass_hash=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("ss", $USR, $PSW);
		$stmt->execute();
		$stmt->store_result();
		$cols = $stmt->num_rows;
		if ($cols != 1)
			return 'no';
		else
			return 'yes';
		$stmt->close();
	}
	$con->close();
}
function rewrite_body($text_body){
$result = str_replace("\n","<br>",$text_body);
return $result;
}
function get_news_basic(){
global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,autor,body,title,thumbnail,header,date FROM ".$DB_WEBSITE.".news order by id DESC limit 5";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_id,$_autor,$_body,$_title,$_thumbnail,$_header,$_date);
		while($stmt->fetch()){
			$news[$i] = array(
				'id' => $_id,
				'autor' => $_autor,
				'body' => strip_tags(substr($_body, 0, 300)),
				'title' => $_title,
				'thumbnail' => $_thumbnail,
				'header' => $_header,
				'date' => $_date);
			$i++;
		}
		$stmt->close();
	}
	return $news;
	$con->close();
}
function get_news_total($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,title,body,autor,header,date,background FROM ".$DB_WEBSITE.".news where id=?";
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->bind_result($_id,$_title,$_body,$_autor,$_header,$_date,$_background);
		while($stmt->fetch()){
			$news = array(
				'id' => $_id,
				'title' => $_title,
				'body' => $_body,
				'autor' => $_autor,
				'header' => $_header,
				'date' => $_date,
				'background' => $_background);
		}
		$stmt->close();
	}
	return $news;
	$con->close();
}
function total_comments($news_id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".topic_comments where topic_id=? order by id DESC";
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("i",$news_id);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows();
		$stmt->close();
	}
	$con->close();
}
function remove_comment($news_id,$comm_id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "DELETE FROM ".$DB_WEBSITE.".topic_comments where topic_id=? and id =?";
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("ii",$news_id,$comm_id);
		$stmt->execute();
		$stmt->close();
	}
	$con->close();
}
function get_news_comments($news_id,$page,$limit){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$from = ($page-1) * $limit;
	$comms = array();
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,news_id,autor,body,date FROM ".$DB_WEBSITE.".news_comments where news_id=? order by id DESC limit ?,?";
	$i=1;
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("iii",$news_id,$from,$limit);
		$stmt->execute();
		$stmt->bind_result($_id,$_news_id,$_autor,$_body,$_date);
		while ($stmt->fetch()){
			$comms[$i] = array(
				'id' => $_id,
				'news_id' => $_news_id,
				'autor' => $_autor,
				'body' => $_body,
				'date' => $_date);
			$i++;
		}
		$stmt->close();
	}
	return $comms;
	$con->close();
}
function class_strings($class){
	switch($class){
		case 1: $c_string  = 'Warrior'; break;
		case 2: $c_string  = 'Paladin'; break;
		case 3: $c_string  = 'Hunter'; break;
		case 4: $c_string  = 'Rogue'; break;
		case 5: $c_string  = 'Priest'; break;
		case 6: $c_string  = 'Death Knight'; break;
		case 7: $c_string  = 'Shaman'; break;
		case 8: $c_string  = 'Mage'; break;
		case 9: $c_string  = 'Warlock'; break;
		case 11: $c_string = 'Druid'; break;
	}
	return $c_string;
}

function race_strings($race){
	switch($race){
		case 1: $r_string  = 'Human'; break;
		case 2: $r_string  = 'Orc'; break;
		case 3: $r_string  = 'Dwarf'; break;
		case 4: $r_string  = 'Night Elf'; break;
		case 5: $r_string  = 'Undead'; break;
		case 6: $r_string  = 'Tauren'; break;
		case 7: $r_string  = 'Gnome'; break;
		case 8: $r_string  = 'Troll'; break;
		case 10: $r_string  = 'Blood Elf'; break;
		case 11: $r_string = 'Draenei'; break;
	}
	return $r_string;
}

function gender_strings($gender){
	switch($gender){
		case 0: $g_string  = 'Male'; break;
		case 1: $g_string  = 'Female'; break;
	}
	return $g_string;
}

function dotted_number($number){
	return str_replace(',','.',number_format($number));
}

function rew_number($number){
	$string = $number;
	if ($number >= 1000)
		$string = number_format((float)($number / 1000), 2, '.', '').' K';
	if ($number >= 1000000)
		$string = number_format((float)($number / 1000000), 2, '.', '').' M';
	return $string;
}
function online_strings($online){
	switch($online){
		case 0: $o_string  = '<label style="color:#FF0000;">Offline</label>'; break;
		case 1: $o_string  = '<label style="color:#00CC00;">Online</label>'; break;
	}
	return $o_string;
}

function char_name_color($class){
switch ($class)
	{
	case 6://CLASS_DEATH_KNIGHT:
		$color = "C41F3B";
		break;
	case 11://CLASS_DRUID:
		$color = "FF7D0A";
		break;
	case 3://CLASS_HUNTER:
		$color = "ABD473";
		break;
	case 8://CLASS_MAGE:
		$color = "69CCF0";
		break;
	case 2://CLASS_PALADIN:
		$color = "F58CBA";
		break;
	case 5://CLASS_PRIEST:
		$color = "FFFFFF";
		break;
	case 4://CLASS_ROGUE:
		$color = "FFF569";
		break;
	case 7://CLASS_SHAMAN:
		$color = "0070DE";
		break;
	case 9://CLASS_WARLOCK:
		$color = "9482C9";
		break;
	case 1://CLASS_WARRIOR:
		$color = "C79C6E";
		break;
	}
	return $color;
}

function convertToInt($s){return(int)preg_replace('/[^\-\d]*(\-?\d*).*/','$1',$s);}
function convertToIntExtended($str){
	$matches = preg_replace('/[^0-9]/', '', $str);
	return intval($matches);
}

function namecolor($gmrank){
	switch($gmrank){
		case 0:		$color='FFFFFF';	break;
		case 1:		$color='CCCC00';	break;
		case 2:		$color='CCCC00';	break;
		case 3:		$color='CCCC00';	break;
		case 4:		$color='00CCFF';	break;
		case 5:		$color='911EBF';	break;
		case 6:		$color='71BF1E';	break;
		case 7:		$color='71BF1E';	break;
		case 8:		$color='71BF1E';	break;
		case 9:		$color='6B00A0';	break;
		case 10:	$color='BF1E60';	break;
		case 11:	$color='BF1E60';	break;
		case 12:	$color='980022';	break;
	}
	return $color;
}
function rankstring($rank,$viplvl){
	switch($rank){
		case 0:  $rank='Player'; break;
		case 1:  $rank='UNK'; break;
		case 2:  $rank='UNK'; break;
		case 3:  $rank='UNK'; break;
		case 4:   
			switch($viplvl){
				case 0: $rank='Player'; break;
				case 1: $rank='Gold Vip'; break;
				case 2: $rank='Platinum Vip'; break;
				case 3: $rank='Diamond Vip'; break;
			}
		break;
		case 5:  $rank='Developer'; break;
		case 6:  $rank='Trial Gamemaster'; break;
		case 7:  $rank='Senior Gamemaster'; break;
		case 8:  $rank='Advanced Gamemaster'; break;
		case 9:  $rank='Head Gamemaster'; break;
		case 10: $rank='Administrator'; break;
		case 11: $rank='UNK'; break;
		case 12: $rank='Server Owner'; break;
	}
	return $rank;
}
function vip_level_string($lvl){
	switch($lvl){
		case 0:		$level='<span style="color:#FFFFFF;">Player</span>';	break;
		case 1:		$level='<span style="color:#CCCC00;">Gold-VIP</span>';	break;
		case 2:		$level='<span style="color:#99CCFF;">Platinum-VIP</span>';	break;
		case 3:		$level='<span style="color:#0066FF;">Diamond-VIP</span>';	break;
	}
	return $level;
}
function secondsToTime($inputSeconds) {

    $secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;

    // extract days
    $days = floor($inputSeconds / $secondsInADay);

    // extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // return the final array
    $obj = array(
        'd' => (int) $days,
        'h' => (int) $hours,
        'm' => (int) $minutes,
        's' => (int) $seconds,
    );
    return $obj;
}
function ping_world(){
		global $worldserver_host,$worldserver_ip;
        $fsock = fsockopen($worldserver_host, $worldserver_ip, $errno, $errstr, 6);
        if ( ! $fsock )
            return FALSE;
        else
            return TRUE;
}


function get_rules($type){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,body,type FROM ".$DB_WEBSITE.".`rules` where type=?";
	$i=1;
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param("i",$type);
		$stmt->execute();
		$stmt->bind_result($_id,$_body,$_type);
		while($stmt->fetch()){
			$rules[$i] = array(
				'id' => $_id,
				'body' => $_body,
				'type' => $_type);
			$i++;
		}
		$stmt->close();
	}
	return $rules;
	$con->close();
}
function logout($session)
{
	session_unset($session);
	echo "<script> window.location.href = 'index'; </script>";
	exit();
}
function comm_paging($newsid,$total_results,$limit_per_page,$cur_page = 1){
	
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	

	/* Setup page vars for display. */
	if ($cur_page == 0) $cur_page = 1;					//if no page var is given, default to 1.
	$prev = $cur_page - 1;							//previous page is page - 1
	$next = $cur_page + 1;							//next page is page + 1
	$lastpage = ceil($total_results / $limit_per_page);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		//previous button
		if ($cur_page > 1) 
			$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$prev."'> previous</a></div>";
		else
			$pagination.= "<span class='pag-link-disabled'> previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $cur_page)
					$pagination.= "<span class='pag-link-current'>".$counter."</span>";
				else
					$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$counter."'>".$counter."</a></div>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($cur_page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $cur_page)
						$pagination.= "<span class='pag-link-current'>".$counter."</span>";
					else
						$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$counter."'>".$counter."</a></div>";					
				}
				$pagination.= "<div class='pag-link'>...</div>";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$lpm1."'>".$lpm1."</a></div>";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$lastpage."'>".$lastpage."</a></div>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $cur_page && $cur_page > ($adjacents * 2))
			{
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=1'>1</a></div>";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=2'>2</a></div>";
				$pagination.= "<div class='pag-link'>...</div>";
				for ($counter = $cur_page - $adjacents; $counter <= $cur_page + $adjacents; $counter++)
				{
					if ($counter == $cur_page)
						$pagination.= "<span class='pag-link-current'>".$counter."</span>";
					else
						$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$counter."'>".$counter."</a></div>";					
				}
				$pagination.= "...";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$lpm1."'>".$lpm1."</a></div>";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$lastpage."'>".$lastpage."</a></div>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=1'>1</a></div>";
				$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=2'>2</a></div>";
				$pagination.= "<div class='pag-link'>...</div>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $cur_page)
						$pagination.= "<span class='pag-link-current'>".$counter."</span>";
					else
						$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$counter."'>".$counter."</a></div>";				
				}
			}
		}
		
		//next button
		if ($cur_page < $counter - 1) 
			$pagination.= "<div class='pag-link'><a href='?id=".$newsid."&page=".$next."'>next</a></div>";
		else
			$pagination.= "<span class='pag-link-disabled'>next</span>";	
		
	}
	return $pagination;
}
class BbParser {

	private   $find = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=((?:[a-zA-Z]|#[a-fA-F0-9]{3,6})+)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
	);

	public   $replace = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<span style="text-decoration:underline;">$1</span>',
		'<blockquote>$1</blockquote>',
		'<span style="font-size:$1px;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1">$1</a>',
		'<img src="$1" alt="" />',
	);

// Replacing the BBcodes with corresponding HTML tags
	function showBBcodes($text)
	{
		return nl2br(preg_replace($this->find, $this->replace, $text));
	}
}
function list_tickets($list_type = NULL){
	global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_CHARACTERS;
	$con = connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
	$tickets = array();
	$i=1;
	if ($list_type != NULL)
		$sql = "SELECT `ticketId`, `guid`, `name`, `message`, `createTime`, `lastModifiedTime`, `closedBy`, `assignedTo`, `comment`, `response`, `completed`, `escalated`, `viewed`, `haveTicket` FROM " . $DB_CHARACTERS . ".`gm_tickets` ORDER BY `ticketid` DESC limit 1";
	else
		$sql = "SELECT `ticketId`, `guid`, `name`, `message`, `createTime`, `lastModifiedTime`, `closedBy`, `assignedTo`, `comment`, `response`, `completed`, `escalated`, `viewed`, `haveTicket` FROM " . $DB_CHARACTERS . ".`gm_tickets` WHERE `closedBy` = 0 ORDER BY `ticketid` DESC";
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows() > 0) {
			$stmt->bind_result($_ticketId, $_guid, $_name, $_message, $_createTime, $_lastModifiedTime, $_closedBy, $_assignedTo, $_comment, $_response, $_completed, $_escalated, $_viewed, $_haveTicket);
			while ($stmt->fetch()) {
				$tickets[$i] = array (
					'ticketId' =>              $_ticketId,
					'guid' =>                   $_guid,
					'name' =>                   $_name,
					'message' =>                $_message,
					'createTime' =>             $_createTime,
					'lastModifiedTime' =>       $_lastModifiedTime,
					'closedBy' =>               $_closedBy,
					'assignedTo' =>             $_assignedTo,
					'comment' =>                $_comment,
					'response' =>               $_response,
					'completed' =>              $_completed,
					'escalated' =>              $_escalated,
					'viewed' =>                 $_viewed,
					'haveTicket' =>             $_haveTicket
				);
				$i++;
			}
			return $tickets;
		}
		$stmt->close();
	}
	return 0;

	$con->close();
}

function int_to_string($time) {
	$d = floor($time/86400);
	$_d = ($d < 10 ? '0' : '').$d;

	$h = floor(($time-$d*86400)/3600);
	$_h = ($h < 10 ? '0' : '').$h;

	$m = floor(($time-($d*86400+$h*3600))/60);
	$_m = ($m < 10 ? '0' : '').$m;

	$s = $time-($d*86400+$h*3600+$m*60);
	$_s = ($s < 10 ? '0' : '').$s;

	$time_str = $_d.' Days '.$_h.' H '.$_m.' Min '.$_s.' Sec ';

	return $time_str;
}
?>