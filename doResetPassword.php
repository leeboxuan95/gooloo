<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
} else {

    function createRandomPassword() {
        $chars = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        $i = 0;
        $pass = '';

        while ($i <= 8) {
            $num = mt_rand(0, 61);
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }

    $pass = createRandomPassword();
    $userEmail = $_POST['userEmail'];
    include "dbFunctions.php";

    $accountCheckQuery = "SELECT * FROM customer WHERE email = '$userEmail'";
    $setOTPToUser = "UPDATE customer SET otp='$pass' WHERE email = '$userEmail'";



    $result = mysqli_query($link, $accountCheckQuery);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $setOTP = mysqli_query($link, $setOTPToUser);
        if ($setOTP) {
            echo "OTP updated";
        } else {
            echo "Fail to add OTP";
        }
        $message = "You have requested to reset your password! Your OTP is $pass";
        $message .= "Change your password @ https://gooloofood.000webhostapp.com/changePassword.php";
        $subject = "Reset password";
        $recipient = $userEmail;
        $status = "";
        $headers = "From: 16022671@myrp.edu.sg";
        $emailSent = mail($recipient, $subject, $message, $headers);
        if ($emailSent) {
            $status .= "The email has been sent.<br/>";
            $status .= "Change your password <a href='changePassword.php'>here</a>";
        } else {
            $status .= "Process failed. Please try again.";
            $status .= " ";
        }
        echo $status;
    } else {
        $msg = "Sorry, you must enter a valid username 
                    and password to log in.<br/><a href='index.php'>Back</a>";
        echo $msg;
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
        </body>
    </html>
    <?php
}?>