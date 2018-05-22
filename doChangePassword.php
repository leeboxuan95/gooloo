<?php
session_start();
include 'dbFunctions.php';
if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
} else {
    $newPassword = $_POST['newPassword'];
    $otp = $_POST['otp'];
    $toUpdateQuery = "UPDATE customer SET password='$newPassword' , otp = '' WHERE otp = '$otp'";
    $result = mysqli_query($link, $toUpdateQuery);
    if (mysqli_affected_rows($link) == 1) {
        echo "Password changed. <a href='index.php'>Login </a>";
    } else {
        echo "Invalid OTP, <a href='changePassword.php'>try again</a>";
    }
    ?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <?php
            // put your code here
            ?>
        </body>
    </html>
    <?php
}?>