<?php
session_start();
$pageTitle = "Edit profile";
include "dbFunctions.php";
if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
    $id = $_SESSION['user_id'];
    $profileRetrieve = "SELECT * FROM customer c ,customer_address ca WHERE c.id = $id AND ca.customer_id = c.id";
    $result = mysqli_query($link, $profileRetrieve) or die(mysqli_error($link));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $dob = $row['dob'];
        $postal = $row['postcode'];
        $country = $row['city_name'];
        $address = $row['address'];
        $companyName = $row['company_name'];
        $dateArray = explode("/", $dob);
        $date = $dateArray[0];
        $month = $dateArray[1];
        $year = $dateArray[2];
    } else {
        $msg = "Error retrieving data";
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
            <title>Gooloo - Edit Profile</title>
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
            <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        </head>
        <body>



            <?php include 'header.php' ?>
            <div id="wrapper">
                <div class="containerform">
                    <div class="panel panel-info" style="width: 550px;">
                        <div class="panel-heading">Edit profile</div>


                        <div class="panel-body"> 

                            <form class="form-horizontal" role="form" method="post" action="doEditProfile.php">

                                <div class="form-group">
                                    <label for="lastName" class="col-sm-4" control-label>Last Name: </label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $lastName ?>" >              
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstName" class="col-sm-4" control-label>First Name: </label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="firstName" id="firstName" value="<?php echo $firstName ?>" >  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mobile" class="col-sm-4" control-label>Mobile number: </label>
                                    <div class="col-sm-8">
                                        <input class = "form-control"  type="number" name="mobile" id="mobile" value="<?php echo $mobile ?>" > 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-4" control-label>Email add: </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo$email ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dob" class="col-sm-4" control-label>DOB: </label>
                                    <div class="col-sm-8">

                                        <input class="form-control" type="number" name="date" id="date" placeholder="DD"  value="<?php echo $date ?>" >
                                        <input   class="form-control" type="number" name="month" id="month" placeholder="MM" value="<?php echo $month ?>"  >
                                        <input   class="form-control" type="number" name="year" id="year" placeholder="YYYY" value="<?php echo$year ?>" >
                                    </div>
                                </div>

                    
                                <div class="form-group">
                                    <label for="company_name" class="col-sm-4" control-label>Company Name:</label>
                                    <div class="col-sm-8">

                                        <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $companyName ?>"> 
                                    </div>
                                </div>
                                        
                                        
                                        <div class="form-group">
                                        <label for="country" class="col-sm-4" control-label>Country:</label>
                                        <div class="col-sm-8">

                                            <input class="form-control" type="text" name="country" id="country" placeholder="Country" value="<?php echo $country ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="postal" class="col-sm-4" control-label>Postal code:</label>
                                        <div class="col-sm-8">

                                            <input class="form-control" type="text" name="postal" id="postal" placeholder="Postal Code" value="<?php echo $postal ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="col-sm-4" control-label>Address:</label>
                                        <div class="col-sm-8">

                                            <textarea class="form-control" name="address" id="address" placeholder="Address" ><?php echo $address ?></textarea> 
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <input class="btn btn-success  btn-lg btn-block" type="submit" value="Update">

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
                }
                ?>
