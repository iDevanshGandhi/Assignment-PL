<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "user_name";
$password = "password";
$dbname = "login_data";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data from the login.html page
$username = mysqli_real_escape_string($conn, $_POST['user_name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validate the form data
if (empty($username) || empty($password)) {
    echo "Both username and password are required.";
} else {
    // Check if the username and password match a user in the MySQL database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }
}

// Close the MySQL database connection
mysqli_close($conn);
?>
