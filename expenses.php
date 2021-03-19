<?php
session_start();
include("authen.php");
include("secure.php");

$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";
$dt = date("Y-m-d");
$gettypes = NULL;
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $gettypes = mysqli_fetch_array(mysqli_query($conn, "select * from expenses where sn='{$_GET["id"]}'"));
}
$getex = mysqli_fetch_array(mysqli_query($conn, "select sum(incash) as incash, sum(inbank) as inbank, sum(outcash) as outcash from vault where dot='$dt'"));
if (isset($_POST['ok']) != '') {
    $amt = $_POST["amt"];
    $amt1 = str_replace(",", "", $amt);
    if ($_POST['id'] != '') {
        if (mysqli_query($conn, "update expenses set amt='$amt1',dismode='{$_POST["dismode"]}',dot='{$_POST["dot"]}',purpose='{$_POST["purpose"]}',exptype='{$_POST["exptype"]}',receiver='{$_POST["receiver"]}',approvedby='{$_POST["approvedby"]}' where sn='{$_POST["id"]}'")) {
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Expense transaction Updated Successfully. <a href="expenses.php">Add New</a>
            </div>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
        }
    } else {//u.userid, u.password, u.fullname
        $getn = mysqli_num_rows(mysqli_query($conn, "select * from expenses"));
        $g = $getn + 1;
        $sn = $g . date('YmdHis');
        $gett = mysqli_num_rows(mysqli_query($conn, "select * from transhistory"));
        $t = $gett + 1;
        //$transid = $_POST["prodid"].$t;
        $incash = 0.0;
        $outcash = 0.0;
        $inbank = 0.0;

        if (mysqli_query($conn, "insert into expenses(sn,dot,dismode,amt,purpose,exptype,receiver,approvedby) values('$sn','{$_POST["dot"]}','{$_POST["dismode"]}','$amt1','{$_POST["purpose"]}','{$_POST["exptype"]}','{$_POST["receiver"]}','{$_POST["approvedby"]}')")) {
            if ($_POST["dismode"] == 'Cash') {
                $incash = $getex['incash'] - $amt1;
                $outcash = $getex['outcash'] + $amt1;
                mysqli_query($conn, "update vault set incash='$incash', outcash='$outcash' where dot='$dt' order by dot desc limit 1");
            } elseif ($_POST["dismode"] == 'Cheque' || $_POST["dismode"] == 'Epay') {
                $inbank = $getex['incash'] - $amt1;
                mysqli_query($conn, "update vault set inbank='$inbank' where dot='$dt' order by dot desc limit 1");
            }

            mysqli_query($conn, "insert into transhistory(transid,dot,staffid,transtype,tco,receipt) values('$transid','{$_POST["dot"]}','$user','Expense','$amt1','{$_POST["receipt"]}')");
            $msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Expense Transaction Added.
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
if (mysqli_query($conn, "delete from expenses where sn='$del'")) {
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
                $("#dot").datepicker({
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
                                        <h2><a href="">EXPENSE TRANSACTIONS</a></h2>	

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
                                                    <h3>New Expense</h3><p><?php echo $msg ?></p>
                                                    <form name="form1" method="post" action="">
                                                        <div>
                                                            <div style="float:left; padding-right:10px;"><span>Amount In Drawer</span>
                                                                <input type="text" name="incash" id="incash" readonly value="<?php echo $getex['incash'] ?>" style="width:100px;"></div>
                                                            <span>Amount In Bank</span>
                                                            <input type="text" name="inbank" id="inbank" readonly value="<?php echo $getex['inbank'] ?>" style="width:100px;"> 
                                                        </div>
                                                        <div>
                                                            <span>Amount</span>
                                                            <input type="text" name="amt" id="amt" onKeyUp="javascript:this.value = Comma(this.value);" value="<?php echo $gettypes['amt'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Expense Type</span>
                                                            <select name="exptype">
                                                                <?php
                                                                $a = mysqli_query($conn, "select * from expensetype order by exptype asc");
                                                                while ($ra = mysqli_fetch_array($a)) {
                                                                    ?>
                                                                    <option value="<?php echo $ra['ecode'] ?>" ><?php echo $ra['exptype'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select> 
                                                        </div>
                                                        <div>
                                                            <span>Disburse Mode</span>
                                                            <select name="dismode" id="dismode">
                                                                <option value="Cash" selected>Cash</option>
                                                                <option value="Cheque">Cheque</option>
                                                                <option value="Epay">E-Pay</option>
                                                            </select> 
                                                        </div>

                                                        <div>
                                                            <span>Date</span>
                                                            <input type="text" name="dot" id="dot" value="<?php echo $gettypes['dot'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Purpose<label>*</label></span>
                                                            <input type="text" name="purpose" required value="<?php echo $gettypes['purpose'] ?>">
                                                        </div>
                                                        <div>
                                                            <span>Receiver<label></label></span>
                                                            <input type="text" name="receiver" value="<?php echo $gettypes['receiver'] ?>">
                                                            <input type="hidden" name="id" value="<?php echo $gettypes['sn'] ?>"> 
                                                        </div>
                                                        <div>
                                                            <span>Approved By</span>
                                                            <select name="approvedby">
                                                                <?php
                                                                $a = mysqli_query("select * from login where role1='admin'");
                                                                while ($ra = mysqli_fetch_array($a)) {
                                                                    ?>
                                                                    <option value="<?php echo $ra['empid'] ?>" ><?php echo $ra['empname'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select> 
                                                        </div>
                                                        <div>
                                                            <span>Receipt No<label>(Optional)</label></span>
                                                            <input type="text" name="receipt" >
                                                        </div>


                                                        <?php if ($gettypes != NULL) { ?>
                                                            <input type="submit" value="Update" name="ok">
                                                        <?php } else { ?>
                                                            <input type="submit" value="Register" name="ok">
                                                            <button type="reset" class="">Reset</button>
                                                        <?php } ?>
                                                    </form>

                                                </div>
                                                <div class="col-md-8 banner-left-grid fullwidth-left-grid">
                                                    <h3>All Expense Transactions</h3><p>&nbsp;</p>
                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr style="font-size:10px">

                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Description</th>
                                                                <th>Approved by</th>
                                                                <th>Receiver</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $b = 0;
                                                            $tot = 0.0;
                                                            $q = mysqli_query($conn, "select * from expenses order by dot desc");
                                                            $stotal = 0.0;
                                                            while ($rs = mysqli_fetch_array($q)) {
                                                                $b++;
                                                                $ge = mysqli_fetch_array(mysqli_query($conn, "select * from employees where empid='$rs[approvedby]'"));
                                                                $exp = mysqli_fetch_array(mysqli_query($conn, "select * from expensetype where ecode='$rs[exptype]'"));
                                                                $tot = $tot + $rs['amt'];
                                                                ?>            
                                                                <tr class="" style="font-size:10px;">


                                                                    <td><?php echo $rs['dot'] ?></td>
                                                                    <td><?php echo $rs['amt'] . " (" . $rs['dismode'] . ")" ?></td>
                                                                    <td><?php echo $exp['exptype'] . ": " . $rs['purpose'] ?></td>
                                                                    <td><?php echo $ge['empname'] ?></td>
                                                                    <td><?php echo $rs['receiver'] ?></td>
                                                                    <td><a href="expenses.php?id=<?php echo $rs['sn'] ?>">Edit</a>&nbsp;&nbsp;
                                                                        <a href="expenses.php?del=<?php echo $rs['sn'] ?>">Delete</a></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>        
                                                            <tr class="" style="font-size:10px; font-weight:bold">


                                                                <td>TOTAL:</td>
                                                                <td><?php echo number_format($tot, 2) ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

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