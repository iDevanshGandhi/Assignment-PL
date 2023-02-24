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

// Get the form data from the signup.html page
$username = mysqli_real_escape_string($conn, $_POST['user_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact_number = mysqli_real_escape_string($conn, $_POST['phone_no']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$re_enter_password = mysqli_real_escape_string($conn, $_POST['re_password']);

// Validate the form data
if (empty($username) || empty($email) || empty($contact_number) || empty($password) || empty($re_enter_password)) {
    echo "All fields are required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
} elseif ($password != $re_enter_password) {
    echo "Passwords do not match.";
} else {
    // Insert the form data into the MySQL database
    $sql = "INSERT INTO users (username, email, contact_number, password)
            VALUES ('$username', '$email', '$contact_number', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Signup successful.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the MySQL database connection
mysqli_close($conn);
?>
