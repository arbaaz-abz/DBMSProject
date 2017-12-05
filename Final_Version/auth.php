<?php
  ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION["login_user"])){
 header("Location: login.php");
exit(); }
?>
