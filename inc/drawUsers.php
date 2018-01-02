<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$Types["driver"] = "Vairuotojas";
$Types["passenger"] = "Keleivis";
$Types["admin"] = "Administratorius";

$error = "";
$data["success"] = false;
$Search = $_POST["Search"];
$return = '';
$where = " WHERE 1=1 ";

if (!empty($Search["Username"]))
  $where .= " AND Username like '%".$Search["Username"]."%' ";

if (!empty($Search["Type"]))
  $where .= " AND Type like '%".$Search["Type"]."%' ";



$Users  = $conn->query("SELECT * FROM users ".$where."  LIMIT ".$Search["Limit"]);

while ($row = $Users->fetch_assoc()) {
  $return .= '<div class="routeWrapper">';


  if ($_SESSION["User"]["Type"] == "admin") {
    $return .= '<div data-routeid="'.$row["ID"].'" class="routeAction actionDelete"><span class="glyphicon glyphicon-trash"></span></div>';
    // $return .= '<a href="editRoute.php?id='.$row["ID"].'" data-routeid="'.$row["ID"].'" class="routeAction actionEdit"><span class="glyphicon glyphicon-pencil"></span></a>';

  } else if ($row["DriverID"] == $_SESSION["User"]["ID"]) {
    $return .= '<div data-routeid="'.$row["ID"].'" class="routeAction actionDelete"><span class="glyphicon glyphicon-trash"></span></div>';
    // $return .= '<a href="editRoute.php?id='.$row["ID"].'" class="routeAction actionEdit"><span class="glyphicon glyphicon-pencil"></span></a>';
  }



    $return .= '<div class="routeInfo">';
      $return .= '<div class="routeInfo-name">'.$row["Username"].'</div>';
      $return .= '<div class="routeInfo-driver">'.$Types[$row["Type"]].'</div>';
      $return .= '<div class="routeInfo-Date">'.$row["DateCreated"].'</div>';
    $return .= '</div>';


    if ($row["Type"] == "driver") {
      $return .= '<div class="UserItemsHeader">Maršrutai</div>';
      $return .= '<div class="userRoutes">';
      $Routes  = $conn->query("SELECT * FROM routes WHERE DriverID=".$row["ID"]." ");

      while ($row2 = $Routes->fetch_assoc()) {
        $return .= '<div class="UserItem">';
        $return .= '<div>'.$row2["Name"].'</div>';
        if ($row2["weakDays"] == "false")
          $return .= '<div class="routeInfo-Date">'.$row2["Date"].'</div>';
        else {
          $weakDays = explode(";", $row2["weakDays"]);
          $return .= '<div class="WeakDayHolder">';
          foreach ($weakDays as $key => $value)
            if (!empty($value)) 
              $return .= '<div>'.$value.'</div>';
          $return .= '</div>';
        }
          $return .= '</div>';
      }

      $return .= '</div>';
    }


    if ($row["Type"] == "passenger") {
      $return .= '<div class="UserItemsHeader">Važiavimai</div>';
      $return .= '<div class="userRoutes">';
      $Applications  = $conn->query("SELECT Date, (SELECT Name as Name FROM routes WHERE ID=entr.StopID ) as Name FROM applications entr WHERE UserID=".$row["ID"]." ");

      while ($row2 = $Applications->fetch_assoc()) {
        $return .= '<div class="UserItem">';
        if (!empty($row2["Name"]))
          $return .= '<div>'.$row2["Name"].'</div>';
        else
          $return .= '<div>Maršrutas ištrintas</div>';
        $return .= '<div>'.$row2["Date"].'</div>';
        $return .= '</div>';
        }
          $return .= '</div>';
      }



  $return .= '</div>';
}

$data = $return;


echo json_encode($data);
?>
