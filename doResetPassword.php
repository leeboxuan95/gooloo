<?php
$userName = $_POST['username'];
include "dbFunctions.php";
$userEmail = $_POST['userEmail'];

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

$toUpdateQuery = "UPDATE users SET password=SHA1('$pass') WHERE username = '$userName' AND email = '$userEmail'";
$result = mysqli_query($link, $toUpdateQuery);

$message = "Your new password is : " . $pass;
$subject = "Reset password";
$recipient = $userEmail;
$status = "";
$headers = "From: 16022671@myrp.edu.sg";
$emailSent = mail($recipient, $subject, $message, $headers);
if ($emailSent) {
    $status .= "The email has been sent.<br/>";
    $status .= " ";
} else {
    $status .= "Process failed. Please try again.";
    $status .= " ";
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
        echo $status;
        ?><a href="index.php">Login Now</a>
    </body>
</html>
