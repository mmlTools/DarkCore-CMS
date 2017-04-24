<?php define("DARKCORECMS", "TRUE"); if (!isset($_SESSION)) { session_start(); }
foreach (glob("engine/config/*.php") as $filename)
{
	include $filename;
}
foreach (glob("engine/functions/*.php") as $filename)
{
	include $filename;
}
if (isset($_SESSION['usr']))
	$account = new Account($_SESSION['usr']);
if (!isset($_GET['page']))
	$page = 'home';
else{
	if (preg_match('/[^a-zA-Z]/', $_GET['page']))
		$page = 'home';
	else
		$page=$_GET['page'];
}
if (isset($_GET['action']) and $_GET['action'] == 'logout') logout($_SESSION['usr']);
?>
<!DOCTYPE HTML><html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $website_description ?>">
	<meta name="keywords" content="<?php echo $website_keywords ?>">
	<title><?php echo $website_title." - WoW Private Server" ?></title>
	<link rel="stylesheet" type="text/css" href="style/load_css.css" title="Default Styles" media="screen">
	<script type="text/javascript" src="style/js/skinnytip.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
<div id='header'></div>
<div id='menu'>
	<center>
		<div id='menu-block'>
			<a class='menu-item' href='index?page=home'>HOME</a>
			<a class='menu-item' href='index?page=armory'>ARMORY</a>
			<a class='menu-item' href='index?page=guides'>GUIDES & DOWNLOADS</a>
			<a class='menu-item' href='index?page=forum'>FORUM <label style="font-size:10px;color:lime;">alpha</label></a>
			<a class='menu-item' href='index?page=rules'>RULES</a>
			<?php if (isset($_SESSION['usr'])){
				echo "<a class='menu-item' href='index?page=store'>STORE <label style='font-size:10px;color:lime;'>alpha</label></a>";
				echo "<a class='menu-item' href='index?page=user'>ACCOUNT PANEL</a>";
				echo "<a class='menu-item' href='index?action=logout'>LOGOUT</a>";
			} else{
				echo "<a class='menu-item' href='index?page=login'>LOGIN</a>";
				echo "<a class='menu-item' href='index?page=register'>REGISTER</a>";
			}?>
		</div>
	</center>
</div>
<?php
if (file_exists('pages/'.$page.'.php')){
	include 'pages/'.$page.'.php';
}
else{
	if ($page != 'home')
		include 'err.html';
	else
		include 'pages/home.php';
}
?>
</body>
<div id='footer'>
	<div id='footer-right'>
		<a href='#'>HOME</a> |
		<a href='#'>ARMORY</a> |
		<a href='#'>FORUM</a> |
		<a href='#'>GUIDES</a> |
		<a href='#'>RULES & REGULATIONS</a> |
		<a href='#'>REGISTER</a>
	</div>
	<div id='copyright'>
		Copyright &copy; All rights reserver to GamingZeta and/or it's asociates all ressources belongs to GamingZeta, Designed and coded by DARKSOKE.World of Warcraf&#8482; and Blizzard Entertainment&reg; are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. These terms and all related materials, logos, and images are copyright &copy; Blizzard Entertainment. This site is in no way associated with Blizzard Entertainment&reg;.
	</div>
	<a href="http://www.mmltools.com/projects/darkcorecms"><div id="footer-creds"></div></a>
</div>
</html>