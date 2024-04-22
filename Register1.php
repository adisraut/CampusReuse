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
                $first_name = $last_name = "";
                $first_nameErr = $last_nameErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["first_name"])) {
                        $first_nameErr = "*First Name is required";
                    } else {
                        $first_name = test_input($_POST["first_name"]);
                        // check if name only contains letters and is longer than 6 characters
                        if (!preg_match("/^[a-zA-Z]{6,}$/",$first_name)) {
                            $first_nameErr = "*First Name is less than 6 letters";
                        }
                    }

                    if (empty($_POST["last_name"])) {
                        $last_nameErr = "*Last Name is required";
                    } else {
                        $last_name = test_input($_POST["last_name"]);
                        // check if name only contains letters and is longer than 6 characters
                        if (!preg_match("/^[a-zA-Z]{6,}$/",$last_name)) {
                            $last_nameErr = "*Last Name is less than 6 letters";
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
                <p>First Name:</p>
                <input type="text" name="first_name" placeholder="First Name">
                <span class="error"><br><?php echo $first_nameErr;?></span>
                <br>
                <p>Last Name:</p>
                <input type="text" name="last_name" placeholder="Last Name">
                <span class="error"><br><?php echo $last_nameErr;?></span>
                <br>
                <button type="submit" name="Submit" style="color:black; text-decoration: none;"><a href="Register2.php" style="color: black;">Next</a></button>
                <br>
            </form>
            <a href="Login.html" style="color: black;">Already a user? Login</a>
            <br>
        </div>
    </div>

</body>
</html>
