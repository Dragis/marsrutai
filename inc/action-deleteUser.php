<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$RouteID = $_POST["RouteID"];

// var_dump($RouteID);
// $Route = $conn->query("SELECT * FROM routes WHERE ID='".$RouteID."'  ");
// var_dump($Route);



if ( ($_SESSION["User"]["Type"] != "admin")) {
	exit();
} else {
	$sqs = $conn->query("DELETE FROM users WHERE ID=".$RouteID." ");
	// var_dump($sqs);
}



echo json_encode($data);
?>
