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
				<div id='character-main-frame' style='background:url(images/class/<?php echo $charinfo->class;?>.png) no-repeat;'>
					<div class='char-right-info1'>	
						<?php include 'inc/charinv.php'; ?>
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