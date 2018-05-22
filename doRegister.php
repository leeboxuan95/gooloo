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
    $dob = $date . "/" . $month . "/" . $year;
     $postal = $_POST['postal'];
    $country =$_POST['country'];
    $address = $_POST['address'];
    $companyName = $_POST['company_name'];

    $accountCheckQuery = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($link, $accountCheckQuery);
    if (mysqli_num_rows($result) == 1) {
        echo "Email has been used, please use a new email. <a href='register.php'>Sign up Again.</a>";
    } else {



        $registerQuery = "INSERT INTO customer (last_name,first_name,gender,avatar,mobile,email,dob,cuisine,otp,otp_expired_time,offline_operator,create_time,update_time,password,status) "
                . "VALUES ('$lastName','$firstName','$gender',null,'$mobile','$email','$dob',null,null,null,null,NOW(),null,'$password',null)";

        $query = mysqli_query($link, $registerQuery)or die(mysqli_error($link));
//    echo $registerQuery;
        $getNewID = "SELECT * FROM customer where email = '$email'";
        $idQuery = mysqli_query($link, $getNewID);
        if (mysqli_num_rows($idQuery)==1){
            $row = mysqli_fetch_array($idQuery);
        $id = $row['id'];
            $addAddressQuery = "INSERT INTO customer_address(customer_id,country_id,city_name,postcode,address,create_time,company_name,first_name,last_name,mobile)"
                . "VALUES ($id,'','$country','$postal','$address',NOW(),'$companyName','$firstName','$lastName','$mobile')";
            $addressQuery = mysqli_query($link, $addAddressQuery);
           
        }else{
            
        }
        $status = "";
        if ($query) {
            $status .= "You have registered successfully <br/>";
            $status .= "<a href='index.php'>Login Now</a>";
        } else {
            $status .= "Sign up fail..  <br/>";
            $status .= "<a href='register.php'>Try Again.</a>";
        }
        echo $status;
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
            ?>

        </body>
    </html>
    <?php
} else {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
}
?>