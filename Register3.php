<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="headerstyle.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
    <div id="header">
        <div id="left-header">
            <h1>CampusReuse</h1>
        </div>
        <div id="right-header">
            <nav>
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="Categories.html">Categories</a></li>
                    <li><a href="Login.html">Login</a></li>
                    <li><a href="Register1.html">Register</a></li>
                    <li><a href="AboutUs.html">About Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>

    <div class="textbox">

        <div style="height: 350px; width: 300px; float: left;">
            <img src="Earth.png" width="300px" height="350px">
        </div>

        <div style="height: 350px; width: 300px; margin-left: 300px;">
            <h3>Welcome!<br>Please create your <b>CampusReuse</b> account</h3>
            <?php
                $username = $password = "";
                $usernameErr = $passwordErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["username"])) {
                        $usernameErr = "*Username is required";
                    } else {
                        $username = test_input($_POST["username"]);
                        // check if username contains only letters and numbers
                        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
                            $usernameErr = "*Username should not contain sp. chars";
                        }
                    }

                    if (empty($_POST["password"])) {
                        $passwordErr = "*Password is required";
                    } else {
                        $password = test_input($_POST["password"]);
                        // check if password has at least 8 characters
                        if (strlen($password) < 8) {
                            $passwordErr = "*Password should be at least 8 characters";
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

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <p>Username:</p>
                <input type="text" name="username" placeholder="Username">
                <span class="error"><br><?php echo $usernameErr;?></span>
                <br>
                <p>Password:</p>
                <input type="password" name="password" placeholder="Password">
                <span class="error"><br><?php echo $passwordErr;?></span>
                <br>
                <button type="submit" name="Submit" style="color:black; text-decoration: none;">Submit</button>
                <br>
            </form>
            <a href="Login.html" style="color: black;">Already a user? Login</a>
            <br>
        </div>
    </div>

</body>
</html>
