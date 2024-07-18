<?php
session_start();
define("APPURL", "http://localhost/dar_dms");
?>

<?php
if (isset($_SESSION['username'])) {
    header("location:" . APPURL . "");
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

    <?php require "../config/config.php"; ?>
    <?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) or (empty($_POST['password']))) {
            $error = "One or more inputs are empty!";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $conn->query("SELECT * FROM users WHERE username ='$username'");
            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);
            if ($login->rowCount() > 0) {
                if (password_verify($password, $fetch['password'])) {
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['user_id'] = $fetch['user_id'];
                    $_SESSION['email'] = $fetch['email'];

                    header("location: " . APPURL . "");
                } else {
                    $error = "Username or password incorrect!";
                }
            } else {
                $error = "Username or password incorrect!";
            }
        }
    }

    ?>


    <div class="container">
        <div class="row justify-content-center">
            <form role="form" action="login.php" method="post" class="login-form">
                <h2 class="text-center mb-4">
                    <img src="../src/darlogo/DAR Login logo.png" alt="DAR LOGO">
                </h2>

                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
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