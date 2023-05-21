<?php
require_once('connection.php'); // Include the database connection file

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Get the user data from the database
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Perform necessary validation and sanitization of the input data

        // Get the updated user data from the form fields
        $username = $_POST['username'] == null ? $user['username'] : $_POST['username'];
        $gender = $_POST['gender'] ==  null ?  $user['gender'] : $_POST['gender'];
        $age = $_POST['age'] ==  null ?  $user['age'] : $_POST['age'];
        $date_of_birth = $_POST['date_of_birth'] ==  null ?  $user['date_of_birth'] : $_POST['date_of_birth'];
        $favorite_color = $_POST['favorite_color'] ==  null ?  $user['favorite_color'] : $_POST['favorite_color'];
        $country = $_POST['country'] ==  null ?  $user['country'] : $_POST['country'];
        $height = $_POST['height'] ==  null ?  $user['height'] : $_POST['height'];
        $salary = $_POST['salary'] ==  null ?  $user['salary'] : $_POST['salary'];
        $email = $_POST['email'] ==  null ?  $user['email'] : $_POST['email'];
        $mobile = $_POST['mobile'] ==  null ?  $user['mobile'] : $_POST['mobile'];
        $password = $_POST['password'] ==  null ?  $user['password'] : $_POST['password'];

        // Prepare the update query
        $query = "UPDATE users SET username = ?, gender = ?, age = ?, date_of_birth = ?, favorite_color = ?, country = ?, height = ?, salary = ?, email = ?, mobile = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
echo  "$date_of_birth  date";
        // Update the user data only if the field is not empty or different from the existing value
        $stmt->bind_param('ssisssissssi', 
        $username ,
        $gender,
        $age,
        $date_of_birth,
        $favorite_color,
        $country,
        $height,
        $salary,
        $email,
        $mobile,
        $password,
        $userId
        );
        
        // Execute the update query
        if ($stmt->execute()) {
            // Redirect to the user dashboard after successful update
            header('Location: home.php');
            exit();
        } else {
            // Handle the case when the update fails
            echo "Error updating user: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
        header("Location: home.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit User</h2>

    <?php if (isset($user)) { ?>
        <form action="" method="POST">
    <h1>Dating application form</h1>
    <fieldset class="box">
        <legend>Your Face<i class="em em-wink "></i></legend>
        <label for="file-ip-1">Your Image</label>
        <input type="file" onchange="loadPic(event)"  id="file-ip-1" /> <br>
        <span onmousemove="show()" onmouseout="unshow()">Image preview: </span> 
        <img src="" id="myImage"> 
        </fieldset>
<fieldset>
    <legend>Your General Details</legend>
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="username" placeholder="Your full name" class="input"></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender"> male
            <input type="radio" name="gender"> female
            <input type="radio" name="gender"> other
        </td>
    </tr>
    <tr>
        <td>Age</td>
        <td><input type="number" name="age"></td>
    </tr>
    <tr>
        <td>Date of birth</td>
        <td><input type="date" name="date_of_birth" placeholder="Date of Birth" class="input"></td>
    </tr>
    <tr>
        <td>Favorite color</td>
        <td><input type="color" name="favorite_color"></td>
    </tr>
    <tr>
        <td>Country</td>
        <td><select name="country" id="country">
            <option value="none"></option>
            <option value="Cameroon">Cameroon</option>
        </select>
        </td>
    </tr>
</table>
</fieldset>
<fieldset>
    <legend>Your Indicator</legend>
<table>
    <tr>
        <td>Height</td>
        <td>
            <div class="low">short</div>
        </td>
        <td>
            <input type="range" min="0" max="100" id="height" name = "height">
        </td>
        <td>
            <div class="high">Tall</div>
        </td>
    </tr>
    <tr>
        <td>Salary</td>
        <td>
            <div class="low">poor</div>
        </td>
        <td>
            <input type="range" min="0" max="100" id="height" name = "salary">
        </td>
        <td>
            <div class="high">Rich</div>
        </td>
    </tr>
</table>
</fieldset>
<fieldset>
    <legend>Your Contact Information</legend>
<table>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email" class="input"></td>
    </tr>
    <tr>
        <td>Mobile:</td>
        <td><input type="tel" name="mobile" class="input"></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><input type="text" class="input"></td>
    </tr>
    <tr>
        <td>Method of contact</td>
        <td><input type="radio" name="gender"> Email
            <input type="radio" name="gender"> Whatsapp
            <input type="radio" name="gender"> in-app chat
        </td>
    </tr>

</table>
</fieldset>
<label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

<input type="Submit" value="Submit">
</form>
    <?php } else { ?>
        <p>No user ID specified.</p>
    <?php } ?>
</body>
</html>
