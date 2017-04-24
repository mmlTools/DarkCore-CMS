<?php if (!defined("DARKCORECMS")) header('Location: ../'); if (!isset($_SESSION['usr'])) {
	$login = new Login;
	if (isset($_POST['login']))
		$login->do_login($_POST['login_username'], $_POST['login_password']);
	$errors = $login->login_errors;
?>
	<div id='content'>
		<?php if (count($errors) > 0) { ?>
			<div id='errors-box'>
				<?php foreach ($errors as $key => $error) echo "<label class='error'>{$error}</label>" ?>
			</div>
		<?php } if (isset($_GET['reg'])) { ?>
			<div id='errors-box'>
				<label class="ok">You have succesfully registered now you can login</label>
			</div>
		<?php } ?>
		<div id='content-wrapper'>
			<div id='user-box'>
				<div class='reg-alts-part'>
					<h3 class='user-box-title'>Login to your Account</h3>
					<span class='box-divider'></span>
					<form action='' method='post' autocomplete='off' enctype='multipart/form-data'>
                        <input value='' name='login_username' class='usrinput' placeholder="Username" autocomplete="off" type='text' />
						<input value='' name='login_password' class='usrinput' style="margin-top:5px;" placeholder="Password" autocomplete="off" type='password' />
<<<<<<< HEAD:pages/login.php
						<input value='Login' name='login' id='submit' type='submit'>
                        <a href='modules/register' /><div class='submit-submenu'>Register</div></a>
=======
						<input value='Login' name='login.php' id='submit' type='submit'>
                        <a href='register.php' /><div class='submit-submenu'>Register</div></a>
>>>>>>> origin/master:login.php
                    </form>
				</div>
				<div class='reg-left-block'>
				<div class='reg-alts-part-sec'>
						<h3 class='user-box-title'>Few reassons why you should choose us</h3>
						<span class='box-divider'></span>
						<p style="color:#009966">We are a great and friendly community started back in 17/07/2014 , our server is still under development and we are trying to make the gameplay as fun as possible. We love our great community and we listen every single suggestion you'll give us. Server is PvE based but we are trying to listen to your PvP suggestions and doing our best to bring you more PvP content. We bring you great solo PvE experience and few group world bosses. We have so far 18 tier sets,6 traveler tiers,upgradable VIP items. We have tons of custom quests and over 15000 custom items and numbers are still growing almost every week. We managed to fix a lot of common bugs and edited character creations. That means you won't start with useless stuff in your bags.</p> 
					</div>
				</div>
			</div>
		</div>
	</div>
<<<<<<< HEAD:pages/login.php
<?php } ?>
=======
	<?php 
		include 'global-footer.php';
	} else { 
		echo "<script> window.load.href = 'user.php' </script>";
	} ?>
>>>>>>> origin/master:login.php
