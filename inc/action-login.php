<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$error = "";
$data["success"] = false;
$User = $_POST["user"];

// var_dump($User);

if (empty($User['password'])) {
  $error = 'Neivestas slaptažodis.';
} elseif (empty($User['username'])){
  $error = 'Reikalingas prisijungimo vardas.';
} else {
  $User  = $conn->query("SELECT * FROM users WHERE Username='".$User["username"]."' AND Password='".$User["password"]."'  LIMIT 1");

  while ($row = $User->fetch_assoc()) {
    $data["success"] = true;
    $data["User"] = $row;
    $_SESSION['userID'] = $row["ID"];
  } 

  if (!$data["success"]) {
    $error = 'Neteisingi prisijungimo duomenys.';
  }
}

$data["error"] = $error;



echo json_encode($data);
?>
