<?php session_start() ?>
<?php require_once("includes/admin-functions.php"); ?>
<?php 
$_SESSION['user']=null;
redirect_to("login.php");
?>