<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');} 

function get_basic_guild($criteria,$page,$limit)
{
	global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_CHARACTERS;
	$con = connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
	$from = ($page - 1) * $limit;
	$sql = "SELECT guildid,name,leaderguid FROM " . $DB_CHARACTERS . ".guild where name like ? order by guildid ASC limit ?,?";
	$i = 1;
	$crit = '%'.ucfirst($criteria).'%';
	$guilds = array();
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("sii", $crit, $from, $limit);
		$stmt->execute();
		$stmt->bind_result($_guildid, $_name, $_leaderguid);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$guilds[$i] = array(
				'id' => $_guildid,
				'name' => $_name,
				'leader' => $_leaderguid);
			$i++;
		}
		return $guilds;
	}
	$stmt->close();
	$con->close();
}
function get_guild_members($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_CHARACTERS.".guild_member where guildid=?";
	$total_members = 0;
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->store_result();
		$total_members = $stmt->num_rows();
	}
	return $total_members;
	$stmt->close();
	$con->close();
}
function get_guild_leader($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT name FROM ".$DB_CHARACTERS.".characters where guid=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->bind_result($_name);
		while ($stmt->fetch()) {
			$leadername = $_name;
		}
		return $leadername;
	}
	$stmt->close();
	$con->close();
}

function get_basic_char($criteria,$page,$limit){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$from = ($page-1) * $limit;
	$crit = '%'.ucfirst($criteria).'%';
	$sql = "SELECT guid,name,race,class,gender,level,totalKills FROM ".$DB_CHARACTERS.".characters where name like ? order by guid ASC limit ?,?";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("sii", $crit, $from, $limit);
		$stmt->execute();
		$stmt->bind_result($_guid, $_name, $_race, $_class, $_gender, $_level, $_totalKills);
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
	$stmt->close();
	$con->close();
}

