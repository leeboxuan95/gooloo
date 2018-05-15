<?php
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    $msg = '<p>You have logged out.<br /><a href="">Login</a></p>';
} else {
    $msg = "You have not logged in.<br/><a href='login.php'>Login Here</a>";
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
        <?php
        echo $msg;
        ?>
    </body>
</html>