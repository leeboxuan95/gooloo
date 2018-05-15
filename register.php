<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. Go to home";
    echo "<a href=''>Home</a>";
} else {
    
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
                height: 200px;
            }

            .container {
                position: relative;
                text-align: center;
                color: white; 
                width: 100%;
                height: 250px;
            }
            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
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
        <?php include 'header.php'; ?>
        <div class="container">
            <img src="img/Banner-Desktop_2880x838_.jpg">

            <div class="centered">GOOLOO</div>
        </div>
   

        <div id="wrapper">
            <div class="containerform">
                <div class="panel panel-info" style="width: 350px;">
                    <div class="panel-heading">Register</div>


                    <div class="panel-body"> 

                        <form class="form-horizontal" role="form" method="post" action="index.php">
                            <div class="form-group">
                                <label for="lastName" class="col-sm-4" control-label>Last Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="last_name" name="lastName" placeholder="Last Name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstName" class="col-sm-4" control-label>First Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="first_name" name="firstName" placeholder="First Name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-4" control-label>Gender</label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>  		</div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-4" control-label>DOB: </label>
                                <div class="col-sm-8">

                                    <input  class="form-control" type="number" name="date" id="date" placeholder="DD">
                                    <input  class="form-control" type="number" name="month" id="month" placeholder="MM">
                                    <input  class="form-control" type="number" name="year" id="year" placeholder="YYYY">                     		</div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-success  btn-lg btn-block">Register</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
                <?php include 'footer.php'?>

    </body>
</html>
