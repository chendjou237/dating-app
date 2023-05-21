<?php
session_start();

require_once('connection.php');

  $username = $_POST['username'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $dateOfBirth = $_POST['date_of_birth'];
  $favoriteColor = $_POST['favorite_color'];
  $country = $_POST['country'];
  $height = $_POST['height'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];

  // Hash the password for security
  $hashedPassword = $password;

  // Prepare the query to insert user data into the table
  $query = "INSERT INTO users (username, gender, age, date_of_birth, favorite_color, country, height, salary, email, mobile, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssisssissss", $username, $gender, $age, $dateOfBirth, $favoriteColor, $country, $height, $salary, $email, $mobile, $hashedPassword);
  $stmt->execute();

  // Check if the user was successfully inserted into the table
  if ($stmt->affected_rows === 1) {
    // User was added successfully, start a session and redirect to the home page
    $_SESSION['username'] = $username;
    header("Location: home.php");
    exit();
  } else {
    // Error occurred while adding the user
    $error_message = "Error occurred while signing up. Please try again.";
    echo $stmt->error;
  }


$conn->close();
?>
