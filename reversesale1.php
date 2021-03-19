<?php
session_start();
include("authen.php");
include("secure.php");

$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";
$saleid = $_GET['saleid'];

$d = date("Y-m-d H:i:s");
$dtt = date("YmdHis");
$gettypes = NULL;
$gettypes = mysqli_fetch_array(mysqli_query($conn, "select * from sales where saleid='$saleid'"));

$c = 1;
$q = mysqli_fetch_array(mysqli_query($conn, "select * from productcat where catid='$gettypes[prodid]'"));
$p = mysqli_fetch_array(mysqli_query($conn, "select * from products where prodid='$q[prodid]'"));
?>
<?php
$totprice = 0.0;
if (array_key_exists("ok", $_POST)) {
    $sid = $_POST["saleid"];
    $pid = $_POST["prodid"];
    $retqty = $_POST["qty"];

    $getsale = mysqli_fetch_array(mysqli_query($conn, "select * from sales where saleid='$sid' "));
    $gettransid = mysqli_fetch_array(mysqli_query($conn, "select transid from sales where saleid='$sid'"));

    $soldprd = $getsale["prodid"];
    $soldqty = $getsale["qty"];
    $soldprice = $getsale["unitprice"];
    $solddate = $getsale["dot"];
    $custid = $getsale["custid"];

    $getp = mysqli_fetch_array(mysqli_query($conn, "select * from productcat where catid='$soldprd' "));
    $getpr = mysqli_fetch_array(mysqli_query($conn, "select * from products where prodid='$getp[prodid]' "));

    $remqty = $getp["instock"] + $retqty;
    $totremqty = $getpr["totqty"] + $retqty;

    $actualsale = $soldqty - $retqty;
    $totprice = $actualsale * $getp["sellprice"];

    mysqli_query($conn, "update productcat set instock='$remqty' where catid='$soldprd'");
    mysqli_query($conn, "update products set totqty='$totremqty' where prodid='$soldprd'");
    mysqli_query($conn, "update sales set qty='$actualsale',totalprice='$totprice' where saleid='$sid'");
    mysqli_query($conn, "update transhistory set tco='$totprice' where transid='gettransid[transid]'");
    if ($_POST["act"] == "Returned") {
        mysqli_query($conn, "insert into returnedgoods(saleid,qty,dot,custid) values('$getsale[saleid]','$retqty','$solddate','$custid')");
    }

    $getsale2 = mysqli_fetch_array(mysqli_query($conn, "select * from sales where saleid='$getsale[saleid]' "));
    if ($actualsale == 0) {
        mysqli_query($conn, "update sales set status = 'inactive' where saleid='$sid'");
    }
    if ($_POST["act"] == "Returned") {
        header("location:reversesale.php");
    } else {
        header("location:view_cart2.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Duplex Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstarp-css -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstarp-css -->
        <!-- css -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--// css -->
        <script src="js/jquery.min.js"></script>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--/fonts-->
        <!-- dropdown -->
        <script src="js/jquery.easydropdown.js"></script>
        <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="js/scripts.js" type="text/javascript"></script>
        <!--js-->
        <!--/js-->
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>	
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- slider -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    manualControls: '#slider3-pager',
                });
            });
        </script>
        <!-- slider -->
        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script>
            $(window).load(function () {
                $(".se-pre-con").fadeOut("slow");
                $("#hiredate1").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
                $("#tdate").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });

            });
        </script>
        <style type="text/css">
            select{
                border: 1px solid #136ad5;
                outline-color:#136ad5;
                width: 96%;
                font-size:0.8125em;
                padding: 0.7em;
            }
            input[type="number"]{
                border: 1px solid #136ad5;
                outline-color:#136ad5;
                width: 96%;
                font-size:0.8125em;
                padding: 0.7em;
            }
        </style>
    </head>
    <body>
        <?php include("header.php"); ?>
        <!-- //header -->	
        <!-- bg-banner -->
        <div class="container">
            <div class="bg-banner">
                <div class="banner-bottom-bg">
                    <div class="banner-bg"> 

                        <!-- banner -->
                        <div class="banner">
                            <div class="banner-grids">
                                <?php include("nav.php"); ?>

                                <div class="ban-top">

                                    <div class="col-md-12 bann-right">
                                        <h2><a href="">MAKE CHANGES TO THIS SALE</a></h2>	

                                    </div>
                                    <div class="clearfix"> </div>

                                </div>

                                <div class="banner-middle">
                                    <div class="strip"> </div>

                                    <!-- banner-bottom-grids -->
                                    <div class="banner-bottom-grids">
                                        <!-- banner-bottom-left -->
                                        <div class="banner-bottom-left">

                                            <div class="banner-bottom-left-grids">
                                                <div class="col-md-8 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
                                                    <h3>Enter details of sale</h3><p><?php echo $msg ?></p>
                                                    <form name="form1" method="post" action="">
                                                        <div>
                                                            <span>Item Name</span>
                                                            <input type="text" name="prodname" id="prodname" value="<?php echo $p['prodname'] . " " . $q['category'] ?>" readonly>
                                                            <input type="hidden" name="saleid" id="saleid" value="<?php echo $saleid ?>" >
                                                            <input type="hidden" name="prodid" id="prodid" value="<?php echo $gettypes['prodid'] ?>" >
                                                        </div>
                                                        <div>
                                                            <span>What are you doing?</span>
                                                            Returning <input type="radio" name="act" id="act" value="Returned" required> 
                                                            Reversing <input type="radio" name="act" id="act" value="Reversed" required> 
                                                        </div>

                                                        <div>
                                                            <span>Quantity </span>
                                                            <input type="number" name="qty" id="qty" value="<?php echo $gettypes['qty'] ?>" > 
                                                        </div>


                                                        <input type="submit" value="Proceed" name="ok">

                                                        <button type="reset" class="">Reset</button>

                                                    </form>


                                                </div>
                                                <div class="col-md-4 banner-left-grid fullwidth-left-grid">
                                                    <p>&nbsp;</p>


                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <!-- post -->

                                        <!-- //post -->
                                    </div>
                                    <!-- //banner-bottom-left -->

                                </div>
                                <!-- //banner-bottom-grids -->
                            </div>
                        </div>
                    </div>
                    <!-- //banner -->
                </div>
            </div>
        </div>
        <div class="up-arrow">
            <div class="up-arrow-left">
                <ul>
                    <li><a href="#">&nbsp;</a></li> //

                </ul>
            </div>
            <div class="up-arrow-right">
                <a class="scroll" href="#home">Back to Top</a>
            </div>
            <div class="clearfix"> </div>
        </div>	
        <!-- //bg-banner -->
        <?php include("footer.php") ?>
    </div>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
            $(document).ready(function () {

                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
    </script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0/jquery-ui.min.css">
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript">
            function calculate() {
                //count = document.getElementById('count').value;
                var unitprice = document.getElementById('unitprice').value;
                var qty = document.getElementById('qty').value;

                var result = parseInt(unitprice) * parseInt(qty);

                var tot = document.getElementById('total');

                tot.value = result;
            }
    </script>
</body>
</html>