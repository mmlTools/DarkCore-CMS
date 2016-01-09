<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
			require_once 'core/config.php'; 
				require_once 'core/functions/global_functions.php'; 
					require_once 'core/functions/realm_functions.php'; 
						require_once 'core/functions/account_functions.php'; ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<?php if (isset($_SESSION['usr'])) { $user_prw = $_SESSION['usr'];
	$user_account = new account;
	$user_account->construct(ucfirst($user_prw));
	}?>
	<div id='header'>
	</div>
	<?php include 'menu.php';?>
	<div id='content'>
		<div id='content-wrapper'>
			<div class='arm-title'>INGAME/WEBSITE/FORUM RULES AND FAQ</div>
			<div id='rules-body'>
				<h1 class='content-wrapper-title' style='color:#66CC33'>Frequently Asked Questions</h1>
				<span class='box-divider'></span>
				<?php $rules = get_rules(3);  for ($i=1;$i<=count($rules);$i++) { ?>
					<?php echo rewrite_body($rules[$i]['body']).'<br>'; ?>
				<?php } ?>
				<h1 class='content-wrapper-title' style='color:#66CC33'>Ingame Rules</h1>
				<span class='box-divider'></span>
				<?php $rules = get_rules(0);  for ($i=1;$i<=count($rules);$i++) { ?>
					<?php echo rewrite_body($rules[$i]['body']).'<br>'; ?>
				<?php } ?>
				<h1 class='content-wrapper-title' style='color:#FF0000'>Punishments</h1>
				<span class='box-divider'></span>
				<?php $punishments = get_rules(1);  for ($i=1;$i<=count($punishments);$i++) { ?>
					<?php echo rewrite_body($punishments[$i]['body']).'<br>'; ?>
				<?php } ?>
				<?php if (isset($user_account) && $user_account->gmlevel > 4) {?>
					<h1 class='content-wrapper-title' style='color:#66CCFF'>Gamemasters Rules</h1>
					<span class='box-divider'></span>
					<?php $gmrules = get_rules(2);  for ($i=1;$i<=count($gmrules);$i++) {?>
						<?php echo rewrite_body($gmrules[$i]['body']).'<br>'; ?>
				<?php } ?>
			</div>
			<?php } ?>
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
</body>
<?php include 'global-footer.php' ?>

</html>