<?php
session_start();
include("authen.php");
include("secure.php");

$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";

$gettypes = NULL;
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $gettypes = mysqli_fetch_array(mysqli_query($conn, "select * from products where prodid='{$_GET["id"]}'"));
}

if (isset($_POST['ok']) != '') {
    $tco = $_POST["tco"];
    $tco1 = str_replace(",", "", $tco);
    if ($_POST['id'] != '') {
        if (mysqli_query($conn, "update products set prodname='{$_POST["prodname"]}',proddesc='{$_POST["description"]}',unit='{$_POST["unit"]}',tco='$tco1',asat='{$_POST["asat"]}',reorderlevel='{$_POST["reorderlevel"]}',expdate='{$_POST["expdate"]}' where prodid='{$_POST["id"]}'")) {
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Product Updated Successfully.
            </div>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
        }
    } else {//u.userid, u.password, u.fullname
        $getn = mysqli_num_rows(mysqli_query($conn, "select * from products"));
        $g = $getn + 1;
        $prodid = "P" . $g . date('YmdHis');
        $stockid = "S" . $g . date('YmdHis');
        $gett = mysqli_num_rows(mysqli_query($conn, "select * from transhistory"));
        $t = $gett + 1;
        $transid = $prodid . $t;
        $tvol1 = 0.0;
        $tvol = 0;
        $unit = $_POST['unit'];

        if (mysqli_query($conn, "insert into products(prodid,prodname,proddesc,totqty,unit,onhand,tco,asat,reorderlevel,expdate) values('$prodid','{$_POST["prodname"]}','{$_POST["description"]}','$tvol','$unit','{$_POST["qty"]}','$tco1','{$_POST["asat"]}','{$_POST["reorderlevel"]}','{$_POST["expdate"]}')")) {
            mysqli_query($conn, "insert into stock(stockid,prodid,totqty,unit,tco,dot,vendor,transid) values('$stockid','$prodid','$tvol','{$_POST["unit"]}','$tco1','{$_POST["asat"]}','{$_POST["vendor"]}','$transid')");
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Product Added Successfully.
                            		</div>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
        }
    }
}
?>
<?php
$del = isset($_GET['del']) ? $_GET['del'] : '';
if (mysqli_query($conn, "delete from products where prodid='$del'"))
//header("location:products.php");
    
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
        <script type="text/javascript">
            function Comma(Num) { //function to add commas to textboxes
                Num += '';
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                x = Num.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1))
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                return x1 + x2;
            }
        </script>
        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script>
            $(window).load(function () {
                $(".se-pre-con").fadeOut("slow");
                $("#asat").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
                $("#expdate").datepicker({
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
                                        <h2><a href="">PRODUCTS</a></h2>	

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
                                                <form name="form1" method="post" action="">
                                                    <div class="col-md-6 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
                                                        <h3>Add New Product</h3><p><?php echo $msg ?></p>

                                                        <div>
                                                            <span>Product Name</span>
                                                            <input type="text" name="prodname" required value="<?php echo $gettypes['prodname'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Description</span>
                                                            <input type="text" name="description" required value="<?php echo $gettypes['proddesc'] ?>"> 
                                                        </div>
                                                        <!--<div>
                                                            <span>Total Quantity</span>
                                                            <input type="number" name="qty" value="<?php //echo $gettypes['totqty'] ?>"> 
                                                        </div>-->
                                                        <div>
                                                            <span>Unit</span>
                                                            <select name="unit" required>
                                                                <option value="" selected>Select one</option>
                                                                <option value="SACHET">SACHET</option>
                                                                <option value="PAPER">PAPER</option>
                                                                <option value="CNS">CONES</option>
                                                                <option value="CTN">CTN</option>
                                                                <option value="BAG">BAG</option>
                                                                <option value="NYL">NYL</option>
                                                            </select> 
                                                        </div>
                                                        <div>
                                                            <span>Total Cost of Product</span>
                                                            <input type="text" name="tco" id="tco" onKeyUp="javascript:this.value = Comma(this.value);" value="<?php echo $gettypes['tco'] ?>"> 
                                                        </div>
                                                        <br>
                                                        <?php if ($gettypes != NULL) { ?>
                                                            <input type="submit" value="Update" name="ok">
<?php } else { ?>
                                                            <input type="submit" value="Register" name="ok">
                                                            <button type="reset" class="">Reset</button>
<?php } ?>


                                                    </div>
                                                    <div class="col-md-6 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s"><br>
                                                        <div>
                                                            <span>As at</span>
                                                            <input type="text" name="asat" id="asat" value="<?php echo $gettypes['asat'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Re-Order Level</span>
                                                            <input type="text" name="reorderlevel" value="<?php echo $gettypes['reorderlevel'] ?>"> 
                                                            <input type="hidden" name="id" value="<?php echo $gettypes['prodid'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Vendor</span>
                                                            <select name="vendor">
                                                                <?php
                                                                $q = mysqli_query($conn, "select * from vendors");
                                                                while ($gb = mysqli_fetch_array($q)) {
                                                                    ?>
                                                                    <option value="<?php echo $gb['vendid'] ?>"><?php echo $gb['vendname'] ?></option>
    <?php
}
?>
                                                            </select> 
                                                        </div>
                                                        <div>
                                                            <span>Receipt No<label>*</label></span>
                                                            <input type="text" name="receipt" required >
                                                        </div>
                                                        <div>
                                                            <span>Expiry Date</span>
                                                            <input type="text" name="expdate" id="expdate" value="<?php echo $gettypes['expdate'] ?>"> 
                                                        </div>

                                                    </div>
                                                </form>
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
</body>
</html>