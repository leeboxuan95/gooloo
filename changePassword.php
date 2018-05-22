<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
     
} else {?>
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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include 'header.php';
        include 'footer.php';
        ?>
        <form action='doChangePassword.php' method='post'>
        <label for="otp">Enter OTP : </label><br/> <input type="text" name="otp" id="otp"><br/>
        <label for="newPassword">Enter New Password : </label><br/> <input type="password" name="newPassword" id="newPassword">
        <br/>
        <input type='submit' value='Change Password'>
        </form>
    </body>
</html>
<?php }?>