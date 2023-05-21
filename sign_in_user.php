<?php
session_start();

require_once('connection.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare the query
  $query = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($password == $row['password']) {
      // Password is correct, create a session
      $_SESSION['username'] = $username;
      header("Location: home.php");
      exit();
    } else {
      // Password is incorrect
      $error_message = "Invalid password";
      echo $error_message;
      echo $password;
      
    }
  } else {
    // User does not exist
    $error_message = "User not found";
    echo $error_message;
    header("Location: login.php");
  }


$conn->close();
?>
