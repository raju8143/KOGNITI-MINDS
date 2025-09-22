<?php
// Database configuration
$host = 'localhost:3307';

$db_name = 'kognitiminds';  // Your database name
$db_user = 'root';
$db_pass = 'mypassword';  // empty password for XAMPP

// Create connection
$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Optional: set charset
$mysqli->set_charset("utf8");
?>
