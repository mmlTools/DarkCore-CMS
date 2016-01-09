<?php define('DarkCoreCMS', TRUE); include 'header.php' ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<?php if (!isset($_SESSION['usr'])) { ?>
	<div id='header'>
	</div>
	<?php include 'menu.php';
	        include 'core/functions/global_functions.php';
	 if (isset($_GET["regerror"])){
         get_reg_errors($_GET['errtype']);
    } ?>
	</div>
	<div id='content'>
		<div id='content-wrapper'>
			<div class='arm-title'>REGISTER NEW ACCOUNT</div>
			<div id='user-box'>
				<div class='reg-alts-part'>
					<h1 class='user-box-title'>New-Account Informations</h1>
					<span class='box-divider'></span>
					<form action="core/do_register.php" method="post" enctype="multipart/form-data">
						<input class='reg-input' type='text' 		value='' name='Username'		autocomplete='off' placeholder='Username**' required>
						<input class='reg-input' type='password' 	value='' name='Password'		autocomplete='off' placeholder='Password**'  required>
						<input class='reg-input' type='password' 	value='' name='RepeatPassword'	autocomplete='off' placeholder='Repeat Password**'  required>
						<input class='reg-input' type='email' 		value='' name='Email'			autocomplete='off' placeholder='Email**'  required>
						<input class='reg-input' type='email' 		value='' name='RepeatEmail'	autocomplete='off' placeholder='Repeat Email**'  required>
						<input class='reg-input' type='text' 		value='' name='Country'			autocomplete='off' placeholder='Country**'  required>
						<input class='reg-input' type='text' 		value='' name='Age'				autocomplete='off' placeholder='Age**'  required>
						<input class='reg-input' type='text' 		value='' name='foundus'			autocomplete='off' placeholder='How did you find us?**'  required>
						<?php $first=rand(1,10);$second=rand(1,10);$third=rand(1,10); $sum_s=$first+$second+$third;
						echo "
						<input class='reg-input-small' type='text' 	value='' name='robot1' 			autocomplete='off' placeholder='Write the Answer**'  required> <span class='reg-input-question'>".$first."+".$second."+".$third."=?</span>
						<input type='hidden' 	value='".$sum_s."' name='robot1-root'>
						<input class='reg-input-small' type='text' 	value='' name='robot2'			autocomplete='off' placeholder='Write text from green box**'  required> <span class='reg-input-question'>HUMAN</span>
						<input type='hidden' 	value='HUMAN' name='robot2-root'>
						"
						?>
						<input id='user-submit' type='submit' name='regsubmit' 	value='Register new Account'>
					</form>
					<span class='box-divider'></span>
					<span class='reg-mark'>All (**) marked fields are required !</span>
				</div>
				<div class='reg-left-block'>
				<div class='reg-alts-part-sec'>
						<h1 class='user-box-title'>Few reassons why you should choose us</h1>
						<span class='box-divider'></span>
						<p style="color:#009966">We are a great and friendly community started back in 17/07/2014 , our server is still under development and we are trying to make the gameplay as fun as possible. We love our great community and we listen every single suggestion you'll give us. Server is PvE based but we are trying to listen to your PvP suggestions and doing our best to bring you more PvP content. We bring you great solo PvE experience and few group world bosses. We have so far 18 tier sets,6 traveler tiers,upgradable VIP items. We have tons of custom quests and over 15000 custom items and numbers are still growing almost every week. We managed to fix a lot of common bugs and edited character creations. That means you won't start with useless stuff in your bags.</p> 
					</div>
					<div class='reg-alts-part-sec'>
						<h1 class='user-box-title'>Players feedback</h1>
						<span class='box-divider'></span>
						<table>
						<tr>
						<td style='width:100px;color:#009999'>Darksoke: </td>
						<td style='color:#009966'>This is just a test feedback until the website will be up on the host.</td> 
						</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
<?php } else { 
header('Location: user.php');
} ?>
</html>