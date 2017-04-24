<?php 
	define('DarkCoreCMS', TRUE);
	if (isset($_GET['realm'])) {
		include 'header.php';
		$realmid = $_GET['realm'];
		$realminfo = new realm;
		$realminfo->get_all($realmid);
?>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='realm-frame'>
				<div class='lastnews-head-text'><?php echo $realminfo->rm_name; ?> - Found <?php echo $realminfo->total_online; ?> Players Online</div>
				<div class='frame-realm-panel'>
				<div class="newsdivider"></div>
					<?php if ($realminfo->total_online != 0){ 
						echo "
						<div id='online-players-table'>
						<div class='online-players-line' style='margin-bottom:10px;'>
							<div class='chlist-td' style='color:#fff;'>Char Name</div>
							<div class='chlist-td' style='color:#fff;'>Race</div>
							<div class='chlist-td' style='color:#fff;'>Class</div>
							<div class='chlist-td' style='color:#fff;'>Level</div>
							<div class='chlist-td' style='color:#fff;'>Rank</div>
						</div>";
						for ($i=0;$i<count($realminfo->charsonline['charguid']);$i++) {
							echo "<div class='online-players-line'>
								<div class='chlist-td' ><a id='rm-ch' href='character?c=". echo $realminfo->charsonline['charname'][$i];."' style='color:#". echo char_name_color($realminfo->charsonline['class'][$i]); .";' class='skinnytip' data-text='<div class='miniinfo'>Check player stats</div>'>". echo $realminfo->charsonline['charname'][$i]; ."</a></div>
								<div class='chlist-td' style='color:#fff;'>". echo race_strings($realminfo->charsonline['race'][$i]); ."	<img style='float:left;margin-left:5px;' src='images/char/race/". echo $realminfo->charsonline['race'][$i];."-". echo $realminfo->charsonline['gender'][$i];.".gif' /></div>
								<div class='chlist-td' style='color:#". echo char_name_color($realminfo->charsonline['class'][$i]); .";'>". echo class_strings($realminfo->charsonline['class'][$i]); ."<img style='float:left;margin-left:5px;' src='images/char/class/". echo $realminfo->charsonline['class'][$i];.".gif' /></div>
								<div class='chlist-td' style='color:#fff;'>". echo $realminfo->charsonline['level'][$i]; ."</div>
								<div class='chlist-td' style='color:#fff;'>". echo level_by_account($realminfo->charsonline['account'][$i]); ."</div>
							</div>";
						}
					} else {
						echo"<div id='online-players-table'>
							<div class='gmalert' >There are no characters online at this moment</div>
						</div>";
					}
					echo "</div>";
					if ($realminfo->total_online > 7){
						echo"<div class='online-players-show'>Show all online characters</div>";
					} ?>
					<div id='user-box'>
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:24px;">TOTAL CHARACTERS - <?php echo $realminfo->total_characters; ?></div>
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">CLASS STATISTICS</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/1.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Warrior, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(1) ?>";>Warriors</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/2.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Paladin, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(2) ?>";>Paladins</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/3.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Hunter, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(3) ?>";>Hunters</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/4.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Rogue, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(4) ?>";>Rogues</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/5.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Priest, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(5) ?>";>Priests</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/6.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_DeathKnight, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(6) ?>";>DeathKnights</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/7.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Shaman, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(7) ?>";>Shamans</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/8.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Mage, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(8) ?>";>Mages</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/9.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Warlock, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(9) ?>";>Warlocks</div>
						</div>
						<div class="statistic-portrait">
							<div class="image"><img src='../style/images/portraits/class/11.png' /></div>
							<div class="percent"><?php echo number_format($realminfo->perc_Druid, 1, '.', '').'%'; ?></div>
							<div class="label" style="color:#<?php echo char_name_color(11) ?>";>Druids</div>
						</div>
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;margin-top:15px;font-size:16px;">RACE STATISTICS AND FACTION BALLANCE</div>
						<div class="portrait-left">
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/1.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Human, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#69CCF0;";>Humans</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/3.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Dwarf, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#69CCF0;";>Dwarfs</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/4.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_NightElf, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#69CCF0;";>Night Elfs</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/7.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Gnome, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#69CCF0;";>Gnomes</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/11.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Draenei, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#69CCF0;";>Draeneis</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/2.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Orc, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#C72357;";>Orcs</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/5.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Undead, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#C72357;";>Undeads</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/6.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Tauren, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#C72357;";>Taurens</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/8.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_Troll, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#C72357;";>Trolls</div>
							</div>
							<div class="statistic-portrait">
								<div class="image"><img src='../style/images/portraits/race/10.png' /></div>
								<div class="percent"><?php echo number_format($realminfo->perc_BloodElf, 1, '.', '').'%'; ?></div>
								<div class="label" style="color:#C72357;";>Blood Elfs</div>
							</div>
						</div>
						<div class="portrait-right" style="vertical-align: bottom !important;">
						<div class="factiondivider"></div>
							<div class="factionbar" style="height:<?php echo $realminfo->percent_alliance; ?>%;background: #0066FF url('../style/images/alliance.png')">
								<div style="font-size: 36px;color: #5A908B;margin-top: -50px;text-align: center;">Alliance</div>
								<div style="font-size: 36px;color: #a1e8b9;text-align: center;margin: auto;margin-top: 50px;"><?php echo number_format($realminfo->percent_alliance, 2, '.', '').'%'; ?></div>
							</div>
							<div class="factionbar" style="height:<?php echo $realminfo->percent_horde; ?>%;background: #5F0505 url('../style/images/horde.png');margin-left: 31px;">
							<div style="font-size: 36px;color: #905A5A;margin-top: -50px;text-align: center;">Horde</div>
							<div style="font-size: 36px;color: #a1e8b9;text-align: center;margin: auto;margin-top: 50px;"><?php echo number_format($realminfo->percent_horde, 2, '.', '').'%'; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(document).ready(function(){
	$(".online-players-show").click(function(e){
		if ($("#online-players-table").css('height') > "218px"){
			$("#online-players-table").css('height',"218px");
			$(".online-players-show").html("SHOW ALL CHARACTERS");
			}
		else {
			$("#online-players-table").css('height',"100%");
			$(".online-players-show").html("HIDE CHARACTERS LIST");
			}

		e.preventDefault();
	});
});

</script>
<script type="text/javascript">SkinnyTip.init();</script>
<?php 
	include 'global-footer.php';
} else 
	echo "<script> window.location.href = 'index';</script>"
?>