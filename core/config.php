<?php if(!defined('DarkCoreCMS')) { header('Location: ../');} 
//Website informations
$website_title = "DarkCorE CMS";
$website_description = "This website started as a PHP learning atempt but it received a really nice feedback about it's look so I decided to release it for public use and work along with other developers to make a brand new professional FREE TRINITYCORE CMS";
$website_keywords = "Dark,core,darkcore,cms,trinitycore";

//$DB_HOST = '0';
//$DB_USERNAME = '0';
//$DB_PASSWORD = '0';
$DB_WEBSITE = 'mysite';
$DB_WORLD = 'world';
$DB_AUTH = 'auth';
$DB_CHARACTERS = 'characters';

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