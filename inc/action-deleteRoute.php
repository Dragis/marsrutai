<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$RouteID = $_POST["RouteID"];

// var_dump($RouteID);
// $Route = $conn->query("SELECT * FROM routes WHERE ID='".$RouteID."'  ");
// var_dump($Route);




    $Route  = $conn->query("SELECT * FROM routes WHERE ID=".$RouteID." ");


while ($row2 = $Route->fetch_assoc()) {
	var_dump($row2);
	var_dump($row2["DriverID"]);

	if ( ($_SESSION["User"]["Type"] != "admin") && ($row2["DriverID"] != $_SESSION["User"]["ID"]) ) {
	  exit();
	} else {
		$sqs = $conn->query("DELETE FROM routes WHERE ID=".$RouteID." ");
		var_dump($sqs);
		$sqs = $conn->query("DELETE FROM stops WHERE RouteID=".$RouteID." ");
		var_dump($sqs);
	}

}




// $data["Route"] = $Route;



echo json_encode($data);
?>
