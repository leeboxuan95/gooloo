<?php
session_start();
include "dbFunctions.php";

if (!isset($_SESSION['user_id'])) {

    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $password = $_POST['password'];
    $dob = $date + "/" + $month + "/" + $year;
    $registerQuery = "INSERT INTO customer (last_name,first_name,gender,avatar,mobile,email,dob,cuisine,otp,otp_expired_time,offline_operator,create_time,update_time,password,status) "
            . "VALUES ('$lastName','$firstName','$gender',null,'$mobile','$email','$dob',null,null,null,null,null,null,'$password',null)";
    $query = mysqli_query($link, $registerQuery)or die(mysqli_error($link));
    echo $registerQuery;
    $status = "";
    if ($query) {
        $status .= "You have registered successfully <br/>";
        $status .= "<a href='login.php'>Login Now</a>";
    } else {
        $status .= "Registration failed. <br/>";
        $status .= "<a href='register.php'>Try Again.</a>";
    }
    ?>
    <!DOCTYPE html>
    <!—
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    —>
    <html>
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

        </head>
        <body>
            <?php
            echo $status;
            ?>

        </body>
    </html>
    <?php
} else {
    echo "You are already logged in. Go to home<br/>";
    echo "<a href=''>Home</a>";
}
?>