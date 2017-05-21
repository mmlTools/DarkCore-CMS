<?php if (!defined("DARKCORECMS") || isset($_SESSION['usr'])) redirect("../");
	$registration = new Registration;
	$first=rand(1,10);
	$second=rand(1,10);
	$third=rand(1,10);
	$sum_s=$first+$second+$third;
	$countries = get_countries_list();
	$findOptions = get_findOptions_list();
	if (isset($_POST['regsubmit']))
		$registration->register_user(
			$_POST['Username'],
			$_POST['Password'],
			$_POST['RepeatPassword'],
			$_POST['Email'],
			$_POST['RepeatEmail'],
			$_POST['Country'],
			$_POST['Age'],
			$_POST['foundus'],
			$_POST['robot1'],
			$_POST['robot1-root'],
			$_POST['robot2'],
			$_POST['robot2-root']);
	$errors = $registration->registration_errors;
	?>
	<div id='content'>
		<?php if (count($errors) > 0) { ?>
			<div id='errors-box'>
				<?php foreach ($errors as $key => $error) echo "<label class='error'>{$error}</label>" ?>
			</div>
		<?php } ?>
		<div id='content-wrapper'>
			<div id='user-box'>
				<div class='reg-alts-part'>
					<h3 class='user-box-title'>Register new account</h3>
					<span class='box-divider'></span>
					<form action="" method="post" enctype="multipart/form-data">
						<input class='reg-input' type='text' name='Username' <?php if (isset($_POST['Username'])) echo "value='".$_POST['Username']."'" ?> autocomplete='off' placeholder='Username**' required>
						<input class='reg-input' type='password' name='Password' autocomplete='off' placeholder='Password**'  required>
						<input class='reg-input' type='password' name='RepeatPassword' autocomplete='off' placeholder='Repeat Password**'  required>
						<input class='reg-input' type='email' name='Email' <?php if (isset($_POST['Email'])) echo "value='".$_POST['Email']."'" ?> autocomplete='off' placeholder='Email**'  required>
						<input class='reg-input' type='email' name='RepeatEmail' <?php if (isset($_POST['RepeatEmail'])) echo "value='".$_POST['RepeatEmail']."'" ?> autocomplete='off' placeholder='Repeat Email**'  required>
						<input class='reg-input' type='text' name='Age' <?php if (isset($_POST['Age'])) echo "value='".$_POST['Age']."'" ?> autocomplete='off' placeholder='Age**'  required>
						<label>Where are you from?</label>
						<select class='reg-input' name='Country' required>
							<?php foreach($countries as $key => $country){
								echo "<option value='{$country}'>{$country}</option>";
							} ?>
						</select>
						<label>How did you find us?</label>
						<select class='reg-input' name='foundus' required>
							<?php foreach($findOptions as $key => $option){
								echo "<option value='{$option}'>{$option}</option>";
							} ?>
						</select>						<?php
						echo "
						<input class='reg-input-small' type='text' 	value='' name='robot1' autocomplete='off' placeholder='Write the Answer**'  required> <span class='reg-input-question'>{$first}+{$second}+{$third}=?</span>
						<input type='hidden' value='{$sum_s}' name='robot1-root'>
						<input class='reg-input-small' type='text' value='' name='robot2' autocomplete='off' placeholder='Write text from green box**'  required> <span class='reg-input-question'>HUMAN</span>
						<input type='hidden' value='HUMAN' name='robot2-root'>
						"
						?>
						<input id='user-submit' type='submit' name='regsubmit' value='Register new Account'>
					</form>
					<span class='reg-mark'>All (**) marked fields are required !</span>
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
