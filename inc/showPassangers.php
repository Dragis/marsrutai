<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();

if(empty($_SESSION['User'])) {
  header('Location: login.php');
}

$data = [];
// $data["Error"] = "Nepavyko užsiregistruot";

$Stop = $_POST["Stop"];

$Passangers = $conn->query("SELECT * FROM applications Where RouteID=".$Stop["RouteID"]." AND StopID=".$Stop["StopID"]."  ");
// var_dump($Stop);

  $data["Passangers"] = "";
  while ($row = $Passangers->fetch_assoc()) 
  {
    $data["Passangers"] .= '<div>';
      $data["Passangers"] .= '<span>';
        $data["Passangers"] .= '<span class="PassangerName">'.$row["Username"].'</span>';
        $data["Passangers"] .= '<span>'.$row["Date"].'</span>';
      $data["Passangers"] .= '</span>';
      $data["Passangers"] .= '<span class="ApplicationMessage"></span>';
    $data["Passangers"] .= '</div>';
  }


echo json_encode($data);
?>
