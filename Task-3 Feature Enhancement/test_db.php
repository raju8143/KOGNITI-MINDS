<?php
$mysqli = new mysqli('localhost:3307', 'root', 'mypassword', 'kognitiminds');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
} else {
    echo "Database connected successfully!";
}
?>
