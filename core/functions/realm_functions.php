<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 
function get_user_info($username){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,username,email,last_ip,country,vp,dp,rank FROM ".$DB_AUTH.".account WHERE `username`=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$stmt->bind_result($_id,$_username,$_email,$_last_ip,$_country,$_vp,$_dp,$_rank);
		$stmt->store_result();
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$accinfo = array(
					'id' => $_id,
					'username' => $_username,
					'email' => $_email,
					'last_ip' => $_last_ip,
					'country' => $_country,
					'vp' => $_vp,
					'dp' => $_dp,
					'rank' => $_rank);
			}
			return $accinfo;
		}
	}
	$stmt->close();
	$con->close();
}
function pvp_ladder(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT guid,name,race,class,gender,level,totalKills FROM ".$DB_CHARACTERS.".characters where name !='' order by totalKills desc limit 5";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_guid,$_name,$_race,$_class,$_gender,$_level,$_totalKills);
		$stmt->store_result();
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$accinfo[$i] = array(
					'guid' => $_guid,
					'name' => $_name,
					'race' => $_race,
					'class' => $_class,
					'gender' => $_gender,
					'level' => $_level,
					'totalkills' => $_totalKills);
				$i++;
			}
			return $accinfo;
		}
	}
	$stmt->close();
	$con->close();
}

function chars_by_userID($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT guid,name,race,class,gender,level FROM ".$DB_CHARACTERS.".characters WHERE `account`=?";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->bind_result($_guid, $_name, $_race, $_class, $_gender, $_level);
		$stmt->store_result();
		if ($stmt->num_rows() > 0) {
			while ($stmt->fetch()) {
				$acc_chars[$i] = array(
					'guid' => $_guid,
					'name' => $_name,
					'race' => $_race,
					'class' => $_class,
					'gender' => $_gender,
					'level' => $_level);
				$i++;
			}
			return $acc_chars;
		}
	}
	$stmt->close();
	$con->close();
}

class realm{
	public $total_online = 0;                             public $total_Warrior = 0;
	public $alliance = 0;                                 public $total_Paladin = 0;
	public $horde = 0;                                    public $total_Hunter = 0;
	public $total_al = 0;                                 public $total_Rogue = 0;
	public $total_hd = 0;                                 public $total_Priest = 0;
	public $percent_horde = 0;                            public $total_DeathKnight = 0;
	public $percent_alliance = 0;                         public $total_Shaman = 0;
	public $starttime;                                    public $total_Mage = 0;
	public $uptime;                                       public $total_Warlock = 0;
	public $maxplayers = 0;                               public $total_Druid = 0;
	public $maxuptime;                                    public $total_Human = 0;
	public $rm_name;                                      public $total_Orc = 0;
	public $total_accounts;                               public $total_Dwarf = 0;
	public $total_quests;                                 public $total_NightElf = 0;
	public $total_characters;                             public $total_Undead = 0;
	public $total_items;                                  public $total_Tauren = 0;
	public $charsonline = array();                        public $total_Gnome = 0;
	public $total_Draenei = 0;                       	  public $total_Troll = 0;
	public $total_BloodElf = 0;
	public $realm_id=0;

	public $perc_Warrior = 0;
	public $perc_Paladin = 0;
	public $perc_Hunter = 0;
	public $perc_Rogue = 0;
	public $perc_Priest = 0;
	public $perc_DeathKnight = 0;
	public $perc_Shaman = 0;
	public $perc_Mage = 0;
	public $perc_Warlock = 0;
	public $perc_Druid = 0;
	public $perc_Human = 0;
	public $perc_Orc = 0;
	public $perc_Dwarf = 0;
	public $perc_NightElf = 0;
	public $perc_Undead = 0;
	public $perc_Tauren = 0;
	public $perc_Gnome = 0;
	public $perc_Troll = 0;
	public $perc_BloodElf = 0;
	public $perc_Draenei = 0;

