<?php 
define('DarkCoreCMS', TRUE); 
include 'header.php';
if (isset($_SESSION['usr'])) {
	$user_account = new account;
	$user_prw = $_SESSION['usr'];
	$user_account->construct(ucfirst($user_prw));
	if (isset($_POST['select-avatar'])){
		$user_account->set_avatar($user_account->acc_id,$_POST['select-avatar']);
		echo "<script> window.location.href = 'user';</script>";
	}
	if (isset($_POST['send-apply'])){
		$user_account->send_application($user_account->acc_id,$user_account->username,$_POST['answ-1'],$_POST['answ-2'],$_POST['answ-3'],$_POST['answ-4'],$_POST['answ-5'],$_POST['answ-6'],$_POST['answ-7'],$_POST['answ-8']);
		echo "<script> window.location.href = 'user';</script>";
	}
?>

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
<?php 
	include 'global-footer.php';
} else { 
	header('Location: index');
}