function get_basic_item($criteria,$cur_page,$limit){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WORLD;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$from = ($cur_page-1) * $limit;
	$crit = '%'.ucfirst($criteria).'%';
	$sql = "SELECT entry,displayid,quality,name,class,subclass,inventorytype,itemlevel,requiredlevel FROM ".$DB_WORLD.".item_template where name like ? order by entry ASC limit ?,?";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("sii",$crit, $from, $limit);
		$stmt->execute();
		$stmt->bind_result($_entry, $_displayid, $_quality, $_name, $_class, $_subclass, $_inventorytype, $_itemlevel, $_requiredlevel);
		while ($stmt->fetch()) {
			$item[$i] = array(
				'entry' 			=> $_entry,
				'display' 			=> $_displayid,
				'quality' 			=> $_quality,
				'name' 				=> $_name,
				'class' 			=> $_class,
				'subclass' 			=> $_subclass,
				'intentorytype'	 	=> $_inventorytype,
				'ilevel'		 	=> $_itemlevel,
				'reqlevel' 			=> $_requiredlevel);
			$i++;
		}
		return $item;
	}
	$stmt->close();
	$con->close();
}
function get_item_data($i_entry)
{
	global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_WORLD;
	$con = connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
	$sql = "SELECT `name`,`entry`,`Quality`,`displayid`,`bonding`,`InventoryType`,`class`,`subclass`,`ContainerSlots`,`socketColor_1`,`socketColor_2`,`socketColor_3`,`MaxDurability`,`RequiredLevel`,`ItemLevel`,`delay`,`BuyPrice`,`SellPrice`,`stat_type1`,`stat_type1`,`stat_type2`,`stat_type3`,`stat_type4`,`stat_type5`,`stat_type6`,`stat_type7`,`stat_type8`,`stat_type9`,`stat_type10`,`dmg_min1`,`dmg_max1`,`stat_value1`,`stat_value1`,`stat_value2`,`stat_value3`,`stat_value4`,`stat_value5`,`stat_value6`,`stat_value7`,`stat_value8`,`stat_value9`,`stat_value10`,`spellid_1`,`spellid_2`,`spellid_3`,`spellid_4`,`spellid_5`,`spelltrigger_1`,`spelltrigger_2`,`spelltrigger_3`,`spelltrigger_4`,`spelltrigger_5` FROM " . $DB_WORLD . ".`item_template` WHERE entry=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i",$i_entry);
		$stmt->execute();
		$stmt->bind_result($_name,$_entry,$_Quality,$_displayid,$_bonding,$_InventoryType,$_class,$_subclass,$_ContainerSlots,$_socketColor_1,$_socketColor_2,$_socketColor_3,$_MaxDurability,$_RequiredLevel,$_ItemLevel,$_delay,$_BuyPrice,$_SellPrice,$_stat_type1,$_stat_type1,$_stat_type2,$_stat_type3,$_stat_type4,$_stat_type5,$_stat_type6,$_stat_type7,$_stat_type8,$_stat_type9,$_stat_type10,$_dmg_min1,$_dmg_max1,$_stat_value1,$_stat_value1,$_stat_value2,$_stat_value3,$_stat_value4,$_stat_value5,$_stat_value6,$_stat_value7,$_stat_value8,$_stat_value9,$_stat_value10,$_spellid_1,$_spellid_2,$_spellid_3,$_spellid_4,$_spellid_5,$_spelltrigger_1,$_spelltrigger_2,$_spelltrigger_3,$_spelltrigger_4,$_spelltrigger_5);
		$stmt->store_result();
		if ($stmt->num_rows() < 1)
			echo 'Invalid Entry ID';
		else {
			while ($stmt->fetch()) {
				$item_informations_data = array(
					'name' => $_name,
					'stat_type1' => $_stat_type1,
					'stat_value1' => $_stat_value1,
					'entry' => $_entry,
					'quality' => $_Quality,
					'stat_type2' => $_stat_type2,
					'stat_value2' => $_stat_value2,
					'displayID' => $_displayid,
					'stat_type3' => $_stat_type3,
					'stat_value3' => $_stat_value3,
					'bonding' => $_bonding,
					'stat_type4' => $_stat_type4,
					'stat_value4' => $_stat_value4,
					'invtype' => $_InventoryType,
					'stat_type5' => $_stat_type5,
					'stat_value5' => $_stat_value5,
					'class' => $_class,
					'stat_type6' => $_stat_type6,
					'stat_value6' => $_stat_value6,
					'subclass' => $_subclass,
					'stat_type7' => $_stat_type7,
					'stat_value7' => $_stat_value7,
					'contslots' => $_ContainerSlots,
					'stat_type8' => $_stat_type8,
					'stat_value8' => $_stat_value8,
					'socket1' => $_socketColor_1,
					'stat_type9' => $_stat_type9,
					'stat_value9' => $_stat_value9,
					'socket2' => $_socketColor_2,
					'stat_type10' => $_stat_type10,
					'stat_value10' => $_stat_value10,
					'socket3' => $_socketColor_3,
					'dmg_min' => $_dmg_min1,
					'durability' => $_MaxDurability,
					'dmg_max' => $_dmg_max1,
					'requiredlevel' => $_RequiredLevel,
					'itemlevel' => $_ItemLevel,
					'speed' => $_delay,
					'buyprice' => $_BuyPrice,
					'sellprice' => $_SellPrice,
					'spell1' => $_spellid_1,
					'spell2' => $_spellid_2,
					'spell3' => $_spellid_3,
					'spell4' => $_spellid_4,
					'spell5' => $_spellid_5,
					'strigger1' => $_spelltrigger_1,
					'strigger2' => $_spelltrigger_2,
					'strigger3' => $_spelltrigger_3,
					'strigger4' => $_spelltrigger_4,
					'strigger5' => $_spelltrigger_5);
			}
		}
		return $item_informations_data;
	}
	$stmt->close();
	$con->close();
}

