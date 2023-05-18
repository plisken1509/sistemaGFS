<?php
require("permisos.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "desarroll_asistencia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$hostname = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "desarroll_asistencia";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

?>