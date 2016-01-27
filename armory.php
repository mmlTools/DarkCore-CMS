<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
if (!isset($_GET['page']))
	$page = 1;
else
	$page = $_GET['page'];
$totals= new get_totals;
if (isset($_GET['type']))
	$armory_search_type = $_GET['type'];
else if (isset($_POST['type']))
	$armory_search_type = $_POST['type'];

if (isset($_GET['crit']))
	$crit_src = $_GET['crit'];
else if (isset($_POST['crit']))
	$crit_src = $_POST['crit'];
?>
<div id='content'>
	<div id="content-wrapper">
	<div id="searchbar">
	<form action='' method='post'>
		<div class="left">
		<div id="ARMTTL"><?php echo strtoupper($website_title) ?> ARMORY</div>
		<select name="type" class='arm-select' >
			<option value="Items">Look for Items</option>
			<option value="Characters" disabled>Look for Characters</option>
			<option value="Guilds" disabled>Look for Guilds</option>
			<option value="Arenas" disabled>Look for Arena Teams</option>
		</select>
		</div>
		<div class="right">
		<input name='crit' class='arm-criteria' type='text' value='<?php if (isset($_POST['crit'])) echo $_POST['crit']; else echo ''; ?>' required>
		<input class="crt-submit" type="submit" name="Search" value="Search">
		</div>
	</form>
	</div>
		<?php
		if (isset($armory_search_type)) {
			$totals->construct($crit_src);
		if ($armory_search_type == 'Items'){
		?>
	<?php if ($totals->total_items == 0)
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
						$class = "list-line";
					?>
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
			<?php }}}
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
	</body>
	<?php include 'global-footer.php' ?>
	</html>
