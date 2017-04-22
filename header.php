<?php 
if (!isset($_SESSION)) { session_start(); } 
include "core/config.php";
foreach (glob("core/functions/*.php") as $filename){
    include $filename;
}
if (isset($_SESSION['usr'])) {
	$user_prw = $_SESSION['usr'];
}
$user_account = new account;
$text_parser = new BbParser;
$charinfo = new character;
if (isset($_GET['Logout']) && isset($_SESSION['usr'])){
	logout($_SESSION['usr']);
}
?>
<!DOCTYPE HTML><html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $website_description ?>">
	<meta name="keywords" content="<?php echo $website_keywords ?>">
	<title><?php echo $website_title."-"; echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css" title="Default Styles" media="screen">
	<link rel="stylesheet" type="text/css" href="css/armory.css" title="Default Styles" media="screen">
	<link rel="stylesheet" type="text/css" href="css/board.css" title="Default Styles" media="screen">
	<script type="text/javascript" src="js/skinnytip.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<div id='header'></div>
<div id='menu'>
	<center>
		<div id='menu-block'>
			<a class='menu-item' href='index.php'>HOME</a>
			<a class='menu-item' href='armory.php'>ARMORY</a>
			<a class='menu-item' href='guides.php'>GUIDES & DOWNLOADS</a>
			<a class='menu-item' href='forum.php'>FORUM <label style="font-size:10px;color:lime;">alpha</label></a>
			<a class='menu-item' href='rules.php'>RULES</a>
			<?php if (isset($_SESSION['usr'])){
				echo "<a class='menu-item' href='store.php'>STORE <label style='font-size:10px;color:lime;'>alpha</label></a>";
				echo "<a class='menu-item' href='user.php'>ACCOUNT PANEL</a>";
				echo "<a class='menu-item' href='?Logout'>LOGOUT</a>";
			} else{
				echo "<a class='menu-item' href='login.php'>LOGIN</a>"; 
				echo "<a class='menu-item' href='register.php'>REGISTER</a>"; 
			}?>
		</div>
	</center>
</div>
