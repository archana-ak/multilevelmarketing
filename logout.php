<?php
include("include/config.php");

session_start();

date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
unset($_SESSION['id']);
session_destroy();
header('Location:index.php');
?>
