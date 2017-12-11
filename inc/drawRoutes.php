<?php
header("Access-Control-Allow-Origin: *");
include('db.php');
session_start();
$data = [];

$error = "";
$data["success"] = false;
$Search = $_POST["Search"];
$return = '';

$where = " WHERE 1=1 ";

if (!empty($Search["searchFrom"]) && empty($Search["searchTo"]))
  $where .= " AND routeWords like '%".$Search["searchFrom"]."%' ";

if (!empty($Search["searchTo"]) && empty($Search["searchFrom"]))
  $where .= " AND routeWords like '%".$Search["searchTo"]."%' ";

if (!empty($Search["searchTo"]) && !empty($Search["searchFrom"]))
  $where .= " AND routeWords like '%".$Search["searchFrom"]."%".$Search["searchTo"]."%' ";

if (!empty($Search["searchDriver"]))
  $where .= " AND Driver like '%".$Search["searchDriver"]."%' ";

if (!empty($Search["Date"])){
  $where .= " AND( Date like '%".$Search["Date"]."%' OR weakDays like '%".date("N", strtotime($Search["Date"]))."%' )";
}


$Routes  = $conn->query("SELECT * FROM routes ".$where."  LIMIT ".$Search["Limit"]);

while ($row = $Routes->fetch_assoc()) {
  $return .= '<div class="routeWrapper">';
    $return .= '<div class="routeInfo">';
      $return .= '<div class="routeInfo-name">'.$row["Name"].'</div>';

      if ($row["weakDays"] == "false")
        $return .= '<div class="routeInfo-Date">'.$row["Date"].'</div>';
      else {
        $weakDays = explode(";", $row["weakDays"]);
        $return .= '<div class="WeakDayHolder">';
        foreach ($weakDays as $key => $value) {
          if (!empty($value)) {
            $return .= '<div>'.$value.'</div>';
          }
        }
          $return .= '</div>';
      }

      $return .= '<div class="routeInfo-driver">'.$row["Driver"].'</div>';
    $return .= '</div>';


    $Stops  = $conn->query("SELECT * FROM stops WHERE RouteID=".$row["ID"]." ");
    $first = true;
    $return .= '<div class="routeStops">';
    while ($row2 = $Stops->fetch_assoc()) {
      $return .= '<div>';
        $return .= '<div class="routeStops-name">'.$row2["Name"].'</div>';
        $return .= '<div class="routeStops-time">'.date("H:i", strtotime($row2["Time"])).'</div>';

      if ($first) {
        if (date('H:i') >= date("H:i", strtotime($row2["Time"])))
          $return .= '<div class="routeStops-click routeStops-click_active"></div>';
        else
          $return .= '<div class="routeStops-click"></div>';

        $first = false;
      } else {

        if (date('H:i') >= date("H:i", strtotime($row2["Time"]))) {
          $return .= '<div class="routeStops-click routeStops-click_active">';
            $return .= '<div class="routeStops-line routeStops-line_active"></div>';
          $return .= '</div>';
        } else {   
          $return .= '<div class="routeStops-click">';
            $return .= '<div class="routeStops-line"></div>';
          $return .= '</div>';
        }
      }
      $return .= '</div>';
    }


    $return .= '</div>';
  $return .= '</div>';
} 

$data = $return;


echo json_encode($data);
?>
