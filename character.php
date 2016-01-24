<?php define('DarkCoreCMS', TRUE);
require_once 'core/config.php'; 
		require_once 'core/functions/global_functions.php'; 
			require_once 'core/functions/armory_functions.php'; 
				require_once 'core/functions/character_functions.php';
					if (isset($_GET['c'])){$character = $_GET['c'];} if(character_exist($character)){ 
	include 'header.php'?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?> / <?php echo $_GET['c']; ?></title>
</head>
<body>
	<div id='header'>
	</div>
	<?php include 'menu.php';
		$charinfo = new character;
		$charinfo->construct($character);
		$charinfo->get_char_equipment($charinfo->charguid);?>
	<div id='content'>
		<div id='character-left'>
			<div class='left-character-panel'>
				<div id='character-main-frame' style='background:url("images/class/<?php echo $charinfo->class;?>.png") no-repeat;'>
					<div class='char-right-info1'>
						<div class='tablecls1'>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[0])) {$helm = get_item_data($charinfo->data1[0]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($helm['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($helm['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($helm['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[1])) {$necklace = get_item_data($charinfo->data1[1]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($necklace['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($necklace['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($necklace['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[2])) {$shoulder = get_item_data($charinfo->data1[2]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($shoulder['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($shoulder['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($shoulder['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[14])) {$back = get_item_data($charinfo->data1[14]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($back['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($back['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($back['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[4])) {$chest = get_item_data($charinfo->data1[4]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($chest['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($chest['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($chest['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[3])) {$shirt = get_item_data($charinfo->data1[3]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($shirt['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($shirt['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($shirt['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[18])) {$tabard = get_item_data($charinfo->data1[18]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($tabard['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($tabard['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($tabard['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[8])) {$wrist = get_item_data($charinfo->data1[8]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($wrist['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($wrist['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($wrist['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>
						<div class='tablecls2'>
							<div class='stats1'>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[15])) {$mainhand = get_item_data($charinfo->data2[15]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($mainhand['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($mainhand['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($mainhand['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[16])) {$offhand = get_item_data($charinfo->data2[16]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($offhand['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($offhand['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($offhand['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[17])) {$ranged = get_item_data($charinfo->data2[17]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ranged['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ranged['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ranged['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>
						<div class='tablecls1'>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[9])) {$hands = get_item_data($charinfo->data3[9]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($hands['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($hands['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($hands['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[5])) {$belt = get_item_data($charinfo->data3[5]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($belt['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($belt['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($belt['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[6])) {$legs = get_item_data($charinfo->data3[6]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($legs['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($legs['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($legs['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[7])) {$boots = get_item_data($charinfo->data3[7]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($boots['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($boots['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($boots['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[10])) {$ring1 = get_item_data($charinfo->data3[10]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ring1['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ring1['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ring1['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[11])) {$ring2 = get_item_data($charinfo->data3[11]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ring2['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ring2['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ring2['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[12])) {$trinket1 = get_item_data($charinfo->data3[12]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($trinket1['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($trinket1['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($trinket1['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[13])) {$trinket2 = get_item_data($charinfo->data3[13]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($trinket2['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($trinket2['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($trinket2['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class='char-right-info'>	
						<table>
							<tr><td width='150' style='color:#a3620a'>Name:</td><td style='color:#<?php echo char_name_color($charinfo->class);?>'><?php echo $charinfo->charname;?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Race:</td><td style='color:#ffffff'><?php echo race_strings($charinfo->race);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Class:</td><td style='color:#<?php echo char_name_color($charinfo->class);?>'><?php echo class_strings($charinfo->class);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Gender:</td><td style='color:#ffffff'><?php echo gender_strings($charinfo->gender);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Level:</td><td style='color:#ffffff'><?php echo $charinfo->level;?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Online:</td><td style='color:#ffffff'><?php echo online_strings($charinfo->online);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Strength:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->strength);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Agility:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->agility);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Stamina:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->stamina);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Intellect:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->intellect);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>Spirit:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->spirit);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>SpellPower:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->spellPower);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>RangedAttackPower:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->rangedAttackPower);?></td></tr>
							<tr><td width='150' style='color:#a3620a'>AttackPower:</td><td style='color:#ffffff'><?php echo rew_number($charinfo->attackPower);?></td></tr>
						</table>                
					</div>                      
				</div>
			<!--<span class='box-divider'></span>-->
			</div>
		</div>
		<div id='character-right'>
			<div class='char-right-box'>
			<div class='right-box-title'>Resistances</div>
			<span class='box-divider'></span>
				<table>
					<tr><td width='150' style='color:#a3620a'>ResHoly:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resHoly);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ResFire:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resFire);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ResNature:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resNature);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ResFrost:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resFrost);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ResShadow:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resShadow);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ResArcane:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->resArcane);?></td></tr>
				</table>
			<div class='right-box-title'>Perks & Defense</div>
			<span class='box-divider'></span>
				<table>
					<tr><td width='150' style='color:#a3620a'>Armor:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->armor);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Resilience:</td><td style='color:#ffffff'><?php echo 		dotted_number($charinfo->resilience);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>BlockPct:</td><td style='color:#ffffff'><?php echo 		$charinfo->blockPct.'%';?></td></tr>
					<tr><td width='150' style='color:#a3620a'>DodgePct:</td><td style='color:#ffffff'><?php echo 		$charinfo->dodgePct.'%';?></td></tr>
					<tr><td width='150' style='color:#a3620a'>ParryPct:</td><td style='color:#ffffff'><?php echo 		$charinfo->parryPct.'%';?></td></tr>
					<tr><td width='150' style='color:#a3620a'>CritPct:</td><td style='color:#ffffff'><?php echo 		$charinfo->critPct.'%';?></td></tr>
					<tr><td width='150' style='color:#a3620a'>RangedCritPct:</td><td style='color:#ffffff'><?php echo 	$charinfo->rangedCritPct.'%';?></td></tr>
					<tr><td width='150' style='color:#a3620a'>SpellCritPct:</td><td style='color:#ffffff'><?php echo 	$charinfo->spellCritPct.'%';?></td></tr>
				</table>
			<div class='right-box-title'>Max Power Stats</div>
			<span class='box-divider'></span>
				<table>
					<tr><td width='150' style='color:#a3620a'>Maxhealth:</td><td style='color:#ffffff'><?php echo 		dotted_number($charinfo->maxhealth);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Mana:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->maxpower1);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Rage:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->maxpower2);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Focus:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->maxpower3);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Energy:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->maxpower4);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Happyness(Pet):</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->maxpower5);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Rune:</td><td style='color:#ffffff'><?php echo 			dotted_number($charinfo->maxpower6);?></td></tr>
					<tr><td width='150' style='color:#a3620a'>Runic Power:</td><td style='color:#ffffff'><?php echo 	dotted_number($charinfo->maxpower7);?></td></tr>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
</html>
<?php
}
else 
	header('Location: armory.php');
?>