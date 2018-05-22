<?php
session_start();
include "dbFunctions.php";

if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
} else {
    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $password = $_POST['password'];
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

        </head>
        <body>
            <?php include 'header.php'; ?>
   
            <div id="wrapper">
                <div class="containerform">
                    <div class="panel panel-info" style="width: 350px;">
                        <div class="panel-heading">Register</div>


                        <div class="panel-body"> 
                            <form class="form-horizontal" role="form" action="doRegister.php" method="POST">
                                <!--POST data from first form-->
                                <input type="hidden" name="last_name" value="<?php echo $lastName ?>" >
                                <input type="hidden" name="first_name" value="<?php echo $firstName ?>" >
                                <input type="hidden" name="gender" value="<?php echo $gender ?>" >
                                <input type="hidden" name="mobile" value="<?php echo $mobile ?>" >
                                <input type="hidden" name="email" value="<?php echo $email ?>" >
                                <input type="hidden" name="date" value="<?php echo $date ?>" >
                                <input type="hidden" name="month" value="<?php echo $month ?>" >
                                <input type="hidden" name="year" value="<?php echo $year ?>" >
                                <input type="hidden" name="password"  value="<?php echo $password ?>" >
                                <!-- POST end -->

                                <div class="form-group">
                                    <label for="postal" class="col-sm-4" control-label> Postal Code: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="postal" name="postal" placeholder="Postal Code" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="country" class="col-sm-4" control-label> Country : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-sm-4" control-label> Address : </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="address" name="address" placeholder="Address" cols="50" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_name" class="col-sm-4" control-label> Company Name : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success  btn-lg btn-block">Next</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php' ?>

        </body>
    </html>
<?php }
?>