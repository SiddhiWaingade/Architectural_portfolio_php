<?php
$servername = "localhost";   // usually localhost
$db_username = "root";        // database username
$db_password = "";            // database password
$dbname = "portfolio_db";       // your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
