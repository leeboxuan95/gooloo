<?php 
session_start();
if (isset($_SESSION['user_id'])){
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
}else{
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>Gooloo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <style>

            .container img{
                width: 100%;
                height: 100%;
            }

            .container {
                position: relative;
                text-align: center;
                color: white; 
                width: 100%;
                height: 200px;
            }
            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .input-group .form-control {
                margin: 0px;

            }

            #wrapper{
                text-align: center;
                padding-top: 20px;
            }
            .containerform{
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <?php include "header.php" ?>
      <div class="container">
            <img src="img/Banner-Desktop_2880x838_.jpg">

            <div class="centered">GOOLOO</div>
        </div>

        <div id="wrapper">
            <div class="containerform">
                <div class="panel panel-info" style="width: 350px;">
                    <div class="panel-heading">Forget password</div>


                    <div class="panel-body"> 

                        <form method="post" action="doResetPassword.php" class="form-horizontal">
<!--                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>-->

                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  type="email" class="form-control" name="userEmail" placeholder="Email">
                            </div>
                            <br>


                            <button type="submit" class="btn btn-success  btn-lg btn-block">Log In</button>
                        </form><br/>
                       
                    </div>
                    <a href="index.php">Login</a> |
                    <a href="register.php">Register</a> 

                </div>
            </div>
        </div>
                        <?php include 'footer.php'?>

    </body>
</html>
<?php } ?>
