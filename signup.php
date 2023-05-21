
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
    <link rel="stylesheet" href="signup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dating application</title>
</head>
<body>
    <form action="sign_up_user.php" method="POST">
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
<script src="scriptstyle.js"> </script> 

</body>
</html>

