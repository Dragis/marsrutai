<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();

if(empty($_SESSION['User'])) {
  header('Location: login.php');
}

$data = [];
$data["Error"] = "Nepavyko užsiregistruot";

$Stop = $_POST["Stop"];

$exists = $conn->query("SELECT * FROM applications 
  Where 
  Username='".$_SESSION['User']["Username"]."' AND 
  UserID='".$_SESSION['User']["ID"]."'AND 
  RouteID='".$Stop["RouteID"]."'  ")->num_rows;
// var_dump($Stop);

if ($exists == 0)
{
  // $Date = $conn->query("SELECT * FROM routes WHERE ID=".$Stop["RouteID"]."  AND NumRow=".$Stop["RouteID"]."  limit 1");
  // $Date = mysql_fetch_object($Date);
  // $Time = $conn->query("SELECT Time FROM stops WHERE ID=".$Stop["StopID"]." limit 1");
  // $Time = mysql_fetch_object($Time);
  // var_dump($Date);
  // var_dump($Time);
  $data["Success"] = $conn->query("INSERT INTO applications 
    SET 
    Username='".$_SESSION['User']["Username"]."' , 
    UserID='".$_SESSION['User']["ID"]."', 
    RouteID='".$Stop["RouteID"]."' ,
    StopID='".$Stop["StopID"]."' ,
    Baggage='".$Stop["Baggage"]."' ");
  
} else {
  $data["Error"] = "Jūs jau užsiregistravęs šiai kelionei";
}



echo json_encode($data);
?>
