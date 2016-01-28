<?php if(!defined('DarkCoreCMS')) { header('Location: ../');} 
//Website informations
$website_title = "DarkCorE CMS";
$website_description = "DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.";
$website_keywords = "Dark,core,darkcore,cms,trinitycore";

//Armory Config
$limit=21; //Set how many results to show / page

//Server Config
$realmlist="cms.darkcore.com";

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