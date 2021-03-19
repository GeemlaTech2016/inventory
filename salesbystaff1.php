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
        <script type="text/javascript" src="tableExport.js"></script>
        <script type="text/javascript" src="jquery.base64.js"></script>
        <script type="text/javascript" src="html2canvas.js"></script>
        <script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="jspdf/jspdf.js"></script>
        <script type="text/javascript" src="jspdf/libs/base64.js"></script>
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
                                        <h2><a href="">STAFF SALES SUMMARY</a></h2>	

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

                                                    <form name="form1" method="post" action="">
                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr style="font-size:11px">
                                                                    <th>Staff</th>
                                                                    <th><select name="dealer" required>
                                                                            <option value="">select one</option>
                                                                            <?php
                                                                            $gcus = mysqli_query($conn, "select * from employees");
                                                                            while ($rgcus = mysqli_fetch_array($gcus)) {
                                                                                ?>
                                                                                <option value="<?php echo $rgcus['empid'] ?>"><?php echo $rgcus['empname'] ?></option>
<?php } ?>
                                                                        </select></th>
                                                                    <th>Start Date</th>
                                                                    <th><input type="text" name="sdate" id="sdate" autocomplete="off"></th>
                                                                    <th>End Date</th>
                                                                    <th><input type="text" name="enddate" id="enddate" autocomplete="off"></th>
                                                                    <th><input type="submit" name="find" id="find" value="Search" ></th>
                                                                    <th valign="baseline">

                                                            <li><a href="#" onclick="$('#dataTables-example1').tableExport({type: 'excel', escape: 'false'});"> <img src="images/xls.png" width="10" height="16"> Export XLS</a></li>

                                                            </th>
                                                            </tr>
                                                            </thead>
                                                        </table>		
                                                    </form>
                                                    <?php
                                                    $up = 0.0;
                                                    $tp = 0.0;
                                                    $dd = 0;
                                                    $bal = 0.0;
                                                    $instock = 0.0;
                                                    if (array_key_exists("find", $_POST)) {
                                                        $b = 0;
                                                        //$q = mysqli_query("select prodid, dot, custid, sum(qty) as 'totq', sum(totalprice) as 'totp', staffid
                                                        //from sales where (dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59')
                                                        //and staffid = '$_POST[dealer]' and status='active' group by prodid,custid,staffid order by prodid asc;");
                                                        $qp = mysqli_query($conn, "select * from assignproduct where empid='$_POST[dealer]'");

                                                        // $q = mysqli_query("select prodid, dot, custid, qty as 'totq', totalprice as 'totp', staffid
                                                        //from sales where (dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59')
                                                        //and staffid = '$_POST[dealer]' and status='active' order by dot asc;");
                                                        //$q = mysqli_query("select * from sales where dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59' and (custid = '$_POST[dealer]') order by dot asc;");

                                                        $now = strtotime($_POST['enddate']); // or your date as well
                                                        $your_date = strtotime($_POST['sdate']);
                                                        $datediff = $now - $your_date;

                                                        $dd = floor($datediff / (60 * 60 * 24));
                                                        $cname = mysqli_fetch_array(mysqli_query($conn, "select * from employees where empid='$_POST[dealer]'"));
                                                        ?>
                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                            <thead>
                                                                <tr style="font-size:12px;">
                                                                    <th colspan="7" style="text-align:center;">
    <?php echo $cname['empname'] ?> Sale Report from <?php echo date_format(date_create($_POST['sdate']), "d/m/Y") ?> to <?php echo date_format(date_create($_POST['enddate']), "d/m/Y") ?></th>
                                                                </tr>
                                                                <tr style="font-size:13px">
                                                                    <th>Date</th>
                                                                    <th>Product</th>
                                                                    <th>Stock</th>
                                                                    <th>Qty</th>
                                                                    <th>Balance</th>
                                                                    <th>Total(N)</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $tq = 0;
                                                                $totq = 0;
                                                                while ($rs = mysqli_fetch_array($qp)) {
                                                                    $qrr = mysqli_query($conn, "select prodid, dot, sum(qty) as 'totq', sum(totalprice) as 'totp', staffid
  from sales where (dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59')
  and prodid='$rs[product]' and staffid = '$rs[empid]' and status='active' group by prodid order by prodid asc;");
                                                                    //$totq= $qrr['totq']; 

                                                                    $q = mysqli_query($conn, "select prodid, unitprice,dot, custid, qty as 'totq', totalprice as 'totp', staffid
  from sales where (dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59')
  and prodid='$rs[product]' and staffid = '$rs[empid]' and status='active' order by dot asc;");

                                                                    /* 	$q1 = mysqli_query("select prodid, qty as 'totq1'
                                                                      from sales where prodid='$rs[prodid]' and (dot>='$_POST[sdate] 00:00:00' and dot<='$_POST[enddate] 23:59:59')
                                                                      and staffid = '$_POST[dealer]' and status='active'");
                                                                      while($rq1=mysqli_fetch_array($q1)){
                                                                      $tq = $tq + $rq1['totq1'];
                                                                      } */
                                                                    while ($rq1 = mysqli_fetch_array($qrr)) {
                                                                        $b++;
                                                                        $gp = mysqli_fetch_array(mysqli_query($conn, "select prodid,category,instock from productcat where catid='$rq1[prodid]'"));
                                                                        $gp1 = mysqli_fetch_array(mysqli_query($conn, "select prodname from products where prodid='$gp[prodid]'"));
                                                                        //$gc = mysqli_fetch_array(mysqli_query("select custid,custname from customers where custid='$rq1[custid]'"));
                                                                        //$up = $up + $rs['unitprice'];
                                                                        $tp = $tp + $rq1['totp'];
                                                                        $tq = $tq + $rq1['totq'];
                                                                        $instock = $gp['instock'];
                                                                        $bal1 = $instock + $totq;
                                                                        $bal = $instock + $tq; //echo $tq;
                                                                        $balq = $bal1 - $tq;
                                                                        $bb = $rq1['totq'] + $balq;
                                                                        ?>            
                                                                        <tr class="" style="font-size:12px;">
                                                                            <td><?php echo $rq1['dot'] ?></td>
                                                                            <td><?php echo $gp1['prodname'] . " " . $gp['category'] ?></td>
                                                                            <!--<td><?php //echo $bal1 ?></td>-->
                                                                            <td><?php echo $bal; ?></td>
                                                                            <td><?php echo $rq1['totq'] ?></td>
                                                                            <td><?php echo $bb ?></td>
                                                                            <td><?php echo number_format($rq1['totp'], 2) ?></td>
                                                                            <td><?php //echo $gc['custname'] ?></td>
                                                                        </tr>

            <?php
            //$tq=0;
            //$bal=0.0; $instock=0.0;
        }$tq = 0;
        ?>
                                                                    <tr class="" style="font-size:12px; font-weight:bold">
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td> </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
        <?php
    }
    ?>
                                                                <tr class="" style="font-size:12px; font-weight:bold">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>Totals:</td>
                                                                    <td></td>
                                                                    <td>Expected Amount:</td>
                                                                    <td><?php echo number_format($tp, 2) ?></td>
                                                                    <td></td>
                                                                </tr><?php
    $getamtp = mysqli_fetch_array(mysqli_query($conn, "select sum(amtpaid) as 'amtpaid' from payments where (dot>='$_POST[sdate]' and dot<='$_POST[enddate]') group by dot;"));
    ?>
                                                                <tr class="" style="font-size:12px; font-weight:bold">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>Amount Paid:</td>
                                                                    <td><?php echo number_format($getamtp['amtpaid'], 2) ?></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="" style="font-size:12px; font-weight:bold">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>Balance:</td>
                                                                    <td><?php echo number_format($tp - $getamtp['amtpaid'], 2) ?></td>
                                                                    <td><a style="color:#F00" href="javascript:printtab();">Print</a></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
    <?php
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