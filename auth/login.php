<?php

session_start();
require("../config/config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST[$username];
    $password = $_POST[$password];

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
    mysqli_close($conn);
} 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAR Login</title>
    <link rel="stylesheet" href="../src/custom-assets/style.css" />
    <link rel="stylesheet" href="../src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../src/1.3.0/css/line-awesome.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="../src/darlogo/logo.ico" />
    <link rel="icon" type="image/png" sizes="32x32" href="../src/darlogo/logo.ico" />
    <link rel="icon" type="image/png" sizes="96x96" href="../src/darlogo/logo.ico" />
    <style>
        .login-form {
            max-width: 400px;
            margin-top: 50px;
            padding: 30px;
            background: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .showpass-btn {
            background-color: white;
            border: 1px solid #CED4DA;
            box-shadow: none !important;
        }

        .showpass-btn:hover {
            border: 1px solid #74a66f;
            outline: 1px solid #74a66f !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <form role="form" action="login.php" method="post" class="login-form">
                <h2 class="text-center mb-4">
                    <img src="../src/darlogo/DAR Login logo.png" alt="DAR LOGO">
                </h2>
                <div class="mb-1">
                    <label for="username" class="form-label">
                        <h6>Username</h6>
                    </label>
                    <input type="text" class="form-control custom-outline" id="username" name="username">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">
                        <h6>Password</h6>
                    </label>
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="form-control custom-outline" />
                        <button id="showPasswordBtn" class="btn showpass-btn" type="button">Show</button>
                    </div>
                </div>
                <div class="mb-3">
                    <button name="submit" type="submit" class="btn custom-btn" style="width: 100%;">LOGIN</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const showPassBtn = document.getElementById('showPasswordBtn');
        const passInput = document.getElementById('password');

        function displayPass() {
            if (passInput.type === "password") {
                passInput.type = "text";
                this.textContent = "Hide";
            } else {
                passInput.type = "password";
                this.textContent = "Show";
            }
        }

        showPassBtn.addEventListener('click', displayPass);
    </script>
</body>

</html>