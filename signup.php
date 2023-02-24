<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Login/Sign-up Page</title>
</head>
<body>
  <div class="logo">
    <img src="images/logo.webp" alt="ParasLabs-Logo">
  </div>
  <div class="wrapper">
    <h1>Sign Up</h1>
    <form action="#" name="form" method="POST">
      <input type="email" placeholder="E-Mail ID">
      <input type="text" placeholder="Username">
      <input type="tel" placeholder="Contact Number">
      <input type="password" placeholder="Password">
      <input type="password" placeholder="Re-Enter Password">
      <button>Sign Up</button>
    </form>
    <!-- <div class="terms">
      <input type="checkbox" id="checkbox">
      <label for="checkbox">I agree to these <a href="#">Terms and Conditions</a> </label>
    </div> -->
    <!-- <button>Sign Up</button> -->
    <div class="member">
      Existing User? <a href="login.html">Login Here</a>
    </div>
  </div>
  <?php
include 'db.php';

// Get the form data from the signup.html page
$username = mysqli_real_escape_string($conn, $_POST['user_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact_number = mysqli_real_escape_string($conn, $_POST['phone_no']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$re_enter_password = mysqli_real_escape_string($conn, $_POST['re_password']);

// Validate the form data
if (empty($user_name) || empty($email) || empty($contact_number) || empty($password) || empty($re_enter_password)) {
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

</body>
</html>
