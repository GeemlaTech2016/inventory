<?php
session_start();
include("authen.php");
include("secure.php");

$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";
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
                $("#sdate").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
                $("#enddate").datepicker({
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
                                        <h2><a href="">GOODS RETURNED REPORT</a></h2>	

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
                                                <div class="col-md-12 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
                                                    <h3>&nbsp;</h3><p>&nbsp;</p>
                                                    <form name="form1" method="post" action="">
                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr style="font-size:14px">
                                                                    <th>Dealer</th>
                                                                    <th><select name="dealer" required>
                                                                            <option value="">select one</option>
                                                                            <?php
                                                                            $gcus = mysqli_query($conn, "select * from customers");
                                                                            while ($rgcus = mysqli_fetch_array($gcus)) {
                                                                                ?>
                                                                                <option value="<?php echo $rgcus['custid'] ?>"><?php echo $rgcus['custname'] ?></option>
<?php } ?>
                                                                        </select></th>
                                                                    <th>Start Date</th>
                                                                    <th><input type="text" name="sdate" id="sdate" autocomplete="off"></th>
                                                                    <th>End Date</th>
                                                                    <th><input type="text" name="enddate" id="enddate" autocomplete="off"></th>
                                                                    <th><input type="submit" name="find" id="find" value="Search" ></th>
                                                                </tr>
                                                            </thead>
                                                        </table>		
                                                    </form>
                                                    <?php
                                                    $up = 0.0;
                                                    $tp = 0.0;
                                                    $totcy = 0.0;
                                                    $q11 = 0.0;
                                                    if (array_key_exists("find", $_POST)) {
                                                        $b = 0;
                                                        $q = mysqli_query($conn, "select * from returnedgoods where dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59' and custid = '$_POST[dealer]' order by dot asc");
                                                        $cus = mysqli_fetch_array(mysqli_query($conn, "select * from customers where custid='$_POST[dealer]'"));
                                                        ?>
                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                            <thead>
                                                                <tr style="font-size:13px;">
                                                                    <th colspan="8" style="text-align:center;">Goods Report for <?php echo $cus['custname'] ?> from <?php echo $_POST['sdate'] ?> to <?php echo $_POST['enddate'] ?></th>
                                                                </tr>
                                                                <tr style="font-size:13px">
                                                                    <th>Date</th>
                                                                    <th>Item ID</th>
                                                                    <th>Product</th>
                                                                    <th>Unit Price(N)</th>
                                                                    <th>Qty Taken</th>
                                                                    <th>Qty Returned</th>
                                                                    <th>Sales Rep</th>
                                                                    <th>Total(N)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $totprice = 0.0;
                                                                $nq = 0.0;
                                                                $atq = 0.0;
                                                                $actprice = 0.0;
                                                                $atp = 0.0;
                                                                $bal = 0.0;
                                                                while ($rs1 = mysqli_fetch_array($q)) {
                                                                    $rs = mysqli_fetch_array(mysqli_query($conn, "select * from sales where saleid='$rs1[saleid]'"));
                                                                    $b++;
                                                                    $rs2 = mysqli_fetch_array(mysqli_query($conn, "select * from customers where custid='$rs[custid]'"));
                                                                    $gp = mysqli_fetch_array(mysqli_query($conn, "select prodid,category from productcat where catid='$rs[prodid]'"));
                                                                    $gp1 = mysqli_fetch_array(mysqli_query($conn, "select prodname from products where prodid='$gp[prodid]'"));

                                                                    $nq = $rs['qty'] + $rs1['qty'];
                                                                    $atq = $atq + $nq;
                                                                    $totprice = $rs1['qty'] * $rs['unitprice'];
                                                                    $actprice = $atq * $rs['unitprice'];
                                                                    $up = $up + $rs['unitprice'];
                                                                    $tp = $tp + $totprice;
                                                                    $atp = $atp + $actprice;
                                                                    $q11 = $q11 + $rs1['qty'];
                                                                    $bal = $atp - $tp;
                                                                    //$totcy= $totcy + $gp['cylindersize'];
                                                                    ?>            
                                                                    <tr class="" style="font-size:13px;">
                                                                        <td><?php echo $rs['dot'] ?></td>
                                                                        <td><?php echo $rs['prodid'] ?></td>
                                                                        <td><?php echo $gp1['prodname'] . ", " . $gp['category'] ?></td>
                                                                        <td><?php echo number_format($rs['unitprice'], 2) ?></td>
                                                                        <td><?php echo $nq ?></td>
                                                                        <td><?php echo $rs1['qty'] ?></td>
                                                                        <td><?php echo $rs2['custname'] ?></td>
                                                                        <td><?php echo number_format($totprice, 2) ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $totprice = 0.0;
                                                                    $actprice = 0.0;
                                                                }
                                                                if ($b > 0) {
                                                                    
                                                                } else {
                                                                    ?>        
                                                                    <tr class="" style="font-size:10px;">

                                                                        <td colspan="7">No Record(s) Found!</td>

                                                                    </tr>  
        <?php
    }
    ?>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td><a style="color:#F00" href="javascript:printtab();">Print</a></td>
                                                                    <td><?php //echo $totcy." KG" ?></td>
                                                                    <td>Totals:</td>
                                                                    <td><?php echo number_format($up, 2) ?></td>
                                                                    <td><?php echo $atq ?></td>
                                                                    <td><?php echo $q11 ?></td>
                                                                    <td>Original:<br>Returns:<br>Balance:</td>
                                                                    <td align="right"><?php echo number_format($atp, 2) ?><br><?php echo number_format($tp, 2) ?><br><?php echo number_format($bal, 2) ?></td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="8">&nbsp;</td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="8"><hr></td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="8">&nbsp;</td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="4">Cahier<br>Sign</td>
                                                                    <td colspan="4">Supervisor<br>Sign</td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="8">&nbsp;</td>
                                                                </tr>
                                                                <tr class="" style="font-size:13px; font-weight:bold">
                                                                    <td colspan="8" style="text-align:center">Managing Director<br>Sign</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
    <?php
    $atp = 0.0;
    $tp = 0.0;
}
?>    
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
            function printtab() {
                var tab = document.getElementById('dataTables-example1');
                newwin = window.open("");
                newwin.document.write(tab.outerHTML);
                newwin.print();
                newwin.close();
            }
    </script>
</body>
</html>