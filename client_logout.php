<?php session_start() ?>
<?php require_once("./includes/functions.php"); ?>
<?php 
$_SESSION['client_id']=null;
redirect_to("login.php");
?>