function return_item_string($item_entry){
		$data = get_item_data($item_entry);
		$string = '<table>';
		$string .= "<tr><td class='item_name'>".qualityString($data["quality"],$data["name"])."</td></tr>";
	if($data["itemlevel"] > 0) 
		$string .= "<tr><td class='armory-itemlevel'> Item Level " . $data["itemlevel"]."</td></tr>"; 
	if($data["bonding"] > 0)
		$string .= "<tr><td class='armory-bonding'>".bondingstring($data["bonding"])."</td></tr>";
		$string .= "<tr><td class='armory-inventorytype'>".inventorytypeString($data["invtype"])."</td> <td class='armory-itemclass'>".itemclass($data["class"],$data["subclass"])."</td></tr>";
	if ($data["dmg_min"] > 0 && $data["dmg_max"] > 0 && $data["speed"] > 0)
		$string .= "<tr><td class='armory-dmgmin'>".$data["dmg_min"]."</td><td class='armory-dmdiv'>-</td><td class='armory-dmgmax'> ".$data["dmg_max"]." Damage</td> <td class='armory-speed'>Speed ".number_format((float)($data["speed"]/1000), 2, '.', '')."</td></tr>";
	if ($data["stat_type1"]<=7 && $data["stat_value1"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value1"]." ".stat_typeString($data["stat_type1"])."</td></tr>";
	if ($data["stat_type2"]<=7 && $data["stat_value2"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value2"]." ".stat_typeString($data["stat_type2"])."</td></tr>";
	if ($data["stat_type3"]<=7 && $data["stat_value3"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value3"]." ".stat_typeString($data["stat_type3"])."</td></tr>";
	if ($data["stat_type4"]<=7 && $data["stat_value4"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value4"]." ".stat_typeString($data["stat_type4"])."</td></tr>";
	if ($data["stat_type5"]<=7 && $data["stat_value5"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value5"]." ".stat_typeString($data["stat_type5"])."</td></tr>";
	if ($data["stat_type6"]<=7 && $data["stat_value6"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value6"]." ".stat_typeString($data["stat_type6"])."</td></tr>";
	if ($data["stat_type7"]<=7 && $data["stat_value7"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value7"]." ".stat_typeString($data["stat_type7"])."</td></tr>";
	if ($data["stat_type8"]<=7 && $data["stat_value8"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value8"]." ".stat_typeString($data["stat_type8"])."</td></tr>";
	if ($data["stat_type9"]<=7 && $data["stat_value9"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value9"]." ".stat_typeString($data["stat_type9"])."</td></tr>";
	if ($data["stat_type10"]<=7 && $data["stat_value10"]>0)
		$string .= "<tr><td class='stats_1'>+".$data["stat_value10"]." ".stat_typeString($data["stat_type10"])."</td></tr>";
	if ($data["durability"] > 0)
		$string .= "<tr><td class='durability'>Durability " . $data["durability"] . '/' . $data["durability"]."</td></tr>"; 
	if ($data["socket1"] > 0)
		$string .= "<tr>".socketColor($data["socket1"])."</tr>";
	if ($data["socket2"] > 0)
		$string .= "<tr>".socketColor($data["socket2"])."</tr>";
	if ($data["socket3"] > 0)
		$string .= "<tr>".socketColor($data["socket3"])."</tr>";
	if($data["requiredlevel"] > 0)
		$string .= "<tr><td class='lvlreq'>Requires Level " . $data["requiredlevel"]."</td></tr>";	
	if ($data["stat_type1"]>=8 && $data["stat_value1"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type1"])." by " . $data["stat_value1"] . "</font></td></tr>"; 
	if ($data["stat_type2"]>=8 && $data["stat_value2"]>0)  
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type2"])." by " . $data["stat_value2"] . "</font></td></tr>"; 
	if ($data["stat_type3"]>=8 && $data["stat_value3"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type3"])." by " . $data["stat_value3"] . "</font></td></tr>"; 
	if ($data["stat_type4"]>=8 && $data["stat_value4"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type4"])." by " . $data["stat_value4"] . "</font></td></tr>"; 
	if ($data["stat_type5"]>=8 && $data["stat_value5"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type5"])." by " . $data["stat_value5"] . "</font></td></tr>"; 
	if ($data["stat_type6"]>=8 && $data["stat_value6"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type6"])." by " . $data["stat_value6"] . "</font></td></tr>"; 
	if ($data["stat_type7"]>=8 && $data["stat_value7"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type7"])." by " . $data["stat_value7"] . "</font></td></tr>"; 
	if ($data["stat_type8"]>=8 && $data["stat_value8"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type8"])." by " . $data["stat_value8"] . "</font></td></tr>"; 
	if ($data["stat_type9"]>=8 && $data["stat_value9"]>0)   
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type9"])." by " . $data["stat_value9"] . "</font></td></tr>"; 
	if ($data["stat_type10"]>=8 && $data["stat_value10"]>0) 
		$string .= "<tr><td class='stats_2'><font color='#1eff00'>Equip: Increases ".stat_typeString($data["stat_type10"])." by " . $data["stat_value10"] . "</font></td></tr>"; 			
	if ($data["spell1"] > 0) 
		$string .= "<tr><td class='spell'>".spellStrings($data["spell1"],$data["strigger1"])."</td></tr>";
	if ($data["spell2"] > 0) 
		$string .= "<tr><td class='spell'>".spellStrings($data["spell2"],$data["strigger2"])."</td></tr>";
	if ($data["spell3"] > 0) 
		$string .= "<tr><td class='spell'>".spellStrings($data["spell3"],$data["strigger3"])."</td></tr>";
	if ($data["spell4"] > 0) 
		$string .= "<tr><td class='spell'>".spellStrings($data["spell4"],$data["strigger4"])."</td></tr>";
	if ($data["spell5"] > 0) 
		$string .= "<tr><td class='spell'>".spellStrings($data["spell5"],$data["strigger5"])."</td></tr>";
		return $string;
}
function getstring($spellid){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql ="SELECT description FROM ".$DB_WEBSITE.".spell_description WHERE spellid =?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i", $spellid);
		$stmt->execute();
		$stmt->bind_result($_description);
		$stmt->store_result();
		if ($stmt->num_rows() < 1)
			$sdescription = '-------This spell have no description-------';
		else {
			while ($stmt->fetch()) {
				$sdescription = $_description;
			}
		}
		return $sdescription;
	}
	$stmt->close();
	$con->close();
}

function geticon($dispid){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql ="SELECT icon_name FROM ".$DB_WEBSITE.".item_display WHERE displayid =?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("i",$dispid);
		$stmt->execute();
		$stmt->bind_result($_icon_name);
		$stmt->store_result();
		if ($stmt->num_rows() < 1)
			$itemdisplayid = 'http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg';
		else {
			while ($stmt->fetch()) {
				$itemdisplayid = "http://wow.zamimg.com/images/wow/icons/large/" . $_icon_name . ".jpg";
			}
		}
		return $itemdisplayid;
	}
	$stmt->close();
	$con->close();
}

function itemclass($class,$subclass){
	switch($class){
		case 0:
			switch($subclass){
			case 0:$itemtype = "Consumable";break;
			case 1:$itemtype = "Potion";break;
			case 2:$itemtype = "Elixir";break;
			case 3:$itemtype = "Flask";break;
			case 4:$itemtype = "Scroll";break;
			case 5:$itemtype = "Food & Drink";break;
			case 6:$itemtype = "Item Enhancement";break;
			case 7:$itemtype = "Bandage";break;
			case 8:$itemtype = "Other";break;
			}
			break;
		case 1:
			switch($subclass){
			case 0:$itemtype = "Bag";break;
			case 1:$itemtype = "Soul Bag";break;
			case 2:$itemtype = "Herb Bag";break;
			case 3:$itemtype = "Enchanting Bag";break;
			case 4:$itemtype = "Engineering Bag";break;
			case 5:$itemtype = "Gem Bag";break;
			case 6:$itemtype = "Mining Bag";break;
			case 7:$itemtype = "Leatherworking Bag";break;
			case 8:$itemtype = "Inscription Bag";break;
			}
			break;
		case 2:
			switch($subclass){
			case 0:$itemtype = "Axe";break;
			case 1:$itemtype = "Axe";break;
			case 2:$itemtype = "Bow";break;
			case 3:$itemtype = "Gun";break;
			case 4:$itemtype = "Mace";break;
			case 5:$itemtype = "Mace";break;
			case 6:$itemtype = "Polearm";break;
			case 7:$itemtype = "Sword";break;
			case 8:$itemtype = "Sword";break;
			case 9:$itemtype = "Obsolete";break;
			case 10:$itemtype = "Staff";break;
			case 11:$itemtype = "Exotic";break;
			case 12:$itemtype = "Exotic";break;
			case 13:$itemtype = "Fist Weapon";break;
			case 14:$itemtype = "Miscellaneous";break;
			case 15:$itemtype = "Dagger";break;
			case 16:$itemtype = "Thrown";break;
			case 17:$itemtype = "Spear";break;
			case 18:$itemtype = "Crossbow";break;
			case 19:$itemtype = "Wand";break;
			case 20:$itemtype = "Fishing Pole";break;
			}
			break;
		case 3:
			switch($subclass){
			case 0:$itemtype = "Red";break;
			case 1:$itemtype = "Blue";break;
			case 2:$itemtype = "Yellow";break;
			case 3:$itemtype = "Purple";break;
			case 4:$itemtype = "Green";break;
			case 5:$itemtype = "Orange";break;
			case 6:$itemtype = "Meta";break;
			case 7:$itemtype = "Simple";break;
			case 8:$itemtype = "Prismatic";break;
			}
			break;
		case 4:
			switch($subclass){
			case 0:$itemtype =  "Miscellaneous";break;
			case 1:$itemtype =  "Cloth";break;
			case 2:$itemtype =  "Leather";break;
			case 3:$itemtype =  "Mail";break;
			case 4:$itemtype =  "Plate";break;
			case 5:$itemtype =  "Buckler";break;
			case 6:$itemtype =  "Shield";break;
			case 7:$itemtype =  "Litram";break;
			case 8:$itemtype =  "Idol";break;
			case 9:$itemtype =  "Totem";break;
			case 10:$itemtype = "Sigil";break;
			}
			break;
		case 5:
			switch($subclass){
			case 0:$itemtype =  "Reagent";break;
			}
			break;
		case 6:
			switch($subclass){
			case 0:$itemtype =  "Wand";break;
			case 1:$itemtype =  "Bolt";break;
			case 2:$itemtype =  "Arrow";break;
			case 3:$itemtype =  "Bullet";break;
			case 4:$itemtype =  "Thrown";break;
			}
			break;
		case 7:
			switch($subclass){
			case 0:$itemtype = "Trade Goods";break;
			case 1:$itemtype = "Parts";break;
			case 2:$itemtype = "Explosives";break;
			case 3:$itemtype = "Devices";break;
			case 4:$itemtype = "Jewelcrafting";break;
			case 5:$itemtype = "Cloth";break;
			case 6:$itemtype = "Leather";break;
			case 7:$itemtype = "Metal & Stone";break;
			case 8:$itemtype = "Meat";break;
			case 9:$itemtype = "Herb";break;
			case 10:$itemtype = "Elemental";break;
			case 11:$itemtype = "Other";break;
			case 12:$itemtype = "Enchanting";break;
			case 13:$itemtype = "Materials";break;
			case 14:$itemtype = "Armor Enchantment";break;
			case 15:$itemtype = "Weapon Enchantment";break;
			}
			break;
		case 8:
			switch($subclass){
			case 0:$itemtype = "Generic";break;
			}
			break;
		case 9:
			switch($subclass){
			case 0:$itemtype = "Book";break;
			case 1:$itemtype = "Leatherworking";break;
			case 2:$itemtype = "Tailoring";break;
			case 3:$itemtype = "Engineering";break;
			case 4:$itemtype = "Blacksmithing";break;
			case 5:$itemtype = "Cooking";break;
			case 6:$itemtype = "Alchemy";break;
			case 7:$itemtype = "First Aid";break;
			case 8:$itemtype = "Enchanting";break;
			case 9:$itemtype = "Fishing";break;
			case 10:$itemtype = "Jewelcrafting";break;
			}
			break;
		case 10:
			switch($subclass){
			case 0:$itemtype = "Money";break;
			}
			break;
		case 11:
			switch($subclass){
			case 0:$itemtype = "Quiver";break;
			case 1:$itemtype = "Quiver";break;
			case 2:$itemtype = "Quiver";break;
			case 3:$itemtype = "Ammo Pouch";break;
			}
			break;
		case 12:
			switch($subclass){
			case 0:$itemtype = "Quest";break;
			}
			break;
		case 13:
			switch($subclass){
			case 0:$itemtype = "Key";break;
			case 1:$itemtype = "Lockpick";break;
			}
			break;
		case 14:
			switch($subclass){
			case 0:$itemtype = "Permanent";break;
			}
			break;
		case 15:
			switch($subclass){
			case 0:$itemtype = "Junk";break;
			case 1:$itemtype = "Reagent";break;
			case 2:$itemtype = "Pet";break;
			case 3:$itemtype = "Holiday";break;
			case 4:$itemtype = "Other";break;
			case 5:$itemtype = "Mount";break;
			}
			break;
		case 16:
			switch($subclass){
			case 1:$itemtype = "Warrior";break;
			case 2:$itemtype = "Paladin";break;
			case 3:$itemtype = "Hunter";break;
			case 4:$itemtype = "Rogue";break;
			case 5:$itemtype = "Priest";break;
			case 6:$itemtype = "Death Knight";break;
			case 7:$itemtype = "Shaman";break;
			case 8:$itemtype = "Mage";break;
			case 9:$itemtype = "Warlock";break;
			case 11:$itemtype = "Druid";break;
			}
			break;
	}
	return $itemtype;
}

function qualityString($quality,$name){
	switch($quality) {
		case 0: $itemname = "<font color='#9d9d9d'>$name</font>";break;
		case 1: $itemname = "<font color='#FFFFFF'>$name</font>";break;
		case 2: $itemname = "<font color='#1eff00'>$name</font>";break;
		case 3: $itemname = "<font color='#0070dd'>$name</font>";break;
		case 4: $itemname = "<font color='#a335ee'>$name</font>";break;
		case 5: $itemname = "<font color='#ff8000'>$name</font>";break;
		case 6: $itemname = "<font color='#e6cc80'>$name</font>";break;
		case 7: $itemname = "<font color='#e6cc80'>$name</font>";break;
	}
	return $itemname;
}
function bondingstring($bonding){
	switch($bonding) {
		case 0: $bonding = "";break;
		case 1: $bonding = "Binds when picked up";break;
		case 2: $bonding = "Binds when equipped";break;
		case 3: $bonding = "Binds when used";break;
		case 4: $bonding = "Quest item";break;
		case 5: $bonding = "Quest item";break;
	}
	return $bonding;
}
function inventorytypeString($type){
	switch($type){
		case 0: $invtype = "Non equipable";break;
		case 1: $invtype = "Head";break;
		case 2: $invtype = "Neck";break;
		case 3: $invtype = "Shoulder";break;
		case 4: $invtype = "Shirt";break;
		case 5: $invtype = "Chest";break;
		case 6: $invtype = "Waist";break;
		case 7: $invtype = "Legs";break;
		case 8: $invtype = "Feet";break;
		case 9: $invtype = "Wrists";break;
		case 10: $invtype = "Hands";break;
		case 11: $invtype = "Finger";break;
		case 12: $invtype = "Trinket";break;
		case 13: $invtype = "One Hand";break;
		case 14: $invtype = "Shield";break;
		case 15: $invtype = "Ranged";break;
		case 16: $invtype = "Back";break;
		case 17: $invtype = "Two Hand";break;
		case 18: $invtype = "Bag";break;
		case 19: $invtype = "Tabard";break;
		case 20: $invtype = "Chest";break;
		case 21: $invtype = "Main hand";break;
		case 22: $invtype = "Off hand";break;
		case 23: $invtype = "Holdable";break;
		case 24: $invtype = "Ammo";break;
		case 25: $invtype = "Thrown";break;
		case 26: $invtype = "Ranged";break;
		case 27: $invtype = "Quiver";break;
		case 28: $invtype = "Relic";break;
	}
	return $invtype;
}

function stat_typeString($type){
	switch($type){
		case 0: $stat_type = "Mana";break;
		case 1: $stat_type = "Health";break;
		case 3: $stat_type = "Agility";break;
		case 4: $stat_type = "Strength";break;
		case 5: $stat_type = "Intellect";break;
		case 6: $stat_type = "Spirit";break;
		case 7: $stat_type = "Stamina";break;
		case 12: $stat_type = "Defense rating";break;
		case 13: $stat_type = "Dodge rating";break;
		case 14: $stat_type = "Parry rating";break;
		case 15: $stat_type = "Block rating";break;
		case 16: $stat_type = "Melee hit rating";break;
		case 17: $stat_type = "Ranged hit rating";break;
		case 18: $stat_type = "Spell hit rating";break;
		case 19: $stat_type = "Melee crit rating";break;
		case 20: $stat_type = "Ranged crit rating";break;
		case 21: $stat_type = "Spell crit rating";break;
		case 22: $stat_type = "Melee hit taken rating";break;
		case 23: $stat_type = "Ranged hit taken rating";break;
		case 24: $stat_type = "Spell hit taken rating";break;
		case 25: $stat_type = "Melee crit taken rating";break;
		case 26: $stat_type = "Ranged crit taken rating";break;
		case 27: $stat_type = "Spell crit taken rating";break;
		case 28: $stat_type = "Melee haste rating";break;
		case 29: $stat_type = "Ranged haste rating";break;
		case 30: $stat_type = "Spell haste rating";break;
		case 31: $stat_type = "Hit rating";break;
		case 32: $stat_type = "Crit rating";break;
		case 33: $stat_type = "Hit taken rating";break;
		case 34: $stat_type = "Crit taken rating";break;
		case 35: $stat_type = "Resilience rating";break;
		case 36: $stat_type = "Haste rating";break;
		case 37: $stat_type = "Expertise rating";break;
		case 38: $stat_type = "Attack power";break;
		case 39: $stat_type = "Ranged attack power";break;
		case 40: $stat_type = "Feral attack power";break;
		case 41: $stat_type = "Spell healing done";break;
		case 42: $stat_type = "Spell damage done";break;
		case 43: $stat_type = "Mana regeneration per 5 sec";break;
		case 44: $stat_type = "Armor penetration rating";break;
		case 45: $stat_type = "Spell power";break;
		case 46: $stat_type = "Health regen per 5 sec";break;
		case 47: $stat_type = "Spell penetration";break;
		case 48: $stat_type = "Block value";break;
	}
	return $stat_type;
}

function socketColor($socket){
	switch ($socket){
		case 1: $color = "<td class='sok_meta'></td>	<td class='sok_meta_label'>Meta Socket</td>";break;
		case 2: $color = "<td class='sok_red'></td>	<td class='sok_red_label'>Red Socket</td>";break;
		case 4: $color = "<td class='sok_yellow'></td>	<td class='sok_yellow_label'>Yellow Socket</td>";break;
		case 8: $color = "<td class='sok_blue'></td>	<td class='sok_blue_label'>Blue Socket</td>";break;
	}
	return $color;
}
function spellStrings($spell,$trigger){
	switch ($trigger){
		case 0: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>Use: </font><a href='#'>".getstring($spell)."</a></div>"; break;
		case 1: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>Equip: </font><a href='#'>".getstring($spell)."</a></div>"; break;
		case 2: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>Chance on hit: </font><a href='#'>".getstring($spell)."</a></div>"; break;
		case 4: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>Soulstone: </font><a href='#'>".getstring($spell)."</a></div>"; break;
		case 5: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>No Delay: </font><a href='#'>".getstring($spell)."</a></div>"; break;
		case 6: $sdesc = "<div class='armory-spellinfo'><font color='#1eff00'>Learn: </font><a href='#'>".getstring($spell)."</a></div>"; break;
	}
	return $sdesc;
}
function get_changelogs(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT `id`,`title`,`date` FROM ".$DB_WEBSITE.".changelog order by id DESC limit 4";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_id,$_title,$_date);
		while ($stmt->fetch()) {
			$chlog[$i] = array(
				'id' => $_id,
				'title' => $_title,
				'date' => $_date);
			$i++;
		}
		return $chlog;
	}
	$stmt->close();
	$con->close();
}

class get_totals {
	public $total_items;
	public $total_charactes;
	public $total_quests;
	public $total_guilds;
	
	function get_total_characters($criteria){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_CHARACTERS.".characters WHERE `name` like ? or name like ?";
		$crit='%'.ucfirst($criteria).'%';
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("ss", $crit, $criteria);
			$stmt->execute();
			$stmt->store_result();
			$this->total_characters = $stmt->num_rows();
			$stmt->close();
			$con->close();
		}
	}
	function get_total_guilds($criteria){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_CHARACTERS.".guild WHERE `name` like ?";
		$crit='%'.ucfirst($criteria).'%';
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("s", $crit);
			$stmt->execute();
			$stmt->store_result();
			$this->total_guilds = $stmt->num_rows();
			$stmt->close();
			$con->close();
		}
	}
	function get_total_items($criteria){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WORLD;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_WORLD.".item_template WHERE `name` like ? order by entry ASC";
		$crit='%'.ucfirst($criteria).'%';
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("s",$crit);
			$stmt->execute();
			$stmt->store_result();
			$this->total_items = $stmt->num_rows();
			$stmt->close();
			$con->close();
		}
	}
	function get_total_quests($criteria){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WORLD;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_WORLD.".quest_template WHERE `title` like ? order by id ASC";
		$crit='%'.ucfirst($criteria).'%';
		if ($stmt = $con->prepare($sql)) {
			$stmt->bind_param("s", $crit);
			$stmt->execute();
			$stmt->store_result();
			$this->total_quests = $stmt->num_rows();
			$stmt->close();
			$con->close();
		}
	}
	function construct($criteria){
		$this->get_total_characters($criteria);
		$this->get_total_guilds($criteria);
		$this->get_total_items($criteria);
		$this->get_total_quests($criteria);
	}
}

function arm_paging($type,$total_pages,$limit,$criteria,$cur_page){
	
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	

	/* Setup page vars for display. */
	if ($cur_page == 0) $cur_page = 1;					//if no page var is given, default to 1.
	$prev = $cur_page - 1;							//previous page is page - 1
	$next = $cur_page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages / $limit);		//lastpage is = total pages / items per page, rounded up.
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
			$pagination.= "<div class='pag-link'><a href='?page=".$prev."&type=".$type."&crit=".$criteria."'> previous</a></div>";
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
					$pagination.= "<div class='pag-link'><a href='?page=".$counter."&type=".$type."&crit=".$criteria."'>".$counter."</a></div>";					
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
						$pagination.= "<div class='pag-link'><a href='?page=".$counter."&type=".$type."&crit=".$criteria."'>".$counter."</a></div>";					
				}
				$pagination.= "<div class='pag-link'>...</div>";
				$pagination.= "<div class='pag-link'><a href='?page=".$lpm1."&type=".$type."&crit=".$criteria."'>".$lpm1."</a></div>";
				$pagination.= "<div class='pag-link'><a href='?page=".$lastpage."&type=".$type."&crit=".$criteria."'>".$lastpage."</a></div>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $cur_page && $cur_page > ($adjacents * 2))
			{
				$pagination.= "<div class='pag-link'><a href='?page=1&type=".$type."&crit=".$criteria."'>1</a></div>";
				$pagination.= "<div class='pag-link'><a href='?page=2&type=".$type."&crit=".$criteria."'>2</a></div>";
				$pagination.= "<div class='pag-link'>...</div>";
				for ($counter = $cur_page - $adjacents; $counter <= $cur_page + $adjacents; $counter++)
				{
					if ($counter == $cur_page)
						$pagination.= "<span class='pag-link-current'>".$counter."</span>";
					else
						$pagination.= "<div class='pag-link'><a href='?page=".$counter."&type=".$type."&crit=".$criteria."'>".$counter."</a></div>";					
				}
				$pagination.= "...";
				$pagination.= "<div class='pag-link'><a href='?page=".$lpm1."&type=".$type."&crit=".$criteria."'>".$lpm1."</a></div>";
				$pagination.= "<div class='pag-link'><a href='?page=".$lastpage."&type=".$type."&crit=".$criteria."'>".$lastpage."</a></div>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<div class='pag-link'><a href='?page=1&type=".$type."&crit=".$criteria."'>1</a></div>";
				$pagination.= "<div class='pag-link'><a href='?page=2&type=".$type."&crit=".$criteria."'>2</a></div>";
				$pagination.= "<div class='pag-link'>...</div>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $cur_page)
						$pagination.= "<span class='pag-link-current'>".$counter."</span>";
					else
						$pagination.= "<div class='pag-link'><a href='?page=".$counter."&type=".$type."&crit=".$criteria."'>".$counter."</a></div>";				
				}
			}
		}
		
		//next button
		if ($cur_page < $counter - 1) 
			$pagination.= "<div class='pag-link'><a href='?page=".$next."&type=".$type."&crit=".$criteria."'>next</a></div>";
		else
			$pagination.= "<span class='pag-link-disabled'>next</span>";	
		
	}
	return $pagination;
}

?>