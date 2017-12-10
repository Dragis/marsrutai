<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();

$_SESSION['userID'] = "";

header('Location: ../login.php');
?>
