<?php
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    $msg = '<p>You have logged out :( <br /><a href="index.php">Login</a></p>';
} else {
    $msg = "You have not logged in :( <br/><a href='index.php'>Login Here</a>";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>

    </head>
    <body>
        <?php include 'header.php';?>
         <div id="wrapper">
            <div class="containerform">
                <div class="panel panel-info" style="width: 350px;">
                    <div class="panel-heading">Logout</div>


                    <div class="panel-body"> 

                     <?php echo $msg ?><br/>
                       
                    
                </div>
            </div>
        </div>
        <?php include 'footer.php'?>
    </body>
</html>