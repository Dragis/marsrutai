<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

function test($timeStr){

    $dateObj = DateTime::createFromFormat('d.m.Y H:i', "10.10.2010 " . $timeStr);

    if ($dateObj !== false && $dateObj && $dateObj->format('G') == intval($timeStr)) {

    }
    else{
		$data["error"] = "Neteisingas laiko formatas";
		echo json_encode($data);
		exit();
    }

}

$error = "";
$data["success"] = false;
$Route = $_POST["Route"];

if (empty($Route["Name"]))
	$data["error"] = "Visi laukai turi būti užpildyti";
	// $valid = 1;
	$Times = explode(";", $Route["Times"]);
	$Stops = explode(";", $Route["Stops"]);

	foreach ($Times as $key => $value) {
		if (!empty($value)){
			test($value);
		}
	}


if (empty($data["error"])) {

	if ($Route["Repeatable"] == "false")
	{
		if (empty($Route["Date"]))
			$data["error"] = "Visi laukai turi būti užpildyti";
		$Days = "false";
		$Route["Date"] = null;
	}
	else
	{
		$Days = ";";
		if (empty($Route["Days"])) {
			$data["error"] = "Pasirinkite dienas";
			echo json_encode($data);
			exit();
		}

		foreach ($Route["Days"] as $key => $value) {
			if ($value != "false") {
				$Days .= $key.";";
			}
		}
	}

	$Success = $conn->query("INSERT INTO routes SET Name='".$Route["Name"]."' , Date='".$Route["Date"]."' , RouteWords='".$Route["Stops"]."' , weakDays='".$Days."', Driver='".$_SESSION["User"]["Username"]."', DriverID='".$_SESSION["User"]["ID"]."' ");

	$RouteID = $conn->insert_id;

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
