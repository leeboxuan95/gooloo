<?php
session_start();
$pageTitle = "View profile";

include "dbFunctions.php";
if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
    $id = $_SESSION['user_id'];
    $profileRetrieve = "SELECT * FROM customer WHERE id = $id";
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
            <title>Gooloo - View profile</title>
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
                        <div class="panel-heading">Register</div>


                        <div class="panel-body"> 

                            <form class="form-horizontal" role="form" method="post" action="editProfile.php">

                                <div class="form-group">
                                    <label for="lastName" class="col-sm-4" control-label>Last Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $lastName ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstName" class="col-sm-4" control-label>First Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $firstName ?>" disabled>                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mobile" class="col-sm-4" control-label>Mobile number: </label>
                                    <div class="col-sm-8">
                                        <input  class= "form-control" type="number" name="mobile" id="mobile" value="<?php echo $mobile ?>" disabled>                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-4" control-label>Email add: </label>
                                    <div class="col-sm-8">
                                        <input class= "form-control" type="email" name="email" id="email" value="<?php echo$email ?>"disabled>                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="dob" class="col-sm-4" control-label>DOB: </label>
                                    <div class="col-sm-8">

                                        <input class="form-control" type="number" name="date" id="date" placeholder="DD"  value="<?php echo $date ?>" disabled>
                                        <input class="form-control" type="number" name="month" id="month" placeholder="MM" value="<?php echo $month ?>" disabled> 
                                        <input class="form-control" type="number" name="year" id="year" placeholder="YYYY" value="<?php echo$year ?>" disabled>               		</div>
                                </div>

                                <div class="form-group">
                                    <label for="company_name" class="col-sm-4" control-label>Company Name:</label>
                                    <div class="col-sm-8">

                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" value="<?php echo $companyName ?>"disabled>           		</div>
                                </div>
                                <div class="form-group">
                                    <label for="country" class="col-sm-4" control-label>Country:</label>
                                    <div class="col-sm-8">

                                        <input type="text" name="country" id="country" placeholder="Country" class="form-control" value="<?php echo $country ?>"disabled> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="postal" class="col-sm-4" control-label>Postal code:</label>
                                    <div class="col-sm-8">

                                        <input type="text" name="postal" id="postal" placeholder="postal" class="form-control" value="<?php echo $postal ?>"disabled> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-sm-4" control-label>Address:</label>
                                    <div class="col-sm-8">

                                        <textarea name="address" id="address" placeholder="Address" class="form-control" disabled><?php echo $address ?></textarea>                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <input class="btn btn-success  btn-lg btn-block" type="submit" value="Edit Your Profile">

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
