<?php define('DarkCoreCMS', TRUE); if (!isset($_SESSION)) { session_start(); } 
function logout()
{
  session_unset($_SESSION['usr']);
  session_destroy(); 
  header("Location: ../");
  exit();
}
logout();
?>