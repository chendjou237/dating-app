<?php
require_once('connection.php'); // Include the database connection file

// Check if the user ID is provided in the POST request
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare the delete query
    $query = "DELETE FROM users WHERE id=?";

    // Prepare and bind the parameter
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);

    // Execute the delete query
    if ($stmt->execute()) {
        // Send a response indicating successful deletion
        http_response_code(200);
    } else {
        // Send a response indicating unsuccessful deletion
        http_response_code(500);
    }
    
    // Close the statement
    $stmt->close();
} else {
    // Send a response indicating unsuccessful deletion
    http_response_code(400);
}
// Close the connection
$conn->close();

header("Location: home.php");