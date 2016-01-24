<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
			require_once 'core/config.php'; 
				require_once 'core/functions/global_functions.php'; 
					require_once 'core/functions/realm_functions.php'; 
						require_once 'core/functions/account_functions.php'; ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<div id='header'></div>
	<?php include 'menu.php';?>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='rules-body'>
				<div class='title'>Rules and Frequently Asked Questions</div>
				<?php $rules = get_rules(3);  for ($i=1;$i<=count($rules);$i++) { ?>
					<?php echo rewrite_body($rules[$i]['body']).'<br>'; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
</html>
