<?php
session_start();
include 'dbFunctions.php';
if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
    $id = $_SESSION['user_id'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dob = $date . "/" . $month . "/" . $year;
    $country = $_POST['country'];
$companyName = $_POST['company_name'];
$address = $_POST['address'];
$postal = $_POST['postal'];


    $updateAddress = "UPDATE customer_address SET last_name='$lastName',first_name='$firstName',mobile='$mobile',company_name = '$companyName',address='$address',postcode = '$postal',city_name ='$country' WHERE customer_id = $id";
    $results = mysqli_query($link, $updateAddress);
    $toUpdateQuery = "UPDATE customer SET last_name='$lastName',first_name='$firstName',mobile='$mobile',dob='$dob' WHERE id = $id";
    $result = mysqli_query($link, $toUpdateQuery);
    if ($result) {
        header('location: viewProfile.php');
        } else {
        echo "Unable to update, <a href='editProfile.php'>try again</a>";
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
<?php } ?>