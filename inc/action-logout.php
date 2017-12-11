<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();

$_SESSION['User'] = [];

header('Location: ../login.php');
?>
