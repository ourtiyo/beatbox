<?php
session_start();
$_SESSION['username']='';
$_SESSION['member']='';
unset($_SESSION['username']);
unset($_SESSION['member']);

session_unset();
session_destroy();
header("Location:login.php");

?>