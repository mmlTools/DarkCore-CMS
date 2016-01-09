<?php define('DarkCoreCMS', TRUE); include 'header.php' ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<?php if (isset($_SESSION['usr'])) { ?>
	<div id='header'>
	</div>
	<?php include 'menu.php';
	include 'core/config.php';
	include 'core/functions/global_functions.php';
	include 'core/functions/realm_functions.php';
	include 'core/functions/account_functions.php';
	include 'core/functions/character_functions.php';
	include 'core/functions/vote_functions.php';
	$user_account = new account;
	$user_prw = $_SESSION['usr'];
	$user_account->construct(ucfirst($user_prw));
	if (isset($_POST['select-avatar'])){
		$user_account->set_avatar($user_account->acc_id,$_POST['select-avatar']);
		header("Location: user");
	}
	if (isset($_POST['send-apply'])){
		$user_account->send_application($user_account->acc_id,$user_account->username,$_POST['answ-1'],$_POST['answ-2'],$_POST['answ-3'],$_POST['answ-4'],$_POST['answ-5'],$_POST['answ-6'],$_POST['answ-7'],$_POST['answ-8']);
		header("Location: user");
	}
	?>
	<div id='content'>
		<div id='content-wrapper'>
			<div class='lastnews-head-text'><?php echo ucwords($user_prw) ?>'s User Administration Panel</div>
			<div class="newsdivider"></div>
			<?php $account = new account;$account->construct($user_prw); $chars = chars_by_userID($account->acc_id);?>
			<div id='user-box'>
				<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">BASIC ACCOUNT INFORMATIONS</div>
				<div id="userbox-left">
					<div class="user-box-avatar">
						<img src='<?php echo $account->avatar;?>' alt='avatar' width="122" height="130"/>
					</div>
					<div class="user-box-info">
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Email:</div>
							<div class="userbox-line-light"><?php echo $account->email;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Join Date:</div>
							<div class="userbox-line-light"><?php echo $account->joindate;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Last Log In:</div>
							<div class="userbox-line-light"><?php echo $account->last_login;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Last IP:</div>
							<div class="userbox-line-light"><?php echo $account->last_ip;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Vote Points:</div>
							<div class="userbox-line-light"><?php echo $account->vp;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Donation Points:</div>
							<div class="userbox-line-light"><?php echo $account->dp;?></div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Total Forum Topics:</div>
							<div class="userbox-line-light">-----</div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Total Forum Posts:</div>
							<div class="userbox-line-light">-----</div>
						</div>
						<div class="userbox-info-line">
							<div class="userbox-line-light-left">Latest Started Topic:</div>
							<div class="userbox-line-light">-----</div>
						</div>
					</div>
				</div>
				<div id="userbox-right">
					<a class="userbox-button" href="">DONATE</a>
					<?php if ($user_account->gmlevel < 5) { ?>
						<a id="gmapply" class="userbox-button" href="#">APPLY FOR GM SPOT</a>
					<?php } else { ?>
						<a id="gm-tools" class="userbox-button" href="#">GAMEMASTER TOOLS</a>
					<?php } ?>
					<a id="avatarscript" class="userbox-button" href="#">CHANGE AVATAR</a>
					<a id="charlist" class="userbox-button" href="#">LIST CHARACTERS</a>
				</div>
				<div id="userbox-big">
					<div id="avatar-scripts" style="display: none;text-align:center;">
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">CHOOSE YOUR AVATAR</div>
						<form method="post">
							<?php
							$dirname = "images/avatars/";
							$images = glob($dirname."*.png");
							foreach($images as $image) { $imgname = str_replace($dirname,"",$image);?>
								<input type="submit" name="select-avatar" value="<?php echo $imgname; ?>" class="avatarlist" style="background: url('<?php echo $dirname.$imgname; ?>');"/>
							<?php } ?>
						</form>
					</div>
					<div id="acc-characters-list" style="display: none;">
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">ACCOUNT CHARACTERS</div>
						<?php $i=1; foreach($chars as $count) { ?>
							<div class='user-character-box'>
								<div class='portrait' style='text-align:center;'><img src='images/portraits/<?php echo $chars[$i]['class']; ?>.png' width='75' height='75'/></div>
								<div style='margin-top:0px;'>
									<div class='char-info-level'><span class='text'><?php echo $chars[$i]['level'];?></span></div>
									<div class='char-info-race'><img src='images/char/race/<?php echo $chars[$i]['race'];?>-<?php echo $chars[$i]['gender'];?>.gif' /></div>
									<div class='char-info-class'><img src='images/char/class/<?php echo $chars[$i]['class'];?>.gif' /></div>
								</div>
								<div class='char-name'><a style='color:#<?php echo char_name_color($chars[$i]['class']); ?>' href='character?c=<?php echo $chars[$i]['name'];?>'><?php echo $chars[$i]['name'];?></a></div>
								<a class="userbox-link" href="character?c=Darksoke">VIEW CHARACTER EQUIPMENT</a>
							</div>
							<?php $i++; } ?>
					</div>
					<div id="gm-tools-list" style="display: none;">
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:18px;margin-top:-10px;">Check active tickets</div>
						<?php if ($user_account->gmlevel > 5) { $active_tickets = list_tickets(); if (!empty($active_tickets)) {$i=1; foreach($active_tickets as $ticket){ ?>
							<div class="ticket-line">
								<div class="ticket-message">
									<?php echo $active_tickets[$i]['message']; ?>
								</div>
								<div class="ticket-info">
									<div class="ticket-list-title">By: <label class="ticket-list-item"><?php echo $active_tickets[$i]['name']; ?></label></div>
									<div class="ticket-list-title">In: <label class="ticket-list-item"><?php echo date("l-F-Y H:i",$active_tickets[$i]['lastModifiedTime']); ?></label></div>
									<div class="ticket-list-title">Assignation: <label class="ticket-list-item"><?php if ($active_tickets[$i]['assignedTo'] == 0) echo 'Public Ticket'; else echo get_charname_byguid($active_tickets[$i]['assignedTo']); ?></label></div>
									<div class="ticket-list-title">Check: <label class="ticket-list-item"><?php if ($active_tickets[$i]['viewed'] == 0) echo 'Not Viewed'; else echo 'Viewed';  ?></label></div>
								</div>
							</div>
						<?php $i++; }}
						else { ?>
							<div class="gmalert">There are no active tickets to show</div>
						<?php } } else { ?>
							<div class="gmalert">You are not allowed to see this section</div>
						<?php } ?>
					</div>
					<div id="application-form" style="text-align: center;display: none;">
						<?php $user_account->get_application($user_account->acc_id); $appform = $user_account->application; ?>
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:24px;margin-top:-10px;">Gamemaster Application Form</div>
						<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:16px;margin-top:-25px;color:#FF068E;"><?php if (!isset($appform)) echo '" Your application is Pending approval you may edit your answers "' ?></div>
						<form method="post">
							<div class="answer-line">
								<div class="important-question">1.Please write your full name in order for your application to be validated!</div>
								<div class="question-description">-Please write your real name , no account name , no nicknames nothing else but your name.</div>
								<input class="answer-low" name="answ-1" type="text" size="100" value="<?php if (!isset($appform)) echo $appform['a1']; ?>" required />
							</div>
							<div class="answer-line">
								<div class="important-question">2.How old are you ? Please make sure you have read the rules before answering to this form!</div>
								<div class="question-description">-Make sure you have read the rules , the minimum age we accept is 17 years old.</div>
								<input class="answer-low" name="answ-2"  type="text" size="100" value="<?php if (!isset($appform)) echo $appform['a2']; ?>" required />
							</div>
							<div class="answer-line">
								<div class="important-question">3.Do you have skype? And are you wiling to chat into a group?</div>
								<div class="question-description">-We are using skype as chat with every staff member.</div>
								<input class="answer-low" name="answ-3"  type="text" size="100" value="<?php if (!isset($appform)) echo $appform['a3']; ?>" required />
							</div>

							<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:24px;margin-top:-10px;">Questionaire</div>

							<div class="answer-line">
								<div class="important-question">1.A player is having the following problem, how do you answer to him?</div>
								<div class="question-description">-"My chaaracter is bugged I can't see icons and I can't use my skills , I also see everything in blue/white squares"</div>
								<textarea class="answer-big" name="answ-4"  maxlength="300" required ><?php if (!isset($appform)) echo $appform['a4']; ?></textarea>
							</div>
							<div class="answer-line">
								<div class="important-question">2.In case of bugged creatures or gameobjects how do you act in the following situation?</div>
								<div class="question-description">-"For example Poseidon is getting into evade bug what do you do , please state at least 2 situations"</div>
								<textarea class="answer-big" name="answ-5"  maxlength="300" required ><?php if (!isset($appform)) echo $appform['a5']; ?></textarea>
							</div>
							<div class="answer-line">
								<div class="important-question">3.As gm sometimes there will be a flood of tickets and sometimes there won't be any tickets how do you act in the following situation?</div>
								<div class="question-description">-"There are 3 active tickets and there is another staff member online but AFK"</div>
								<textarea class="answer-big" name="answ-6"  maxlength="300" required ><?php if (!isset($appform)) echo $appform['a6']; ?></textarea>
							</div>
							<div class="answer-line">
								<div class="important-question">4.We allow staff members to dual box but many things happen when you are playing on your main account.</div>
								<div class="question-description">-"You are not allowed to stay afk for more than 10 minutes on your GM account but also there might be some hackers while you are playing on your main what do you do in this situation?"</div>
								<textarea class="answer-big" name="answ-7"  maxlength="300" required ><?php if (!isset($appform)) echo $appform['a7']; ?></textarea>
							</div>
							<div class="answer-line">
								<div class="important-question">5.We are looking for inventive staff members wo can help us with ideeas and a way to apply them.</div>
								<div class="question-description">-"What could you help us with more than being a staff member , runing events and reading tickets ? Please write a groud breaking ideea."</div>
								<textarea class="answer-big" name="answ-8"  maxlength="300" required ><?php if (!isset($appform)) echo $appform['a8']; ?></textarea>
							</div>
							<div class="answer-line">
								<div class="disclaimer">
									<div class="line">-You must be at least 17 years old in order to be able to validate your application.</div>
									<div class="line">-You must have joined at least 1 month before applying and know the basics of the server.</div>
									<div class="line">-Please answer to all questions as explicit as possible.</div>
									<div class="line" style="margin-top:20px;">
										<input type="checkbox" required />
										<label>I agree with the following rules</label>
									</div>
								</div>
								<input value='Submit Application' name='send-apply' id='post-apply' type='submit' />
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="user-box">
				<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">VOTE PANEL</div>
				<div id='vote-links-box'>
					<?php
					$date = new DateTime();
					$cur_time = $date->getTimestamp();
					$vote_sites = get_vote_sites();
						for ($i=1;$i<=count($vote_sites);$i++){
							$expire = get_expir_time($user_account->acc_id,$vote_sites[$i]['id']);
							if ($cur_time > $expire )
								$rem = 0;
							else
								$rem = time2string($expire - $cur_time);
							?>
							<div class='vote-box'>
								<div class='name-box'><?php echo $vote_sites[$i]['title'] ?></div>
									<?php if ($rem == 0){ ?>
										 <a id="vote-button" href="core/do_vote?siteid=<?php echo $vote_sites[$i]['id']; ?>&user=<?php echo $user_account->acc_id; ?>" target='_blank' onclick="location.reload(true)">
										 	<img src="<?php echo $vote_sites[$i]["logo"] ?>" border="0" alt="private server" width="88" height="51"/>
										 </a>
									<?php } else { ?>
										 <img src="images/votenew.jpg" border="0" alt="private server" width="88" height="51" />
									<?php } ?>
								<div class='points-box'>Points: <?php $day_number = idate('w', $cur_time); if ($day_number == 6 || $day_number == 0) echo $vote_sites[$i]['end_week_points']; else echo $vote_sites[$i]['points']; ?></div>
								<div id="vote-button" onclick="location.reload(true)" class='time-rem'><?php if ($rem == 0) echo 'You can vote now'; else echo $rem ?></div>
							</div>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<script>
			$(document).ready(function(){
				$(".userbox-button").click(function(e){
					if (this.id)
						var action = $(this).attr('id');
					else
						return;
					$("#userbox-big").hide();
					function show_element(event) {
						$("#notify").hide();
							$("#userbox-big").css("display","block");
							switch (event) {
								case 'gmapply':
									var method = "application-form";
									$("#gm-tools-list, #acc-characters-list, #avatar-scripts").css('display', 'none');
									if( $("#"+method).css('display') == 'block')
										$("#"+method+", #userbox-big").css('display', 'none');
									else
										$("#"+method).css('display', 'block');
									break;
								case 'avatarscript':
									var method = "avatar-scripts";
									$("#gm-tools-list, #acc-characters-list, #application-form").css('display', 'none');
									if( $("#"+method).css('display') == 'block')
										$("#"+method+", #userbox-big").css('display', 'none');
									else
										$("#"+method).css('display', 'block');
									break;
								case 'charlist':
									var method = "acc-characters-list";
									$("#gm-tools-list, #avatar-scripts, #application-form").css('display', 'none');
									if( $("#"+method).css('display') == 'block')
										$("#"+method+", #userbox-big").css('display', 'none');
									else
										$("#"+method).css('display', 'block');
									break;
								case 'gm-tools':
									var method = "gm-tools-list";
									$("#avatar-scripts, #acc-characters-list, #application-form").css('display', 'none');
									if( $("#"+method).css('display') == 'block')
										$("#"+method+", #userbox-big").css('display', 'none');
									else
										$("#"+method).css('display', 'block');
									break;
							}
						}
					show_element(action);
					e.preventDefault();
				});
			});
	</script>
	<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
<?php } else { 
header('Location: index');
} ?>
</html>