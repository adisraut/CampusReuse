<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                $username = $password = "";
                $usernameErr = $passwordErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["username"])) {
                        $usernameErr = "Username is required";
                    } else {
                        $username = test_input($_POST["username"]);
                    }

                    if (empty($_POST["password"])) {
                        $passwordErr = "Password is required";
                    } else {
                        $password = test_input($_POST["password"]);
                    }
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>
</body>
</html>