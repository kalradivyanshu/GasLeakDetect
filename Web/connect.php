<?php
$servername = "localhost";
$dbname = "gassensor";
$username = "root";
$password = "password";


$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
        }
?>