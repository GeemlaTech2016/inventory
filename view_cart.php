<?php
ob_start();
session_start(); //start session
include("authen.php");
include("config.inc.php");
setlocale(LC_MONETARY, "en_US"); // US national format (see : http://php.net/money_format)
$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";
$dt = date("d-M-y H:i A");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Review Your Cart Before Selling</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script>
            $(window).load(function () {
                $(".se-pre-con").fadeOut("slow");
                $("#sdate").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });

            });
        </script>
        <script src="jquery-1.9.1.js"></script>
        <script>
            function showUser(str)
            {
                if (str == "")
                {
                    //if null the it'll show blank space
                    // document.getElementById("javaquery").innerHTML="";
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("javaquery").innerHTML = xmlhttp.responseText;
                    }
                }
                //send request
                xmlhttp.open("GET", "getinfo.php?custid=" + str, true);
                xmlhttp.send();
            }
        </script>
        <style type="text/css">
            select{
                border: 1px solid #136ad5;
                outline-color:#136ad5;
                width: 20%;
                font-size:0.8125em;
                padding: 0.7em;
            }
            input{
                border: 1px solid #136ad5;
                outline-color:#136ad5;
                width: 20%;
                font-size:0.8125em;
                padding: 0.7em;
            }
        </style>
    </head>
    <body>
        <h3 style="text-align:center">Review Your Cart Before Selling</h3>
        <?php
        if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
            $total = 0;
            $list_tax = '';
            $cart_box = '<table class="view-cart" id="tab" align="center">
						<tr style="text-align:center;">
						<td><strong>Innovad Global Ventures Ltd</strong>
						<div style="font-size:11px;">RC1229208<br>
						08036330802, 08057353342<br>
						<em>Distributors & Wholesalers</em><br>'
                    . $dt . '</div>
						<div style="font-size:11px;" id="javaquery"></div></td>
						</tr>';

            foreach ($_SESSION["products"] as $product) { //Print each item, quantity and price.
                $product_name = $product["prodname"];
                $product_qty = $product["product_qty"];
                $product_price = $product["sellprice"];
                $product_code = $product["catid"];
                $getcat = mysqli_fetch_array(mysqli_query($conn, "select * from productcat where catid='$product_code'"));
                $cat = $getcat['category'];
                //$product_color = $product["product_color"];
                //$product_size = $product["product_size"];
                // $product_code &ndash;  $product_name (Qty : $product_qty) <span> $currency. $item_price </span></li>
                $item_price = sprintf("%01.2f", ($product_price * $product_qty));  // price x qty = total item price

                $cart_box .= "<tr style=\"font-size:12px;\"><td> $cat  $product_name (Qty : $product_qty) <span> <strike>$currency</strike>$item_price </span></td></tr>";

                $subtotal = ($product_price * $product_qty); //Multiply item quantity * price
                $total = ($total + $subtotal); //Add up to total price
            }

            $grand_total = $total; // + $shipping_cost; //grand total

            /* foreach($taxes as $key => $value){ //list and calculate all taxes in array
              $tax_amount 	= round($total * ($value / 100));
              $tax_item[$key] = $tax_amount;
              $grand_total 	= $grand_total + $tax_amount;
              } */

            /* foreach($tax_item as $key => $value){ //taxes List
              $list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
              } */

            //$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
            //Print Shipping, VAT and Total
            //$cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
            $cart_box .= "<tr><td><hr><span class=\"view-cart-total\" style='float:right'><strong>Total : $currency " . sprintf("%01.2f", $grand_total) . "<strong></span></td></tr>";
            $cart_box .= "<tr style=\"text-align:center; font-size:11px;\"><td>
				Thank you. Please call again<br>
				Powered by Geemla Technologies Ltd.</td></tr>
				</table>";

            echo $cart_box;
        } else {
            echo "Your Cart is empty";
        }
        ?>
        <form method="post" action="" name="form1">
            Select Customer: <select name="custid" onChange="showUser(this.value);">
                <option value="x">Select One</option>
                <?php
                $q = mysqli_query($conn, "select * from customers where ctype='Dealer'");
                while ($rs = mysqli_fetch_array($q)) {
                    ?>
                    <option value="<?php echo $rs['custid'] ?>"><?php echo $rs['custname'] ?></option>
                    <?php
                }
                ?>
            </select><br><br>
            Transaction Type: <select name="transtype" required>
                <option value="" selected>Select One</option>
                <option value="Cash" >CASH IN HAND</option>
                <option value="Credit">CREDIT</option>
                <?php
				$getbank=mysqli_query($conn,"select * from banks order by bankname");
				while($rbank=mysqli_fetch_array($getbank)){
				?>
                <option value="<?php echo $rbank['bankid']?>"><?php echo $rbank['bankname']?></option>
                <?php } ?>
            </select><br><br>
            Select Date: <input type="text" name="sdate" id="sdate" autocomplete="off" required><br><br>
            <input name="ok" class="" value="Click to Finish" type="submit" onClick="javascript:printtab();">
        </form>
        <?php
        $d = date("Y-m-d H:i:s");
        $dt = date("Y-m-d");
        $dd = date("H:i:s");
        $dtt = date("YmdHis");
        $c = 1;
        if (array_key_exists('ok', $_POST)) {
            foreach ($_SESSION["products"] as $item) {
                $tot = $item['sellprice'] * $item['product_qty'];
                $custid = $_POST['custid'];
                $transtype = $_POST['transtype'];
                $sdate = $_POST['sdate'];
                $sdate = $sdate . " " . date('H:i:s');
                //$dis = $_POST['dis'];
                //$gd = $_POST['gd'];
                //if($gd==NULL or $gd=="")
                //	$gd = $dt;
                //$gdd = $gd.' '.$dd;
                $sn = mysqli_num_rows(mysqli_query($conn, "select * from sales"));
                $dept_sn = mysqli_num_rows(mysqli_query($conn, "select * from debtors"));

                $saleid = $sn + 1;

                $saleid = $saleid . $dtt;

                $debt_id = $dept_sn + 1;
                $debt_id = $debt_id . $dtt;

                $gpr = mysqli_fetch_array(mysqli_query($conn, "select prodid,instock from productcat where catid = '$item[catid]'"));
                $gq = mysqli_fetch_array(mysqli_query($conn, "select prodname,totqty,asat from products where prodid = '$gpr[prodid]'"));
                $gas = mysqli_fetch_array(mysqli_query($conn, "select * from assignproduct where product='$item[catid]'"));

                if ($gpr['instock'] >= $item['product_qty']) {
                    mysqli_query($conn, "insert into `sales`(`saleid`,`prodid`,`unitprice`,`qty`,`totalprice`,`dot`,`transid`,`staffid`,`discount`,`custid`,`transtype`,`status`) values 
('$saleid','$item[catid]','$item[sellprice]','$item[product_qty]','$tot','$sdate','$saleid$dtt','$gas[empid]','','$custid','$transtype','active')") or die(mysqli_error());

                    mysqli_query($conn, "insert into `transhistory`(transid,dot,staffid,transtype,tco,receipt) values 
('$saleid$dtt','$sdate','$user','Sale','$tot','')") or die(mysqli_error());
                    $c++;
                    if ($transtype == "Credit") {

                        mysqli_query($conn, "insert into debtors (sn, dot, amt, amtpaid, amtbal, dismode, purpose, receiver, approvedby, dstatus) values('$debt_id', '$sdate', '$item[sellprice]', '0', '$item[sellprice]', 'yes', '$item[catid]', '$custid', '$gas[empid]', 'pending')");
                    }
                    $qr = $gq['totqty'] - $item['product_qty'];
                    $pq = $gpr['instock'] - $item['product_qty'];
                    mysqli_query($conn, "update products set totqty = '$qr' where prodid = '$gpr[prodid]'");
                    mysqli_query($conn, "update productcat set instock = '$pq' where catid = '$item[catid]'");

                    //$get_stock = mysqli_fetch_array(mysqli_query($conn, "select * from stock where prodid='$gpr[prodid]'"));
                    //$new_qty = $get_stock['totqty'] - $item['product_qty'];
                    //if($gd <= $gq['asat']){
                    //mysqli_query($conn, "update producttble set onhand = '$qr',asat='$gd' where prod_id = '$item[prod_id]'");
                    //}
                    $msg1 = $qr . " " . $gq['prodname'] . " Left";
                    unset($_SESSION["products"]);
                    header("location:ms.php");
                } else {
                    continue;
                }
            }
        }
        ?>
        <script type="text/javascript">
            function printtab() {
                var tab = document.getElementById('tab');
                newwin = window.open("");
                newwin.document.write(tab.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script>
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0/jquery-ui.min.css">
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <style>
            @media print {
                *{margin:0 !important;}
                body{width:100%;}
                input {
                    border: none;
                    border-bottom: 2px solid #000000;
                }
                li{
                    list-style:none;
                    list-style-type:decimal;
                }
                ul{
                    margin-left: auto;
                    margin-right: auto;
                    background: #fff;
                    list-style:decimal;
                }
            </style>
        </body>
    </html>