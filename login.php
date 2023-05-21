<?php 
session_start();
if (isset($_SESSION['username'])) {
  header("Location: home.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container">
    <h1>Login</h1>
    <form action="sign_in_user.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Log In</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
  </div>
</body>

</html>
