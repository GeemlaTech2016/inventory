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
    $gettypes = mysqli_fetch_array(mysqli_query($conn, "select * from productcat where catid='{$_GET["id"]}'"));
}
$totqty = 0.0;
$tco2 = 0.0;
if (isset($_POST['ok']) != '') {
    $tco = $_POST["costprice"];
    $tco1 = str_replace(",", "", $tco);
    $sp = $_POST["sellprice"];
    $sp1 = str_replace(",", "", $sp);
    $vat = $_POST["vat"];
    $tci = $_POST["tci"];
    $tci1 = str_replace(",", "", $tci);
    if ($vat == "Yes") {
        $tco2 = (5 / 100) * $tco1;
    } elseif ($vat == NULL) {
        $tco2 = $tco1;
    }
    if ($_POST['id'] != '') {
        if (mysqli_query($conn, "update productcat set category='{$_POST["category"]}',prodid='{$_POST["prodid"]}',instock='{$_POST["qty"]}',cylindersize='',unit='{$_POST["unit"]}',costprice='$tco2',sellprice='$sp1',tco='$tci1',vat='$vat' where catid='{$_POST["id"]}'")) {
            $pqty = mysqli_fetch_array(mysqli_query($conn, "select totqty from products where prodid='{$_POST["prodid"]}'"));
            $totqty = $_POST["qty"] + $pqty['totqty'];
            mysqli_query($conn, "update products set totqty='$totqty' where prodid='{$_POST["prodid"]}'");
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Product Details Updated Successfully.
            </div>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
        }
    } else {//u.userid, u.password, u.fullname
        $getn = mysqli_num_rows(mysqli_query($conn, "select * from productcat"));
        $g = $getn + 1;
        $catid = "";
        if ($_POST["catid"] == "" || $_POST["catid"] == NULL)
            $catid = "PC" . $g . date('YmdHis');
        else
            $catid = $_POST["catid"];
        $prodtotqty=0; $stktotqty=0;

        if (mysqli_query($conn, "insert into productcat(catid,category,prodid,instock,cylindersize,unit,costprice,sellprice,tco,vat) values('$catid','" . strtoupper($_POST["category"]) . "','{$_POST["prodid"]}','{$_POST["qty"]}','','{$_POST["unit"]}','$tco2','$sp1','$tci1','$vat')")) {
            $pdqty = mysqli_fetch_array(mysqli_query($conn, "select totqty from products where prodid='{$_POST["prodid"]}'"));   
            $prodtotqty = $prodtotqty + $pdqty["totqty"];
            mysqli_query($conn, "update products set totqty='$prodtotqty' where prodid='{$_POST["prodid"]}'");
            
            $stkqty = mysqli_fetch_array(mysqli_query($conn, "select totqty from stock where prodid='{$_POST["prodid"]}'"));   
            $stktotqty = $stktotqty + $stkqty["totqty"];
            mysqli_query($conn, "update stock set totqty='$stktotqty' where prodid='{$_POST["prodid"]}'");
            
            $transid='Trans'.date('YmdHis');
            $tdot= date('Y-m-d H:i:s');
            mysqli_query($conn, "insert into transhistory(transid,dot,staffid,transtype,tco,receipt) values('$transid','$tdot','$user','Purchase','$tco2','')");
            
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Product Details Added Successfully.
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
if (mysqli_query($conn, "delete from productcat where catid='$del'")) {
    //header("location:customers.php");
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
        <script type="text/javascript">
            var specialKeys = new Array();

            specialKeys.push(8); //Backspace  

            function numericOnly(elementRef) {

                var keyCodeEntered = (event.which) ? event.which : (window.event.keyCode) ? window.event.keyCode : -1;

                if ((keyCodeEntered >= 48) && (keyCodeEntered <= 57)) {

                    return true;

                }

// '.' decimal point...  

                else if (keyCodeEntered == 46) {

// Allow only 1 decimal point ('.')...  

                    if ((elementRef.value) && (elementRef.value.indexOf('.') >= 0))
                        return false;

                    else
                        return true;

                }

                return false;

            }
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
                                        <h2><a href="">ADD PRODUCT CATEGORY</a></h2>	

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
                                                <div class="col-md-4 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
                                                    <h3>Add Product Details</h3><p><?php echo $msg ?></p>
                                                    <form name="form1" method="post" action="">
                                                        <div>
                                                            <span>Item Number</span>
                                                            <input type="text" name="catid" value="<?php echo $gettypes['catid'] ?>"> 
                                                        </div> 

                                                        <div>
                                                            <span>Item Name/Description</span>
                                                            <input type="text" name="category" value="<?php echo $gettypes['category'] ?>"> 
                                                        </div> 

                                                        <div>
                                                            <span>Product Line<label>*</label></span>
                                                            <select name="prodid">
                                                                <?php
                                                                $qr = mysqli_query($conn, "select * from products");
                                                                while ($gpr = mysqli_fetch_array($qr)) {
                                                                    ?>
                                                                    <option value="<?php echo $gpr['prodid'] ?>"><?php echo $gpr['prodname'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>  
                                                        </div>
                                                        <!--<div>
                                                                                                                <span>Cylinder Size</span>
                                                                                                                <input type="text" name="cylindersize" value="<?php //echo $gettypes['cylindersize']   ?>" onkeypress = "return numericOnly(this);" ondrop = "return false;" onpaste = "return false;"> 
                                                                                                        </div>-->
                                                        <div>
                                                            <span>Unit</span>
                                                            <select name="unit">
                                                                <option value="SACHET">SACHET</option>
                                                                <option value="PAPER">PAPER</option>
                                                                <option value="CNS">CONES</option>
                                                                <option value="CTN">CTN</option>
                                                                <option value="BAG">BAG</option>
                                                                <option value="NYL">NYL</option>
                                                            </select> 
                                                        </div>
                                                        <div>
                                                            <span>How Many in-Stock</span>
                                                            <input type="text" name="qty" value="<?php echo $gettypes['instock'] ?>"> 
                                                            <input type="hidden" name="id" value="<?php echo $gettypes['catid'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Total Cost of Item Purchase</span>
                                                            <input type="text" name="tci" id="tci" onKeyUp="javascript:this.value = Comma(this.value);" value="<?php echo $gettypes['tco'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Unit Cost Price</span>
                                                            <input type="text" name="costprice" id="costprice" onKeyUp="javascript:this.value = Comma(this.value);" value="<?php echo $gettypes['costprice'] ?>"> <br>
                                                            Calculate VAT <input type="checkbox" name="vat" id="vat" title="Leave Ticked if vat should be included" value="Yes" checked>             
                                                        </div>
                                                        <div>
                                                            <span>Unit Selling Price</span>
                                                            <input type="text" name="sellprice" id="sellprice" onKeyUp="javascript:this.value = Comma(this.value);" value="<?php echo $gettypes['sellprice'] ?>"> 
                                                        </div>
                                                        <!--  <div>
                                                                                                                  <span>Selling Price(Dealers)</span>
                                                                                                                  <input type="text" name="sellpricedealer" id="sellpricedealer" onKeyUp="javascript:this.value=Comma(this.value);" value="<?php //echo $gettypes['sellpricedealer']   ?>"> 
                                                                                                          </div>-->

                                                        <?php if ($gettypes != NULL) { ?>
                                                            <input type="submit" value="Update" name="ok">
                                                        <?php } else { ?>
                                                            <input type="submit" value="Add" name="ok">
                                                            <button type="reset" class="">Reset</button>
                                                        <?php } ?>
                                                    </form>

                                                </div>
                                                <div class="col-md-8 banner-left-grid fullwidth-left-grid">
                                                    <h3>Product Details</h3><p>&nbsp;</p>
                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr style="font-size:12px;">
                                                                <th>ID</th>

                                                                <th>Product</th>
                                                                <th>Quantity(Unit)</th>
                                                                <th>Cost Price(N)</th>
                                                                <th>Selling Price(N)</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $b = 0;
                                                            $q = mysqli_query($conn, "select * from productcat where catid!='PA1' order by catid");
                                                            while ($rs = mysqli_fetch_array($q)) {
                                                                $gv = mysqli_fetch_array(mysqli_query($conn, "select * from products where prodid='$rs[prodid]'"));
                                                                $b++;
                                                                ?>            
                                                                <tr class="" style="font-size:12px;">
                                                                    <td><?php echo $rs['catid'] ?></td>


                                                                    <td><?php echo $rs['category'] ?></td>
                                                                    <td><?php echo $rs['instock'] . "(" . $rs['unit'] . ")" ?></td>
                                                                    <td><?php echo number_format($rs['costprice'], 2) ?></td>
                                                                    <td><?php echo number_format($rs['sellprice'], 2) ?></td>
                                                                    <td><a href="productcat.php?id=<?php echo $rs['catid'] ?>">Edit</a>&nbsp;&nbsp;
                                                                        <a href="productcat.php?del=<?php echo $rs['catid'] ?>">Delete</a></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>        

                                                        </tbody>
                                                    </table>

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
</body>
</html>