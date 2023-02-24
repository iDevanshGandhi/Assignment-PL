<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "user_name";
$password = "password";
$dbname = "signup_data";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>