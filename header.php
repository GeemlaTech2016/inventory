<?php
$guest = "Guest";
if (isset($myRole) != NULL) {
    $guest = $myRole;
}
?>
<div id="home" class="header">
    <div class="header-top">
        <!-- container -->
        <div class="container">
            <?php include("subnav.php"); ?>
            <div class="nav-right">
                <p>Welcome, <a href="#"><?php echo $guest ?></a>
            </div>
            <div class="clearfix"> </div>
            <!-- script-for-menu -->
        </div>
        <!-- //container -->
    </div>
    <div class="container">
        <div class="header-bottom">
            <!-- container -->
            <?php
            $month = intval(date('m'));
            ?>
            <div class="head-logo">
                <a href="index.php"><img src="images/logo.jpg" class="img-responsive" alt="" /></a>
            </div>
            <div class="logo-right">
                <?php
                if ($month == '12') {
                    ?>
                    <a href="#"><img src="images/xmassanta.png" alt="" width="103" height="125" class="img-responsive" /></a>
                <?php } ?>
            </div>
            <div class="clearfix"> </div>

            <!-- //container -->
        </div>
    </div>
</div>