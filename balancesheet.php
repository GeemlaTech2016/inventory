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
                                        <h2><a href="">BALANCE SHEET</a></h2>	

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
                                                    <h3>Balance Sheet </h3><p>&nbsp;</p>
                                                    <form name="form1" method="post" action="">
                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr style="font-size:12px">

                                                                    <th>Start Date</th>
                                                                    <th><input type="text" name="sdate" id="sdate" autocomplete="off" ></th>
                                                                    <th>End Date</th>
                                                                    <th><input type="text" name="enddate" id="enddate" autocomplete="off"></th>
                                                                    <th><input type="submit" name="find" id="find" value="Search" ></th>
                                                                </tr>
                                                            </thead>
                                                        </table>		
                                                    </form>
                                                    <?php
                                                    if (array_key_exists("find", $_POST)) {
                                                        ?>
                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                            <tr>
                                                                <td valign="top">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                                        <thead>
                                                                            <tr style="font-size:12px">
                                                                                <th colspan="3">Current Assets from <?php echo date_format(date_create($_POST['sdate']), "d M Y") . " to " . date_format(date_create($_POST['enddate']), "d M Y") ?></th>
                                                                            </tr>
                                                                            <tr style="font-size:12px">
                                                                                <th>#</th>
                                                                                <th>Type</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            //Cash calculation
                                                                            $get_cash = mysqli_query($conn, "select * from sales where transtype='Cash' and dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59'");
                                                                            $cash_amt = 0.0;
                                                                            while ($cash = mysqli_fetch_array($get_cash)) {
                                                                                $cash_amt += $cash['totalprice'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>1</td>
                                                                                <td>Cash:</td>
                                                                                <td><?php echo number_format($cash_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //Bank Calculation
                                                                            $get_bank = mysqli_query($conn, "select * from sales where transtype!='Cash' and transtype!='Credit' and dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59'");
                                                                            $bank_amt = 0.0;
                                                                            while ($bank = mysqli_fetch_array($get_bank)) {
                                                                                $bank_amt += $bank['totalprice'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>2</td>
                                                                                <td>Bank:</td>
                                                                                <td><?php echo number_format($bank_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //Account recievable calculation
                                                                            $get_acct_rec = mysqli_query($conn, "select * from debtors where dstatus='pending' and dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59'");
                                                                            $acct_rec_amt = 0.0;
                                                                            while ($acct_rec = mysqli_fetch_array($get_acct_rec)) {
                                                                                $acct_rec_amt += $acct_rec['amtbal'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>3</td>
                                                                                <td>Account Receivable:</td>
                                                                                <td><?php echo number_format($acct_rec_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //Inventroy calculation\
                                                                            $get_inventory = mysqli_query($conn, "select * from productcat");
                                                                            $inventory_amt = 0.0;
                                                                            while ($inventory = mysqli_fetch_array($get_inventory)) {
                                                                                $inv_sub_amt = $inventory['instock'] * $inventory['sellprice'];
                                                                                $inventory_amt += $inv_sub_amt;
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>4</td>
                                                                                <td>Inventory:</td>
                                                                                <td><?php echo number_format($inventory_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            $tca = $cash_amt + $bank_amt + $acct_rec_amt + $inventory_amt
                                                                            ?>
                                                                            <tr class="" style="font-size:12px; font-weight:bold">
                                                                                <td></td>
                                                                                <td> Total Current Assets:</td>
                                                                                <td><?php echo number_format($tca, 2); ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                                        <thead>
                                                                            <tr style="font-size:12px">
                                                                                <th colspan="3">Current Liabilities from <?php echo date_format(date_create($_POST['sdate']), "d M Y") . " to " . date_format(date_create($_POST['enddate']), "d M Y") ?></th>
                                                                            </tr>
                                                                            <tr style="font-size:12px">
                                                                                <th>#</th>
                                                                                <th>Type</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            //Account payable calculation
                                                                            $get_acct_pay = mysqli_query($conn, "select * from creditor where term='Short' and dstatus='pending' and dot>='$_POST[sdate]' and dot<='$_POST[enddate]'");
                                                                            $acct_pay_amt = 0.0;
                                                                            while ($acct_pay = mysqli_fetch_array($get_acct_pay)) {
                                                                                $acct_pay_amt += $acct_pay['amtbal'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>1</td>
                                                                                <td>Account Payable:</td>
                                                                                <td><?php echo number_format($acct_pay_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //Accrue expenses calculation
                                                                            $get_accrued_exp = mysqli_query($conn, "select * from expenses where dot>='$_POST[sdate]' and dot<='$_POST[enddate]'");
                                                                            $accrued_exp_amt = 0.0;
                                                                            while ($accrued_exp = mysqli_fetch_array($get_accrued_exp)) {
                                                                                $accrued_exp_amt += $accrued_exp['amt'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>2</td>
                                                                                <td>Accrued Expenses:</td>
                                                                                <td><?php echo number_format($accrued_exp_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //Long term dept calculation
                                                                            $get_lt_dept = mysqli_query($conn, "select * from creditor where term='Long' and dot>='$_POST[sdate]' and dot<='$_POST[enddate]'");
                                                                            $lt_dept_amt = 0.0;
                                                                            while ($lt_dept = mysqli_fetch_array($get_lt_dept)) {
                                                                                $lt_dept_amt += $lt_dept['amtbal'];
                                                                            }
                                                                            ?>
                                                                            <tr class="" style="font-size:12px;">
                                                                                <td>3</td>
                                                                                <td>Long Term Debt:</td>
                                                                                <td><?php echo number_format($lt_dept_amt, 2); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            $tcl = $acct_pay_amt + $accrued_exp_amt + $lt_dept_amt;
                                                                            ?>
                                                                            <tr class="" style="font-size:12px; font-weight:bold">
                                                                                <td></td>
                                                                                <td> Total Current Liabilities:</td>
                                                                                <td><?php echo number_format($tcl, 2); ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><a style="color:#F00" href="javascript:printtab();">Print</a></td>
                                                            </tr>
                                                        </table>

                                                    <?php } ?>

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