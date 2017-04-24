<?php define('DarkCoreCMS', TRUE);
 if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE HTML><html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="GamingZeta WOTLK 3.3.5a 2 Realms PVP/PVE High Stats , play for fun!">
	<meta name="keywords" content="Gaming,GamingZeta,3.3.5a,5.4.8,6.2.2,GamingZeta,WoW,WOTLK,Warlords of Draenor,MOP,WoD,255,level,server,GamingZeta.com,gaming.com,gaminzeta.info,free servers,Warlords of Draenor private server,free wow server,wow forum,mmorpg server,80 instant,PVP,PVE,255 level,largest server, custom, instances, cuztom zones, events, quality server, quality server,">
	<link rel="stylesheet" type="text/css" href="../style/css/style.css" title="Default Styles" media="screen">
	<link rel="stylesheet" type="text/css" href="../style/css/armory.css" title="Default Styles" media="screen">
	<script type="text/javascript" src="../style/js/skinnytip.js"></script>

	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<div id='content'>
	<div id='header'>
	</div>
	<div id='content-wrapper'>
		<?php
			switch($_GET['page']){
				case 'register':
					echo "	<div class='arm-title'>ERROR</div>
							<div id='rules-body' style='font-size:16px;''>
							<label style='color:#BEE6BC;text-align:center;'>There was an error while processing your request please return to website</label>
							</div> ";
					break;
				case 'login':
					echo "	<div class='arm-title'>ERROR</div>
							<div id='rules-body' style='font-size:16px;''>
							<label style='color:#BEE6BC;text-align:center;'>There was an error while processing your request please return to website</label>
							</div> ";
					break;
			}
		?>

		<div style="width:100%;text-align:center;margin-top:125px;">
			<a class='guide-thumb' href="../index">RETURN TO WEBSITE</a>
		</div>
	</div>
	
</div>
<?php include '../global-footer.php'; ?>