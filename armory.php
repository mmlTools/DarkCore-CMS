<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
$totals= new get_totals;
if (!isset($_GET['page']))
	$page = 1;
else
	$page = $_GET['page'];
if (isset($_GET['type']))
	$armory_search_type = $_GET['type'];
if (isset($_GET['crit']))
	$crit_src = $_GET['crit'];
?>
<div id='content'>
	<div id="content-wrapper">
	<div id="searchbar">
	<form action='' method='get'>
		<div class="left">
		<div id="ARMTTL"><?php echo strtoupper($website_title) ?> ARMORY</div>
		<select name="type" class='arm-select' >
			<option value="Items" <?php if(isset($armory_search_type) && $armory_search_type == "Items") echo "selected" ?>>Look for Items</option>
			<option value="Characters" <?php if(isset($armory_search_type) && $armory_search_type == "Characters") echo "selected" ?>>Look for Characters</option>
			<option value="Guilds" <?php if(isset($armory_search_type) && $armory_search_type == "Guilds") echo "selected" ?> disabled>Look for Guilds</option>
			<option value="Arenas" <?php if(isset($armory_search_type) && $armory_search_type == "Arenas") echo "selected" ?> disabled>Look for Arena Teams</option>
			<option value="Quests" <?php if(isset($armory_search_type) && $armory_search_type == "Quests") echo "selected" ?> disabled>Look for Quests</option>
		</select>
		</div>
		<div class="right">
		<input name='crit' class='arm-criteria' type='text' value='<?php if (isset($crit_src)) echo $crit_src; else echo ''; ?>' required>
		<input class="crt-submit" type="submit" value="Search">
		</div>
	</form>
	</div>
		<?php
		if (isset($armory_search_type)) {
			switch ($armory_search_type){
				case 'Items':{
						$totals->construct($crit_src);
						if ($totals->total_items == 0)
							echo "<span class='arm-title'><div class='armerror'>No results matches your criteria</div></span>";
						else {?>
							<span class='arm-title'>Found <?php echo $totals->total_items ?> results matching your criteria  - Showing <?php if ($totals->total_items < $limit) echo $totals->total_items; else echo $limit;?> Items / Page</span>
							<div id='list-bg'>
							<div class='list-line-desc' style="padding-bottom: 20px;">
				<div class='item-invtype-l' style="color: #7CBD68;">Item Icon</div>
				<div class='item-invtype-l' style='width:280px;color: #7CBD68;'>Item Name</div>
				<div class='item-invtype-l' style='width:150px;color: #7CBD68;'>Inventory Type(Slot)</div>
				<div class='item-class-l' style="color: #7CBD68;">Item Class</div>
				<div class='item-lvl' style="color: #7CBD68;">Item Level</div>
				<div class='item-reqlvl' style="color: #7CBD68;">Required Level</div>
			</div>
									<?php
									$arm_itm = get_basic_item($crit_src,$page,$limit);
									for ($i=1;$i<=count($arm_itm);$i++){
										if ($i % 2 == 0)
											$class = "list-line-sec";
										else
											$class = "list-line";?>
										<div class='<?php echo $class ?>'>
											<a href="item?item=<?php echo $arm_itm[$i]['entry'] ?>" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($arm_itm[$i]['display']); ?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($arm_itm[$i]['entry']); ?></div></div>">
												<img class='armory-itemicon' src='<?php echo geticon($arm_itm[$i]['display']); ?>' width='23' height='23' /><div class='armory-item-name'><?php echo qualityString($arm_itm[$i]['quality'],$arm_itm[$i]['name']); ?></div>
											</a>
											<div class='item-invtype-l'><?php echo inventorytypeString($arm_itm[$i]['intentorytype']); ?></div>
											<div class='item-class-l'><?php echo itemclass($arm_itm[$i]['class'],$arm_itm[$i]['subclass']); ?></div>
											<div class='item-lvl'><?php echo $arm_itm[$i]['ilevel'] ?></div>
											<div class='item-reqlvl'><?php echo $arm_itm[$i]['reqlevel'] ?></div>
										</div>
									<?php }?>
										<div class="box-divider"></div>
									<?php
									}
								}
					break;
				case "Characters":{
					$totals->construct($crit_src, $armory_search_type);
					if ($totals->total_characters == 0)
						echo "<span class='arm-title'><div class='armerror'>No results matches your criteria</div></span>";
					else {?>
						<span class='arm-title'>Found <?php echo $totals->total_characters ?> results matching your criteria  - Showing <?php if ($totals->total_characters < $limit) echo $totals->total_characters; else echo $limit;?> Characters / Page</span>
						<div id='list-bg'>
							<div class='list-line-desc' style="padding-bottom: 20px;">
								<div class='portrait-ascds' style='width:42px;display:inline-block;'></div>
								<div class='char-name'>Character Name</div>
								<div class='char-info-level'>Character Level</div>
								<div class='char-info-race'>Character Race</div>
								<div class='char-info-class'>Character Class</div>
							</div>
					<?php
						$arm_char = get_basic_char($crit_src,$page,$limit); }for ($i=1;$i<=count($arm_char);$i++){
						if ($i % 2 == 0)
							$class = "character-line-sec";
						else
							$class = "character-line";
						?>
							<a href='character?c=<?php echo $arm_char[$i]['name'];?>' class="skinnytip" data-text="<div class='miniinfo'>Click for to see <?php echo $arm_char[$i]['name'];?>'s stats</div>">
							<div class='<?php echo $class ?>'>
								<div class='portrait' style='text-align:left;'><img src='images/portraits/class/<?php echo $arm_char[$i]['class']; ?>.png' width='42' height='42' alt="Race Icon"/></div>
								<div class='char-name'><a style='color:#<?php echo char_name_color($arm_char[$i]['class']); ?>' href='character?c=<?php echo $arm_char[$i]['name'];?>'><?php echo $arm_char[$i]['name'];?></a></div>
								<div class='char-info-level'><span class='text'><?php echo $arm_char[$i]['level'];?></span></div>
								<div class='char-info-race'><img src='images/char/race/<?php echo $arm_char[$i]['race'];?>-<?php echo $arm_char[$i]['gender'];?>.gif' /></div>
								<div class='char-info-class'><img src='images/char/class/<?php echo $arm_char[$i]['class'];?>.gif' /></div>
							</div>
							</a>
					<?php }} break;
			}
		}
			if (isset($crit_src)) {
				switch($armory_search_type){
					case 'Items': $total_to_search = $totals->total_items; break;
					case 'Characters': $total_to_search = $totals->total_characters; break;
					case 'Guilds': $total_to_search = $totals->total_guilds; break;
					case 'Arena': $total_to_search = $totals->total_guilds; break;
				}
				if ($total_to_search >= $limit){?>
					<div class='arm-pagination' >
						<div class='a-p-g'>
					<?php
						echo arm_paging($armory_search_type,$total_to_search,$limit,$crit_src,$page);
					?>
					</div>
				</div>
			</div>
			<?php }} ?>
	</div>
</div>
<script type="text/javascript">SkinnyTip.init();</script>
<?php include 'global-footer.php'; ?>