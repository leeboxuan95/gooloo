<?php
session_start();
include "dbFunctions.php";

if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
    $queryRestaurants = "SELECT * FROM merchant_profile";
    $resultRestaurants = mysqli_query($link, $queryRestaurants) or die(mysqli_error($link));
    $restaurants = mysqli_num_rows($resultRestaurants);
    while ($rowRestaurants = mysqli_fetch_array($resultRestaurants)) {
        $arrDetails[] = $rowRestaurants;
    }
    ?>
    <!DOCTYPE html>
    <!—
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    —>


    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


            <style>
                @font-face {
                    font-family: custom;
                    src: url("fonts/CaviarDreams.ttf");
                }

                #newcontainer{
                    font-family: custom;
                    font-size: 25px;
                }
            </style>

        </head>
        <body>
            <?php include 'header.php' ?>
        <div id="newcontainer">       

            <p>All The Delicious Food Near You</p>
        </div>   <table class="table box-table">
                <thead>
                    <tr>
                        <th>Restaurants</th>               
                        <th>Cost Range</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                for ($i = 0; $i < count($arrDetails); $i++) {
                    $merchantId = $arrDetails[$i]['id'];
                    $merchantName = $arrDetails[$i]['name'];
                    $logo = $arrDetails[$i]['logo'];
                    $queryCompare = "SELECT * FROM merchant_profile mp, items "
                            . "WHERE mp.id = items.m_id AND mp.id = $merchantId";
                    $resultCompare = mysqli_query($link, $queryCompare) or die(mysqli_error($link));
                    $compare = mysqli_num_rows($resultCompare);
                    while ($rowCompare = mysqli_fetch_array($resultCompare)) {
                        $arrCompare[] = $rowCompare['price'];
                    }
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                echo "$merchantName <br/>";
                                ?>                 
                                <?php echo "<img src='ItemsImages/$logo' alt='$logo' height='150px' width='150px'/>"; ?>
                            </td>
                            <td>
                                <?php
                                $minCost = min($arrCompare);
                                $maxCost = max($arrCompare);
                                echo "$minCost ~ $maxCost";
                                ?>
                            </td>
                            <td>

                                <button type="button" class="btn btn-primary">
                                    <a href="viewItems.php?id=<?php echo $merchantId; ?>" style="color: white">Check this out!</a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php include "footer.php" ?>

            <?php
// put your code here
            ?>
        </body>
    </html>
    <?php
}?>