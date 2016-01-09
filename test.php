<?php
define('DarkCoreCMS', TRUE);  if (isset($_SESSION['usr'])) { $user_prw = $_SESSION['usr'];}
require_once 'core/config.php';
require_once 'core/functions/global_functions.php';
require_once 'core/functions/realm_functions.php';
require_once 'core/functions/bugtracker.php';
require_once 'core/functions/account_functions.php';
require_once 'core/functions/vote_functions.php';
require_once "core/functions/board_functions.php";


$board = new BoardData();
$forums = new BoardData();
$board->construct();
echo "<ul>";
for ($i=1;$i <= count($board->categorys);$i++){

    echo "<li>".$board->categorys[$i]['id']." - ".$board->categorys[$i]['title']."</li>";
    $forums->get_forums_by_category($board->categorys[$i]['id']);
    echo "<ul>";
    for ($j=1;$j <= count($forums->forums);$j++){
        echo "<li>".$forums->forums[$j]['id']." - ".$forums->forums[$j]['title']." - ".$forums->forums[$j]['description']." - ".$forums->forums[$j]['icon']."</li>";
    }
    echo "</ul>";
}
echo "</ul>";