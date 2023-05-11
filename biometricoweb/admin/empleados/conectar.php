<?php
require("permisos.php");

$servername = "127.0.0.1";
$username = "desaroll_biometrico";
$password = "Biometric02023";
$dbname = "desaroll_asistencia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$hostname = "127.0.0.1";
$username = "desaroll_biometrico";
$password = "Biometric02023";
$databaseName = "desaroll_asistencia";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

?>