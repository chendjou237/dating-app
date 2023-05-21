<?php
// Include the database connection code (assuming you have already established the connection)
require_once('connection.php');

// Fetch all users from the database
$query = "SELECT * FROM users";
$result = $conn->query($query);

// Check if any users are found
if ($result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = array(); // Empty array if no users found
}

// Close the database connection
$conn->close();
?>
