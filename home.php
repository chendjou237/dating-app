
<?php
session_start(); // Start the session

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
<link rel="stylesheet" href="home.css">
</head>
<body>
<body>
    <h2>User Dashboard</h2>
    <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
</form> 
    <?php require_once('get_all_users.php'); ?>

    <?php if (!empty($users)) { ?>
        <table>
            <tr>
                <?php foreach ($users[0] as $column => $value) { ?>
                    <th><?php echo $column; ?></th>
                <?php } ?>
            </tr>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <?php foreach ($user as $value) { ?>
                        <td><?php echo $value; ?></td>
                    <?php } ?>
                    <td class="action-buttons">
                        <button onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
                        <button onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php } ?>
         
        </table>
    <?php } else { ?>
        <p>No users found.</p>
    <?php } ?>

    <div id="editModal" class="edit-modal">
        <div class="edit-modal-content">
            <h3>Edit User</h3>
            <!-- Add your edit user form here -->
        </div>
    </div>
    <script>
         function deleteUser(userId) {
            // Redirect to the edit user page with the user ID
            window.location.href = 'delete_user.php?id=' + userId;
        }
        function editUser(userId){
            window.location.href = 'edit_user.php?id=' + userId;
        }
    </script>
</body>
</html>
