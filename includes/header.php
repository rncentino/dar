<?php
session_start();
define("APPURL", "http://localhost/dar_dms");
?>

<?php
if (!isset($_SESSION['username'])) {
    header("location:" . APPURL . "/auth/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DAR</title>
    <link rel="stylesheet" href="./src/custom-assets/style.css" />
    <link rel="stylesheet" href="./src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./src/1.3.0/css/line-awesome.css" />
    <link rel="stylesheet" href="src/sweetalert2/dist/sweetalert2.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.css"> -->

    <link rel="icon" type="image/png" sizes="16x16" href="./src/darlogo/logo.ico" />
    <link rel="icon" type="image/png" sizes="32x32" href="./src/darlogo/logo.ico" />
    <link rel="icon" type="image/png" sizes="96x96" href="./src/darlogo/logo.ico" />
</head>