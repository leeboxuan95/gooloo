<?php
session_start();
include "dbFunctions.php";
if (!isset($_SESSION['user_id'])) {
    echo "You have no access to the page.<a href='index.php'> Please Login</a>";
} else {
$pageTitle = "Choose Item";
$merchantId = $_GET['id'];
$queryItems = "SELECT * FROM items WHERE m_id = $merchantId";
$resultItems = mysqli_query($link, $queryItems) or die(mysqli_error($link));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Items</title>
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
                text-align: center;
            }
          
             
        </style>

    </head>
    <body>
        <?php include "header.php"; ?>
        <div id="newcontainer">       
            <p>Choose food from  <?php
                $queryMName = "SELECT * FROM merchant_profile WHERE id = $merchantId";
                $result1 = mysqli_query($link, $queryMName) or die(mysqli_error($link));
                $row = mysqli_fetch_array($result1);
                $name = $row['name'];
                $image = $row['logo'];
                echo $name;
                ?><img src="ItemsImages/<?php echo $image; ?>" width="200px" height="120px"/></p>
           </div>
        <div id="tablediv1">
        <table class="tablesorter-ice" id="tableitems" style="width:95%; margin-left:20px; 
    margin-right:20px;">
            <thead>
                <tr style="background-color: lightgray;">                  

                    <th  data-sorter="false" data-filter="false" id="items">Items</th>

                    <th id="category">Category</th>
                    <th id="price">Price<span class=""></span></th>             
                    <th  data-sorter="false" data-filter="false"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rowItems = mysqli_fetch_array($resultItems)) {
                    $arrItems[] = $rowItems;
                }
                for ($i = 0; $i < count($arrItems); $i++) {
                    $name = $arrItems[$i]['name'];
                    $img = $arrItems[$i]['image'];
                    $category = $arrItems[$i]['category_name'];
                    $description = $arrItems[$i]['description'];
                    $stock = $arrItems[$i]['stock'];
                    $price = $arrItems[$i]['price'];
                    $chineseName = $arrItems[$i]['cn_name'];
                    ?>
                    <tr>

                        <td style="text-align:center">
                            <p> <?php echo "<img src='ItemsImages/$img'/>"; ?><br/></p>
                            <p style="font-size: 12px;"><?php echo $name; ?></p>
                        </td> 

                        <td style='padding-top: 45px; text-align:center'>
    <?php echo $category; ?>
                        </td>



                        <td style='padding-top: 45px; text-align:center'>
    <?php echo $price; ?>
                        </td>
                        <td  style='padding-top: 40px; text-align:center'>

                            <button type="button" class="btn btn-primary" >
                                <a href="addToCart.php" style="color: white">Add to cart</a>
                            </button>
                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
        </div>
<?php include "footer.php" ?>

    </body>
</html>
<?php }?>