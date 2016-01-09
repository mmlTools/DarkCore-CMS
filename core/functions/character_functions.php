<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 
function item_exist($entry){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WORLD;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select * from ".$DB_WORLD.".item_template where entry=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $entry);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows() == 0)
			return 0;
		else
			return 1;
	}
	return 0;
	$stmt->close();
	$con->close();
}

function character_exist($name){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_CHARACTERS.".characters where name=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows() == 0)
			return false;
		else
			return true;
	}
	return false;
	$stmt->close();
	$con->close();
}
function get_charname_byguid($guid){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$stmt = $con->prepare("SELECT name FROM ".$DB_CHARACTERS.".characters WHERE guid=?");
	$stmt->bind_param('i', $guid);
	$stmt->execute();
	$stmt->bind_result($_name);
	while ($stmt->fetch()) {
		return $_name;
	}
	$stmt->close();
	$con->close();
}
function entryByGUID($guid){
	global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_CHARACTERS;
	$con = connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
	$sql = "select itemEntry from " . $DB_CHARACTERS . ".item_instance where guid=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $guid);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows() > 0) {
			$stmt->bind_result($_itemEntry);
			while ($stmt->fetch()) {
				if (item_exist($_itemEntry) == 1)
					$entry = $_itemEntry;
				else
					$entry = 0;
			}
			return $entry;
		}
	}
	return 0;
	$stmt->close();
	$con->close();
}


class character{
	public $data1=array(0,0,0,0,0,0,0,0);     public $maxhealth;       public $stamina;              public $blockPct;
	public $data2=array(0,0,0);               public $maxpower1;       public $intellect;            public $dodgePct;
	public $data3=array(0,0,0,0,0,0,0,0);     public $maxpower2;       public $spirit;               public $parryPct;
	public $charname;                         public $maxpower3;       public $armor;                public $critPct;
	public $charguid;                         public $maxpower4;       public $resHoly;              public $rangedCritPct;
	public $race;                             public $maxpower5;       public $resFire;              public $spellCritPct;
	public $class;                            public $maxpower6;       public $resNature;            public $attackPower;
	public $gender;                           public $maxpower7;       public $resFrost;             public $rangedAttackPower;
	public $level;                            public $strength;        public $resShadow;            public $spellPower;
	public $online;                           public $agility;         public $resArcane;            public $resilience;
	
	function get_char_info($charname){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql="SELECT guid,name,race,class,gender,level,online FROM ".$DB_CHARACTERS.".characters WHERE name = ?";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("s", $charname);
			$stmt->execute();
			$stmt->bind_result($_guid, $_name, $_race, $_class, $_gender, $_level, $_online);
			while ($stmt->fetch()) {
				$this->charguid = $_guid;
				$this->charname = $_name;
				$this->race = $_race;
				$this->class = $_class;
				$this->gender = $_gender;
				$this->level = $_level;
				$this->online = $_online;
			}
		}
		$stmt->close();
		$con->close();
	}
	
	function get_char_stats($guid){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT maxhealth,maxpower1,maxpower2,maxpower3,maxpower4,maxpower5,maxpower6,maxpower7,strength,agility,stamina,intellect,spirit,armor,resHoly,resFire,resNature,resFrost,resShadow,resArcane,blockPct,dodgePct,parryPct,critPct,rangedCritPct,spellCritPct,attackPower,rangedAttackPower,spellPower,resilience from ".$DB_CHARACTERS.".character_stats WHERE guid =?";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("i", $guid);
			$stmt->execute();
			$stmt->bind_result($_maxhealth,$_maxpower1,$_maxpower2,$_maxpower3,$_maxpower4,$_maxpower5,$_maxpower6,$_maxpower7,$_strength,$_agility,$_stamina,$_intellect,$_spirit,$_armor,$_resHoly,$_resFire,$_resNature,$_resFrost,$_resShadow,$_resArcane,$_blockPct,$_dodgePct,$_parryPct,$_critPct,$_rangedCritPct,$_spellCritPct,$_attackPower,$_rangedAttackPower,$_spellPower,$_resilience);
			while ($stmt->fetch()) {
				$this->strength = $_strength;
				$this->maxhealth = $_maxhealth;
				$this->agility = $_agility;
				$this->maxpower1 = $_maxpower1;//mana
				$this->stamina = $_stamina;
				$this->maxpower2 = $_maxpower2;//rage
				$this->intellect = $_intellect;
				$this->maxpower3 = $_maxpower3;//focus
				$this->spirit = $_spirit;
				$this->maxpower4 = $_maxpower4;//energy
				$this->armor = $_armor;
				$this->maxpower5 = $_maxpower5;//happyness
				$this->spellPower = $_spellPower;
				$this->maxpower6 = $_maxpower6;//rune
				$this->resilience = $_resilience;
				$this->maxpower7 = $_maxpower7;//runic power
				$this->resHoly = $_resHoly;
				$this->blockPct = $_blockPct;
				$this->resFire = $_resFire;
				$this->dodgePct = $_dodgePct;
				$this->resNature = $_resNature;
				$this->parryPct = $_parryPct;
				$this->resFrost = $_resFrost;
				$this->critPct = $_critPct;
				$this->resShadow = $_resShadow;
				$this->rangedCritPct = $_rangedCritPct;
				$this->resArcane = $_resArcane;
				$this->spellCritPct = $_spellCritPct;
				$this->rangedAttackPower = $_rangedAttackPower;
				$this->attackPower = $_attackPower;
			}
		}
		$stmt->close();
		$con->close();
	}
	function get_char_equipment($guid){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "select slot,item from ".$DB_CHARACTERS.".character_inventory where guid=? and bag = 0 and slot in( 0 , 1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10, 11, 12, 13, 14, 15, 16, 17, 18);";
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("i", $guid);
			$stmt->execute();
			$stmt->store_result();
			if ($stmt->num_rows() < 1)
				return 0;
			else {
				$stmt->bind_result($_slot,$_item);
				while ($stmt->fetch()) {
					if ($_slot == 0 || $_slot == 1 || $_slot == 2 || $_slot == 14 || $_slot == 4 || $_slot == 3 || $_slot == 18 || $_slot == 8) {
						$this->data1[$_slot] = entryByGUID($_item);
					} else if ($_slot == 15 || $_slot == 16 || $_slot == 17) {
						$this->data2[$_slot] = entryByGUID($_item);
					} else if ($_slot == 9 || $_slot == 5 || $_slot == 6 || $_slot == 7 || $_slot == 10 || $_slot == 11 || $_slot == 12 || $_slot == 13) {
						$this->data3[$_slot] = entryByGUID($_item);
					}
				}
			}
		}
		$stmt->close();
		$con->close();
	}
	function construct($name){
		$this->get_char_info($name);
		$this->get_char_stats($this->charguid);
	}
}
?>