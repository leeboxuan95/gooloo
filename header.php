<nav class="navbar navbar">
    <div class="container-fluid">
        <div class="navbar-header">
        <img class="navbar-brand" src="img/logo.png" style="width: 150px; height: 80px;">
        </div>
        <ul class="nav navbar-nav navbar-text navbar-right" style="padding: 5px; padding-right: 20px;">
             <?php $url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];?>
                    
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li> <a href="logout.php">Logout</a></li>
                    <?php } else { if($file == "register.php"){?>
                        <li> <a href="login.php">Login</a></li>
                   <?php }else{
?>
                        <li><a href="register.php">Register</a></li>
                    <?php }} ?>
                        <li> <a href="#">Eng</a>  </li>
                        <li> <a href="#">Zhong</a></li>
                </ul>
<!--                <p class="navbar-text navbar-right">
                    <?php/*
                    if (isset($_SESSION['user_id'])) {
                        echo "<i>Welcome " . $_SESSION['full_name'] . " (" . $_SESSION['role'] . ")</i><br/>";
                    }
                    */?>
                </p>-->
            </div>
        </nav>

        <!-- Breadcrumb -->
        <?php if (isset($pageTitle)) { ?>
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active"><?php echo $pageTitle ?></li>
            </ul>
        <?php } ?>

