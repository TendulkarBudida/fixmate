<?php
session_start();

// Database connection (replace with your actual connection details)
$servername = "127.0.0.1";
$username_db = "root";
$password_db = "";
$dbname = "fixmate";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>