<?php
session_start();
$pageTitle = "Favourite list";
include 'dbFunctions.php';
if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
    $id = $_SESSION['user_id'];
    $favList = "SELECT * FROM customer_fav cf , customer c , merchant_profile mp, items i "
            . "WHERE cf.customer_id = c.id AND cf.m_id = mp.id AND cf.item_id = i.id"
            . " AND cf.customer_id = $id";
    $result = mysqli_query($link, $favList);
    while ($rowFavorites = mysqli_fetch_array($result)) {
        $arrDetails[] = $rowFavorites;
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
            <div>Your Favorite Items</div>
        </div>
            <table class="tablesorter-ice" id="tableitems">
                <thead>
                    <tr style="background-color: lightgray;">                  
                        <th>Restaurants</th>               
                        <th>Items</th>
                        <th data-sorter="false" data-filter="false"></th>
                        <th data-sorter="false" data-filter="false">Remove From Favorite</th>
</tr>
                </thead>
                <?php
if (!isset($arrDetails)){
                   ?><td>No items yet</td>
                       <?php
               }else{ for ($i = 0; $i < count($arrDetails); $i++) {
                    $merchantId = $arrDetails[$i]['id'];
                    $merchantName = $arrDetails[$i][24];
                    $logo = $arrDetails[$i]['logo'];
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                echo "$merchantName <br/>";
                                ?>                 
                                <?php echo "<img src='ItemsImages/$logo' alt='$logo'/>"; ?>
                            </td>
                            <td style='padding-top: 45px;'>
                                <?php
                                echo $arrDetails[$i]['name'];
                                ?>
                            </td>
                            <td style='padding-top: 45px;'>

                                <button type="button" class="btn btn-primary">
                                    <a href="addToCart.php" style="color: white">Add to cart</a>
                                </button>
                            </td>
                            
                                <td>
                                <a href="addToFavorite.php?from=list&m_id=<?php echo $merchantId ?>&item_id=<?php echo $arrDetails[$i]['item_id'] ?>&liked=<?php echo $arrDetails[$i][0] ?>" >Remove from favorite</a>
                            </td>
                        </tr>
               <?php }} ?>
                </tbody>
            </table>

                   <?php include "footer.php" ?>

        </body>
    </html>
<?php }
?>