<?php
session_start();
$pageTitle = "Select restaurant";
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


    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link href="css/theme.ice.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.widgets.js" type="text/javascript"></script>

      <script>

            $(document).ready(function () {
                $("#tableitems").tablesorter();
                $("#tableitems").tablesorter({sortList: [[1, 0], [3, 0]]});
                $(".container").hide();


            });

        </script>

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
        </div>  
                    <div id="tablediv1">
  <table class="tablesorter-ice" id="tableitems" style="width:95%; margin-left:20px; 
    margin-right:20px;">    
      <thead>
                    <tr style="background-color: lightgray;">
                        <th>Restaurants</th>               
                        <th>Cost Range</th>
                        <th data-sorter="false" data-filter="false"></th>
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
                        <td style="text-align:center">
                            <?php echo "<img src='ItemsImages/$logo' alt='$logo'/>"; ?>
 <?php
                                echo "$merchantName";
                                ?>                 
                            </td>
                        <td style='padding-top: 45px; text-align:center'>
                                <?php
                                $minCost = min($arrCompare);
                                $maxCost = max($arrCompare);
                                echo "$minCost ~ $maxCost";
                                ?>
                            </td>
                        <td  style='padding-top: 40px; text-align:center'>

                                <button type="button" class="btn btn-primary">
                                    <a href="viewItems.php?id=<?php echo $merchantId; ?>" style="color: white">Check this out!</a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                    </div>
            <?php include "footer.php" ?>

            <?php
// put your code here
            ?>
        </body>
    </html>
    <?php
}?>