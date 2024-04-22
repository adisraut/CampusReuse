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
                $email = $contact_no = "";
                $emailErr = $contact_noErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["email"])) {
                        $emailErr = "*Email is required";
                    } else {
                        $email = test_input($_POST["email"]);
                        // check if email is valid
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "*Invalid email format";
                        }
                    }

                    if (empty($_POST["contact_no"])) {
                        $contact_noErr = "*Phone Number is required";
                    } else {
                        $contact_no = test_input($_POST["contact_no"]);
                        // check if phone number has exactly 10 digits
                        if (!preg_match("/^\d{10}$/",$contact_no)) {
                            $contact_noErr = "*Phone should have 10 digits";
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
                <p>Email:</p>
                <input type="text" name="email" placeholder="Email">
                <span class="error"><br><?php echo $emailErr;?></span>
                <br>
                <p>Phone Number:</p>
                <input type="text" name="contact_no" placeholder="Contact No">
                <span class="error"><br><?php echo $contact_noErr;?></span>
                <br>
                <button type="submit" name="Submit" style="color:black; text-decoration: none;">Next</button>
                <br>
            </form>
            <a href="Login.html" style="color: black;"><a href="Register3.php" style="color: black;">Next</a></a>
        </div>
    </div>

</body>
</html>
