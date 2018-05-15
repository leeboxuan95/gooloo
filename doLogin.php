<?php
session_start();
include 'dbFunctions.php';
$msg = "";

if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        //retrieve form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        //match the username and password entered with database record
        $loginQuery = "SELECT * FROM customer WHERE password = '$password' AND(email = '$username' OR mobile = '$username')";
        $result = mysqli_query($link, $loginQuery) or die(mysqli_error($link));

        //if record is found, store id and username into session
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['id'];
           header("showRestaurant.php");
        } else {
            $msg = "Sorry, you must enter a valid username 
                    and password to log in.<br/><a href='login.php'>Back</a>";
            echo $msg;
        }
    }
} else {
    echo $msg = "You are are already logged in.";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

    </body>
</html>