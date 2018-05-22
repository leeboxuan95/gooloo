<?php
session_start();
$pageTitle = "Register";

if (isset($_SESSION['user_id'])) {
    echo "You are already logged in. <a href='showRestaurants.php'>home</a><br/>";
} else {
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

                            <form class="form-horizontal" role="form" method="post" action="addAddress.php">
                                <div class="form-group">
                                    <label for="lastName" class="col-sm-4" control-label>Last Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstName" class="col-sm-4" control-label>First Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-4" control-label>Mobile number: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile number" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-4" control-label>Email add: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="">
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
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
<?php
}?>