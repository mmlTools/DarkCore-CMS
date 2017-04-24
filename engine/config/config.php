<?php if (!defined("DARKCORECMS")) header('Location: ../../');
//Website informations
$website_title = "DarkCorE CMS";
$website_description = "DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.";
$website_keywords = "Dark,engine,darkcore,cms,trinitycore";

//Armory Config
$limit=21; //Set how many results to show / page

//Server Config
$realmlist="cms.darkcore.com";

$database = array(
	"db_host" => '127.0.0.1',
	"db_username" => 'root',
	"db_password" => '',
	"auth_db" => 'auth',
	"web_db" => 'mysite'
);

$realms = array(
	"realm_id" => '1',
	"characters_db" => 'characters',
	"world_db" => 'world'
);