<?php
session_start();
$pageTitle = "Login";

if (isset($_SESSION['user_id'])) {
        echo "You have already logged in.<a href='showRestaurants.php'> Home</a>";

} else {
    

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Gooloo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/facebookLogin.js" type="text/javascript"></script>
      

    </head>
    <body> 
        <?php include 'header.php'; ?>
      

        <div id="wrapper">
            <div class="containerform">
                <div class="panel panel-info" style="width: 350px;">
                    <div class="panel-heading">Login</div>


                    <div class="panel-body"> 

                        <form method="post" action="doLogin.php" class="form-horizontal">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                                <input id="idusername" type="text" class="form-control" name="username" placeholder="username">
                            </div>

                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <br>


                            <button type="submit" class="btn btn-success  btn-lg btn-block">Log In</button>
                        </form><br/>
                        <span>OR</span><br/>
                        <p></p>
                        <div id="fb-root"></div>
                <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                    </div>
                    <a href="register.php">Register</a> |
                    <a href="resetPassword.php">Forgot password?</a> 
                    
                </div>
            </div>
        </div>
                        <?php include 'footer.php'?>

    </body>

</html>
<?php } ?>