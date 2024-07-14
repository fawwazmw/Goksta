<?php

// Define database connection parameters
$servername = "localhost";  // Correct capitalization
$username = "root";
$password = "";
$dbname = "goksta";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
