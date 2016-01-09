<?php if(!defined('DarkCoreCMS')) { header('Location: ../');} 

//$GLOBALS['DB_HOST'] = '0';
//$GLOBALS['DB_USERNAME'] = '0';
//$GLOBALS['DB_PASSWORD'] = '0';
$GLOBALS['DB_WEBSITE'] = 'mysite';
$GLOBALS['DB_WORLD'] = 'world';
$GLOBALS['DB_AUTH'] = 'auth';
$GLOBALS['DB_CHARACTERS'] = 'characters';

//Was doing some tests to change the headers of some functions Add here your database login informations instead
function connect($shag,$sgsg,$gsg){
	$con = mysqli_connect('127.0.0.1','root','ascent');
	if (!$con) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
return $con;
}

?>