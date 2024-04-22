<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $phoneErr = $emailErr = $usernameErr = $passwordErr = "";
$name = $phone = $email = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name length is greater than 6 characters
    if (strlen($name) < 6) {
      $nameErr = "Name must be at least 6 characters long";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if phone number is exactly 10 digits long
    if (!preg_match("/^\d{10}$/", $phone)) {
      $phoneErr = "Phone number must be 10 digits long";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if username contains only letters, numbers, and underscores
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
      $usernameErr = "Username can only contain letters, numbers, and underscores";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password length is greater than 6 characters
    if (strlen($password) < 6) {
      $passwordErr = "Password must be at least 6 characters long";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone">
  <span class="error">* <?php echo $phoneErr;?></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Username: <input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
echo $username;
echo "<br>";
echo $password;
?>

</body>
</html>
