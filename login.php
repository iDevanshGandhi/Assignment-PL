<?php
include 'db.php';

// Get the form data from the login.html page
$username = mysqli_real_escape_string($conn, $_POST['user_name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validate the form data
if (empty($user_name) || empty($password)) {
    echo "Both username and password are required.";
} else {
    // Check if the username and password match a user in the MySQL database
    $sql = "SELECT * FROM users WHERE username='$user_name' AND password='$password'";
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
