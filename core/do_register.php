<?php define('DarkCoreCMS',TRUE);
	include 'config.php'; 
	include 'functions/global_functions.php';
	$_error= '';
	if (!isset($_POST['Username']) || 
			!isset($_POST['Password']) || 
				!isset($_POST['RepeatPassword']) || 
					!isset($_POST['Email']) || 
						!isset($_POST['RepeatEmail']) || 
							!isset($_POST['Country']) || 
								!isset($_POST['Age']) || 
									!isset($_POST['foundus']) || 
										!isset($_POST['robot1']) || 
											!isset($_POST['robot2'])){
			$_error = $_error . 'regerror=1&errtype=';
			header('Location: ../register?'.$_error);
		}
	else {
		if (check_user_exist($_POST['Username']) > 0)
			$_error = $_error . 'A';
		if (strlen($_POST['Username'])  < 3)
			$_error = $_error . 'B';
		if (strlen($_POST['Password'])  < 8)
			$_error = $_error . 'C';
		if (check_email_exist($_POST['Email']) > 0)
			$_error = $_error . 'D';
		if (strlen($_POST['Email'])  < 10) 
			$_error = $_error . 'E';
		if (strlen($_POST['Country'])  < 2) 
			$_error = $_error . 'F';
		if (strlen($_POST['Age'])  < 2) 
			$_error = $_error . 'G';
		if (strlen($_POST['foundus'])  < 5) 
			$_error = $_error . 'H';
		if (strlen($_POST['robot1'])  < 1) 
			$_error = $_error . 'I';
		if (strlen($_POST['robot2']) < 1)
			$_error = $_error . 'J';
		if ($_POST['Password'] != $_POST['RepeatPassword'])
			$_error = $_error . 'K';
		if ($_POST['Email'] != $_POST['RepeatEmail'])
			$_error = $_error . 'L';
		if ($_POST['robot1'] != $_POST['robot1-root'])
			$_error = $_error . 'M';
		if (strtoupper($_POST['robot2']) != $_POST['robot2-root'])
			$_error = $_error . 'N';
		if (strlen($_error) > 0)
			header('Location: ../register?regerror=1'.$_error);
		else {
			$username = $_POST['Username'];
			$password = $_POST['Password'];
			$password = encrypt($username, $password);
			register_user($username,$password,$_POST['Email'],$_POST['Country'],$_POST['Age'],$_POST['foundus']);
			header('Location: ../inc/success?page=register&user='.$username);
		}
	}
?>