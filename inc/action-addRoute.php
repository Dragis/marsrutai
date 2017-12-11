<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$error = "";
$data["success"] = false;
$Route = $_POST["Route"];

if (empty($Route["Name"]))
	$data["error"] = "Visi laukai turi būti užpildyti";

if (empty($Route["Date"]))
	$data["error"] = "Visi laukai turi būti užpildyti";

var_dump($_SESSION["User"]);


if (empty($data["error"])) {

	if ($Route["Repeatable"] == "false")
	{
		$Days = "false";
	}
	else
	{
		$Days = ";";
		foreach ($Route["Days"] as $key => $value) {
			if ($value != "false") {
				$Days .= $key.";";
			}
		}
	}

	$Success = $conn->query("INSERT INTO routes SET Name='".$Route["Name"]."' , Date='".$Route["Date"]."' , RouteWords='".$Route["Stops"]."' , weakDays='".$Days."', Driver='".$_SESSION["User"]["Username"]."', DriverID='".$_SESSION["User"]["ID"]."' ");

	$RouteID = $conn->insert_id;

	$Times = explode(";", $Route["Times"]);
	$Stops = explode(";", $Route["Stops"]);

	if ($Success) {
		foreach ($Stops as $key => $value) {
			if (!empty($value)) {
				$data["Success"] = $conn->query("INSERT INTO stops SET Name='".$Stops[$key]."' , Time='".$Times[$key]."', RouteID='".$RouteID."' ");
			}
		}
	}
}



// $data["Route"] = $Route;



echo json_encode($data);
?>
