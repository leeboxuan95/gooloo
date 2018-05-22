<style>

    .container img{
        width: 100%;
        height: 100%;
    }

    .container {
        position: relative;
        text-align: center;
        color: white; 
        width: 100%;
        height: 200px;
    }
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .input-group .form-control {
        margin: 0px;

    }

    #wrapper{
        text-align: center;
        padding-top: 20px;
    }
    .containerform{
        display: inline-block;
    }
</style>

<nav class="navbar navbar" >
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="showRestaurants.php"><img class="navbar-brand" src="img/logo.png" style="width: 150px; height: 80px;"></a>
        </div>
        <ul class="nav navbar-nav navbar-text navbar-right" style="padding: 5px; padding-right: 20px;">
            <?php
            $url = $_SERVER["SCRIPT_NAME"];
            $break = Explode('/', $url);
            $file = $break[count($break) - 1];
            ?>

<?php if (isset($_SESSION['user_id'])) { ?>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo "<i>Welcome " . $_SESSION['full_name'] . " " . "</i><span class='caret'></span><br/>"; ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="viewProfile.php">View profile</a></li>
                        <li><a href="favoriteList.php">Favourites</a></li>
                        <li><a href="orderHistory.php">Order history</a></li>



                    </ul>
                </li>     



                <li> <a href="logout.php">Logout</a></li>
            <?php } else {
                if ($file == "register.php") { ?>
                    <li> <a href="index.php">Login</a></li>
    <?php } else if ($file == "logout.php") { ?>
                    <li> <a href="index.php">Login</a></li>
                    <li> <a href="register.php">Register</a></li>



                <?php } else {
                    ?>
                    <li><a href="register.php">Register</a></li>
    <?php }
} ?>
            <li> <a href="#">Eng </a></li>
            <li> <a href="#">中</a></li>
        </ul>

    </div>
</nav>

<!-- Breadcrumb -->
<?php if (isset($pageTitle)) { ?>
    <ul class="breadcrumb">
        <li><a href="showRestaurants.php">Home</a></li>
        <li class="active"><?php echo $pageTitle ?></li>
    </ul>
<?php } ?>

<div class="container">
    <img src="img/Banner-Desktop_2880x838_.jpg">

    <div class="centered" style="font-size: 100px">GOOLOO</div>
</div>