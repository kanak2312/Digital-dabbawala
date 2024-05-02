<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
// Define database connection variables
$host = "localhost";
$user = "root";
$password = "";
$database = "dabbawala";

// Create a connection object
$conn = mysqli_connect($host, $user, $password, $database);

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
