<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "marsrutai";
setlocale(LC_ALL,"LT");

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>