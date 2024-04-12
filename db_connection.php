<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LibrarySystem";

// Create connection
$sql_connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($sql_connection->connect_error) {
    die("Connection failed: " . $sql_connection->connect_error);
}