	function connection(){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD;
		return connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	}
	
	function get_world_stats(){
		global $DB_WORLD;
		$con = $this->connection();
		$total_items_sql ="SELECT * FROM ".$DB_WORLD.".item_template WHERE entry>55000";
		$total_quests_sql ="SELECT * FROM ".$DB_WORLD.".quest_template WHERE id>25000";
		if ($stmt = $con->prepare($total_items_sql)){
			$stmt->execute();
			$stmt->store_result();
			$this->total_items = $stmt->num_rows();
		}
		if ($stmt = $con->prepare($total_quests_sql)){
			$stmt->execute();
			$stmt->store_result();
			$this->total_quests = $stmt->num_rows();
		}
		$stmt->close();
		$con->close();
	}
	function get_accounts(){
		global $DB_AUTH;
		$con = $this->connection();
		$sql="SELECT * FROM ".$DB_AUTH.".account";
		if ($stmt = $con->prepare($sql)){
			$stmt->execute();
			$stmt->store_result();
			$this->total_accounts = $stmt->num_rows();
		}
		$stmt->close();
		$con->close();
	}
	function get_characters(){
		global $DB_CHARACTERS;
		$con = $this->connection();
		$sql="SELECT race,class FROM ".$DB_CHARACTERS.".characters";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->store_result();
			$this->total_characters = $stmt->num_rows();
			$stmt->bind_result($_race,$_class);
			while ($stmt->fetch()) {
				if ($_race == 1 || $_race == 3 || $_race == 4 || $_race == 7 || $_race == 11)
					$this->total_al++;
				else
					$this->total_hd++;
				switch ($_class) {
					case 1:
						$this->total_Warrior++;
						break;
					case 2:
						$this->total_Paladin++;
						break;
					case 3:
						$this->total_Hunter++;
						break;
					case 4:
						$this->total_Rogue++;
						break;
					case 5:
						$this->total_Priest++;
						break;
					case 6:
						$this->total_DeathKnight++;
						break;
					case 7:
						$this->total_Shaman++;
						break;
					case 8:
						$this->total_Mage++;
						break;
					case 9:
						$this->total_Warlock++;
						break;
					case 11:
						$this->total_Druid++;
						break;
				}
				switch ($_race) {
					case 1:
						$this->total_Human++;
						break;
					case 2:
						$this->total_Orc++;
						break;
					case 3:
						$this->total_Dwarf++;
						break;
					case 4:
						$this->total_NightElf++;
						break;
					case 5:
						$this->total_Undead++;
						break;
					case 6:
						$this->total_Tauren++;
						break;
					case 7:
						$this->total_Gnome++;
						break;
					case 8:
						$this->total_Troll++;
						break;
					case 10:
						$this->total_BloodElf++;
						break;
					case 11:
						$this->total_Draenei++;
						break;
				}
			}
		}
		$stmt->close();
		$con->close();
	}
	function get_onlinechars(){
		global $DB_CHARACTERS;
		$con = $this->connection();
		$i=0;
		$sql="SELECT guid,account,name,race,class,gender,level,online FROM ".$DB_CHARACTERS.".characters WHERE online = 1 ORDER BY `name` ";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_guid, $_account, $_name, $_race, $_class, $_gender, $_level, $_online);
			while ($stmt->fetch()) {
				$this->charsonline['charguid'][$i] = $_guid;
				$this->charsonline['account'][$i] = $_account;
				$this->charsonline['charname'][$i] = $_name;
				$this->charsonline['race'][$i] = $_race;
				$this->charsonline['class'][$i] = $_class;
				$this->charsonline['gender'][$i] = $_gender;
				$this->charsonline['level'][$i] = $_level;
				$this->charsonline['online'][$i] = $_online;
				$i++;
			}
		}
		$stmt->close();
		$con->close();
	}
	
	function get_online_players(){
		global $DB_CHARACTERS;
		$con = $this->connection();
		$sql = "SELECT race FROM ".$DB_CHARACTERS.".characters WHERE `online`='1'";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_race);
			$stmt->store_result();
			while ($stmt->fetch()) {
				if ($_race == 1 || $_race == 3 || $_race == 4 || $_race == 7 || $_race == 11)
					$this->alliance++;
				else
					$this->horde++;
			}
			$this->total_online = $stmt->num_rows();
		}
		$stmt->close();
		$con->close();
	}
	
	function uptime_info(){
		global $DB_AUTH;
		$con = $this->connection();
		$sql = "SELECT starttime,uptime FROM ".$DB_AUTH.".`uptime` where realmid=1 ORDER BY `starttime` DESC LIMIT 1";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_starttime,$_uptime);
			while ($stmt->fetch()) {
				$this->starttime = $_starttime;
				$this->uptime = $_uptime;
			}
		}
		$stmt->close();
		$con->close();
	}
	function record_uptime(){
		global $DB_AUTH;
		$con = $this->connection();
		$sql = "SELECT uptime FROM ".$DB_AUTH.".`uptime` ORDER BY `uptime` DESC LIMIT 1";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_uptime);
			while ($stmt->fetch()) {
				$this->maxuptime = $_uptime;
			}
		}
		$stmt->close();
		$con->close();
	}
	function record_players(){
		global $DB_AUTH;
		$con = $this->connection();
		$sql = "SELECT maxplayers FROM ".$DB_AUTH.".`uptime` ORDER BY `maxplayers` DESC LIMIT 1";
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_maxplayers);
			while ($stmt->fetch()) {
				$this->maxplayers = $_maxplayers;
			}
		}
		$stmt->close();
		$con->close();
	}
	function realm_info($realmid){
		global $DB_AUTH;
		$con = $this->connection();
		$sql = "SELECT id,name FROM ".$DB_AUTH.".`realmlist` WHERE `id`=?";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("i",$realmid);
			$stmt->execute();
			$stmt->bind_result($_id,$_name);
			while ($stmt->fetch()) {
				$this->realm_id = $_id;
				$this->rm_name = $_name;
			}
		}
	}
	function percentages($realm) {
		$this->construct($realm);
		if ($this->total_al > 0 && $this->total_hd > 0){
			$this->percent_horde = ($this->total_characters - $this->total_al) * 100 / $this->total_characters;
			$this->percent_alliance = ($this->total_characters - $this->total_hd) * 100 / $this->total_characters;
		}
		else
		{
			$this->percent_horde = 0;
			$this->percent_alliance = 0;
		}
		
		if ($this->total_Warrior > 0)
			$this->perc_Warrior = 			$this->total_Warrior * 100 / $this->total_characters;
		else 
			$this->perc_Warrior = 0;
		if ($this->total_Paladin > 0)
			$this->perc_Paladin = 			$this->total_Paladin * 100 / $this->total_characters;
		else 
			$this->perc_Paladin = 0;
		if ($this->total_Hunter > 0)
			$this->perc_Hunter = 			$this->total_Hunter * 100 / $this->total_characters;
		else 
			$this->perc_Hunter = 0;
		if ($this->total_Rogue > 0)
			$this->perc_Rogue = 			$this->total_Rogue * 100 / $this->total_characters;
		else 
			$this->perc_Rogue = 0;
		if ($this->total_Priest > 0)
			$this->perc_Priest = 			$this->total_Priest * 100 / $this->total_characters;
		else 
			$this->perc_Priest = 0;
		if ($this->total_DeathKnight > 0)
			$this->perc_DeathKnight = 			$this->total_DeathKnight * 100 / $this->total_characters;
		else 
			$this->perc_DeathKnight = 0;
		if ($this->total_Shaman > 0)
			$this->perc_Shaman = 			$this->total_Shaman * 100 / $this->total_characters;
		else 
			$this->perc_Shaman = 0;
		if ($this->total_Mage > 0)
			$this->perc_Mage = 			$this->total_Mage * 100 / $this->total_characters;
		else 
			$this->perc_Mage = 0;
		if ($this->total_Warlock > 0)
			$this->perc_Warlock = 			$this->total_Warlock * 100 / $this->total_characters;
		else 
			$this->perc_Warlock = 0;
		if ($this->total_Druid > 0)
			$this->perc_Druid = 			$this->total_Druid * 100 / $this->total_characters;
		else 
			$this->perc_Druid = 0;
		if ($this->total_Human > 0)
			$this->perc_Human = 			$this->total_Human * 100 / $this->total_characters;
		else 
			$this->perc_Human = 0;
		if ($this->total_Orc > 0)
			$this->perc_Orc = 			$this->total_Orc * 100 / $this->total_characters;
		else 
			$this->perc_Orc = 0;
		if ($this->total_Dwarf > 0)
			$this->perc_Dwarf = 			$this->total_Dwarf * 100 / $this->total_characters;
		else 
			$this->perc_Dwarf = 0;
		if ($this->total_NightElf > 0)
			$this->perc_NightElf = 			$this->total_NightElf * 100 / $this->total_characters;
		else 
			$this->perc_NightElf = 0;
		if ($this->total_Undead > 0)
			$this->perc_Undead = 			$this->total_Undead * 100 / $this->total_characters;
		else 
			$this->perc_Undead = 0;
		if ($this->total_Tauren > 0)
			$this->perc_Tauren = 			$this->total_Tauren * 100 / $this->total_characters;
		else 
			$this->perc_Tauren = 0;
		if ($this->total_Gnome > 0)
			$this->perc_Gnome = 			$this->total_Gnome * 100 / $this->total_characters;
		else 
			$this->perc_Gnome = 0;
		if ($this->total_Troll > 0)
			$this->perc_Troll = 			$this->total_Troll * 100 / $this->total_characters;
		else 
			$this->perc_Troll = 0;
		if ($this->total_BloodElf > 0)
			$this->perc_BloodElf = 			$this->total_BloodElf * 100 / $this->total_characters;
		else 
			$this->perc_BloodElf = 0;
		if ($this->total_Draenei > 0)
			$this->perc_Draenei = 			$this->total_Draenei * 100 / $this->total_characters;
		else 
			$this->perc_Draenei = 0;
	}
	function stats(){
		$this->get_world_stats();
		$this->get_accounts();
		$this->get_characters();
	}
	function construct($realm){
		$this->realm_info($realm);
		$this->get_online_players();
		$this->uptime_info();
		$this->record_uptime();
		$this->record_players();
	}
	function get_all($realm){
		$this->construct($realm);
		$this->stats();
		$this->get_onlinechars();
		$this->percentages($realm);
	}
}

function level_by_account($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$gmlevel = 0;
	$gmlevel_sql = "SELECT gmlevel FROM ".$DB_AUTH.".account_access WHERE `id`=?";
	$viplevel_sql = "SELECT VipLevel FROM ".$DB_AUTH.".account WHERE `id`=?";
	if ($stmt = $con->prepare($gmlevel_sql)) {
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($_gmlevel);
		while ($stmt->fetch()) {
			$gmlevel = $_gmlevel;
		}
		$stmt->close();
	}
	if ($stmt = $con->prepare($viplevel_sql)) {
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($_VipLevel);
		while ($stmt->fetch()) {
			$viplvl = $_VipLevel;
		}
		$stmt->close();
	}

	if ($gmlevel < 4){
		$levelstring = '<span style="color:#FFFFFF;">Player</span>';
	}
	if ($gmlevel == 4){
		$levelstring = vip_level_string($viplvl);
	}
	if ($gmlevel > 4){
		$levelstring = '<span style="color:#66FF33;">STAFF MEMBER</span>';
	}
	return $levelstring;
	$con->close();
}
?>