<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 
function get_rank_byid($id){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT gmlevel FROM ".$DB_AUTH.".account_access WHERE id=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($gmlevel);
			while ($stmt->fetch()) {
				return $gmlevel;
			}
			$stmt->close();
		}
		$con->close();
	}
function get_username_byid($id){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT username FROM ".$DB_AUTH.".account WHERE id=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($username);
			while ($stmt->fetch()) {
				return $username;
			}
			$stmt->close();
		}
	$con->close();
	}

function get_vip_byid($id){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT VipLevel FROM ".$DB_AUTH.".account WHERE id=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($viplevel);
			while ($stmt->fetch()) {
				return $viplevel;
			}
			$stmt->close();
		}
	$con->close();
	}
	
function get_avatar_byid($id){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT avatar FROM ".$DB_AUTH.".account WHERE id=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($avatar);
			while ($stmt->fetch()) {
				return $avatar;
			}
			$stmt->close();
		}
	$con->close();
	}
	
class account {
	public $CustomRank;      public $failed_logins;     public $mutereason;      public $country;
	public $username;        public $locked;            public $muteby;          public $age; 
	public $email;           public $last_login;        public $vp;              public $foundus;
	public $reg_mail;        public $online;            public $dp;              public $gmlevel;
	public $joindate;        public $expansion;         public $VipLevel;        public $userid;
	public $last_ip;         public $mutetime;          public $total_votes;     public $acc_id;
	public $avatar;
	public $application = array();

	function get_acc_info($username){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT CustomRank,username,email,reg_mail,joindate,last_ip,foundus,id,failed_logins,locked,last_login,online,expansion,mutetime,age,avatar,mutereason,muteby,vp,dp,VipLevel,total_votes,country FROM ".$DB_AUTH.".account WHERE username=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->bind_result($_CustomRank,$_username,$_email,$_reg_mail,$_joindate,$_last_ip,$_foundus,$_acc_id,$_failed_logins,$_locked,$_last_login,$_online,$_expansion,$_mutetime,$_age,$_avatar,$_mutereason,$_muteby,$_vp,$_dp,$_VipLevel,$_total_votes,$_country);
			while ($stmt->fetch()) {
				$this->CustomRank 	= $_CustomRank;   	$this->failed_logins 	= $_failed_logins;    	$this->mutereason 	= $_mutereason;
				$this->username 	= $_username;     	$this->locked 			= $_locked;          	$this->muteby 		= $_muteby;
				$this->email 		= $_email;        	$this->last_login 		= $_last_login;       	$this->vp 			= $_vp;
				$this->reg_mail 	= $_reg_mail;     	$this->online 			= $_online;          	$this->dp 			= $_dp;
				$this->joindate 	= $_joindate;     	$this->expansion 		= $_expansion;        	$this->VipLevel 	= $_VipLevel;
				$this->last_ip 		= $_last_ip;      	$this->mutetime 		= $_mutetime;         	$this->total_votes 	= $_total_votes;
				$this->foundus 		= $_foundus;      	$this->age 				= $_age;     			$this->country 		= $_country;
				$this->acc_id 		= $_acc_id;			$this->avatar			= $_avatar;
			}
			$stmt->close();
		}
		$con->close();
	}
}
	
	function get_real_rank($id){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT id,gmlevel FROM ".$DB_AUTH.".account_access WHERE id=?";
		if ($stmt = $con->prepare($sql)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($_id,$_gmlevel);
			while ($stmt->fetch()) {
					$this->userid = $_id;
					$this->gmlevel = $_gmlevel;
				}
			$stmt->close();
		}
		$con->close();
	}
	function set_avatar($userid,$avatar){
		$dirname = "images/avatars/".$avatar;
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "UPDATE ".$DB_AUTH.".`account` SET `avatar` = ? WHERE id = ?";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("si", $dirname, $userid);
			$stmt->execute();
			$stmt->close();
		}
		$con->close();
	}
	function send_application($user_id, $user_name, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$_a1 = mysqli_real_escape_string($con,$a1);
		$_a2 = mysqli_real_escape_string($con,$a2);
		$_a3 = mysqli_real_escape_string($con,$a3);
		$_a4 = mysqli_real_escape_string($con,stripslashes($a4));
		$_a5 = mysqli_real_escape_string($con,$a5);
		$_a6 = mysqli_real_escape_string($con,$a6);
		$_a7 = mysqli_real_escape_string($con,$a7);
		$_a8 = mysqli_real_escape_string($con,$a8);
		$sql = "REPLACE INTO ".$DB_WEBSITE.".`gm_application` (`user_id`, `username`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("isssssssss", $user_id, $user_name, $_a1, $_a2, $_a3, $_a4, $_a5, $_a6, $_a7, $_a8);
			$stmt->execute();
			$stmt->close();
		}
		$con->close();
	}

	function get_application($accid){
		global $DB_WEBSITE,$DB_HOST,$DB_USERNAME,$DB_PASSWORD;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql="SELECT `user_id`, `username`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8` FROM ".$DB_WEBSITE.".gm_application WHERE user_id = ? ";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param('i', $accid);
			$stmt->execute();
			$stmt->bind_result($_user_id, $_username, $_a1, $_a2, $_a3, $_a4, $_a5, $_a6, $_a7, $_a8);
			while ($stmt->fetch()) {
				$this->application = array (
					'user_id'   	=> $_user_id,
					'username'  	=> $_username,
					'a1'    	    => stripslashes($_a1),
					'a2'     	    => stripslashes($_a2),
					'a3'    	    => stripslashes($_a3),
					'a4'   	        => stripslashes($_a4),
					'a5'    	    => stripslashes($_a5),
					'a6'   	        => stripslashes($_a6),
					'a7'   	        => stripslashes($_a7),
					'a8'   	        => stripslashes($_a8));
			}
			$stmt->close();
		}
		$con->close();
	}

	function construct($username){
		$this->get_acc_info($username);
		$this->get_real_rank($this->acc_id);
	}
}

?>
