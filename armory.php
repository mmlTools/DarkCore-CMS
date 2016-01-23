<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
			require_once 'core/config.php'; 
				require_once 'core/functions/global_functions.php'; 
					require_once 'core/functions/realm_functions.php'; 
						require_once 'core/functions/account_functions.php'; 
							require_once 'core/functions/armory_functions.php'; ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<?php if (isset($_SESSION['usr'])) { $user_prv = $_SESSION['usr'];
	$user_account = new account;
	$user_account->construct(ucfirst($user_prv));
	}?>
	<div id='header'>
	</div>
	<?php include 'menu.php';?>
	<div id='content'>
		<div id='content-wrapper'>
		<div id='crt-content'>All results are updated in real time</div>
			<form action='' method='get'> 
					<input value='Search' name='act' id='crt-submit' class="skinnytip" type='submit' data-text="<div class='miniinfo'>Search in our database</div>">
					<input placeholder='Search Criteria' name='crit' class='arm-criteria' type='text' value='<?php if (isset($_GET['crit'])) echo $_GET['crit']; else echo ''; ?>'>
			</form>
			<?php if (isset($_GET['crit'])){ $criteria = $_GET['crit']; $totals= new get_totals;$totals->construct($criteria);?>
				<span class='box-divider'></span>
				<div class='res-disp'>
					<a href='armory?page=1&type=items&crit=<?php echo $criteria;?>'>Items found ( <?php echo $totals->total_items;?> )</a>
					<span class='box-divider'></span>
					<a href='armory?page=1&type=items&crit=<?php echo $criteria;?>'><img class='resimg' src='images/armitems.jpg' /></a>
				</div>
				<div class='res-disp'>
					<a href='armory?page=1&type=characters&crit=<?php echo $criteria;?>'>Characters found ( <?php echo $totals->total_characters;?> )</a>
					<span class='box-divider'></span>
					<a href='armory?page=1&type=characters&crit=<?php echo $criteria;?>'><img class='resimg' src='images/characters.jpg' /></a>
				</div>
				<div class='res-disp'>
					<a href='armory?page=1&type=guilds&crit=<?php echo $criteria;?>'>Guilds found ( <?php echo $totals->total_guilds;?> )</a>
					<span class='box-divider'></span>
					<a href='armory?page=1&type=guilds&crit=<?php echo $criteria;?>'><img class='resimg' src='images/guilds.jpg' /></a>
				</div>
				<div class='res-disp'>
					<label href='armory?page=1&type=quests&crit=<?php echo $criteria;?>' class="skinnytip" data-text="<div class='miniinfo'>Feature not available</div>">Quests found ( <?php echo $totals->total_quests;?> )</label>
					<span class='box-divider'></span>
					<img class='resimg' src='images/quests.jpg' />
				</div>
			<?php } ?>
			<?php $limit=21; if (isset($_GET['type'])) { $armory_search_type = $_GET['type']; if ($armory_search_type == 'items'){ ?>
					<span class='arm-title'>Items - Showing <?php if ($totals->total_items < $limit) echo $totals->total_items; else echo $limit;?> Items / Page</span>
					<div id='items-list'>
						<div class='item-line'>
							<div class='item-invtype-l' >Item Icon</div>
							<div class='item-invtype-l' style='width:300px;'>Item Name</div>
							<div class='item-invtype-l' style='width:150;'>Inventory Type(Slot)</div>
							<div class='item-class-l'>Item Class</div>
							<div class='item-lvl'>Item Level</div>
							<div class='item-reqlvl'>Required Level</div>
						</div>
						<?php if ($totals->total_items == 0) echo "<div class='armerror'>No results matches your criteria</div>"; else { $arm_itm = get_basic_item($criteria,$_GET['page'],$limit); for ($i=1;$i<=count($arm_itm);$i++){ ?>
						<div class='item-line'>
							<a href="item?item=<?php echo $arm_itm[$i]['entry'] ?>" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($arm_itm[$i]['display']); ?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($arm_itm[$i]['entry']); ?></div></div>">
								<img class='armory-itemicon' src='<?php echo geticon($arm_itm[$i]['display']); ?>' width='23' height='23' /><div class='armory-item-name'><?php echo qualityString($arm_itm[$i]['quality'],$arm_itm[$i]['name']); ?></div>
							</a>
							<div class='item-invtype-l'><?php echo inventorytypeString($arm_itm[$i]['intentorytype']); ?></div>
						<div class='item-class-l'><?php echo itemclass($arm_itm[$i]['class'],$arm_itm[$i]['subclass']); ?></div>
						<div class='item-lvl'><?php echo $arm_itm[$i]['ilevel'] ?></div>
						<div class='item-reqlvl'><?php echo $arm_itm[$i]['reqlevel'] ?></div>
					</div>
			<?php }}} ?>
			<?php if ($armory_search_type == 'characters'){ ?>
					<span class='arm-title'>Characters - Showing <?php if ($totals->total_characters < $limit) echo $totals->total_characters; else echo $limit;?> Characters / Page</span>
					<div id='characters-list'>
					<?php  if ($totals->total_characters == 0) echo "<div class='armerror'>No results matches your criteria</div>"; else { $arm_char = get_basic_char($criteria,$_GET['page'],$limit); for ($i=1;$i<=count($arm_char);$i++){?>
						<a href='character?c=<?php echo $arm_char[$i]['name'];?>' class="skinnytip" data-text="<div class='miniinfo'>Click for to see <?php echo $arm_char[$i]['name'];?>'s stats</div>">
							<div class='character-box'>
								<div class='portrait' style='text-align:left;'><img src='images/portraits/race/<?php echo $arm_char[$i]['class']; ?>.png' width='75' height='75'/></div>
								<div style='margin-top:0px;'>
									<div class='char-info-level'><span class='text'><?php echo $arm_char[$i]['level'];?></span></div>
									<div class='char-info-race'><img src='images/char/race/<?php echo $arm_char[$i]['race'];?>-<?php echo $arm_char[$i]['gender'];?>.gif' /></div>
									<div class='char-info-class'><img src='images/char/class/<?php echo $arm_char[$i]['class'];?>.gif' /></div>
								</div>
								<div class='char-name'><a style='color:#<?php echo char_name_color($arm_char[$i]['class']); ?>' href='character?c=<?php echo $arm_char[$i]['name'];?>'><?php echo $arm_char[$i]['name'];?></a></div>
							</div>
						</a>		
			<?php }}} ?>
			<?php if ($armory_search_type == 'guilds'){ ?>
					<span class='arm-title'>Guilds - Showing <?php if ($totals->total_guilds < $limit) echo $totals->total_guilds; else echo $limit;?> Guilds / Page</span>
					<div id='guilds-list'>
				<?php  if ($totals->total_guilds == 0) echo "<div class='armerror'>No results matches your criteria</div>"; else { $arm_guild = get_basic_guild($criteria,$_GET['page'],$limit); for ($i=1;$i<=count($arm_guild);$i++){?>
				<div class='guild-line'>
						<a href="#">
							<div class='armory-guild-name'><?php echo $arm_guild[$i]['name']; ?></div>
						</a>
						<div class='guild-leader'>Leader: <a href='character?c=<?php echo get_guild_leader($arm_guild[$i]['leader']); ?>'><?php echo get_guild_leader($arm_guild[$i]['leader']); ?></a></div>
						<div class='guild-members'>Total Members: <?php echo get_guild_members($arm_guild[$i]['id']); ?></div>
					</div>
			<?php }}} ?>
			<?php 
					if (isset($criteria) && isset($_GET['page'])) { $page = $_GET['page'];
					switch($armory_search_type){
						case 'items': $total_to_search = $totals->total_items; break;
						case 'characters': $total_to_search = $totals->total_characters; break;
						case 'guilds': $total_to_search = $totals->total_guilds; break;
					}
					if ($total_to_search >= $limit){?>
				<div class='arm-pagination' >
					<div class='a-p-g'>
				<?php 
					echo arm_paging($armory_search_type,$total_to_search,$limit,$criteria,$page);
				?>
					</div>
				</div>
			<?php }}} ?>
		</div>
	</div>
	<script>
	function show_element(pnl) {
		if (document.getElementById(pnl).style.display == "block"){
				document.getElementById(pnl).style.display = "none";
			}
		else {
			document.getElementById(pnl).style.display = "block";
		}
	}
	</script>
	<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>

</html>
