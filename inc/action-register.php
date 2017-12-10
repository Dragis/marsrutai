<?php
header("Access-Control-Allow-Origin: *");
include('db.php');

$data = [];

$data["today"] = date("Y-m-d H:s");
$error = "";
$User = $_POST["user"];

// var_dump($User);

if (empty($User['password']))
	$error = 'Neivestas slaptažodis.';

if (empty($User['username'])){
	$error = 'Reikalingas prisijungimo vardas.';
} else {
    $taken  = $conn->query("SELECT id FROM users WHERE username='".$User["username"]."' LIMIT 1")->num_rows;
    if ($taken > 0)
		$error = 'Užimtas prisijungimo vardas.';
}


if ( ! empty($error)) {
	$data['error']  = $error;
} else {
    $sql = $conn->query("INSERT INTO `users`(`Username`, `Password`, `Type`, `DateCreated`)
    VALUES ('".$User["username"]."', '".$User["password"]."', '".$User["type"]."', '".$data["today"]."')");
    $data["success"] = true;
}


echo json_encode($data);
?>
