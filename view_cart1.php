<?php
session_start(); //start session
include("authen.php");
include("config.inc.php");
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
$user=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$myPass=isset($_SESSION['password'])?$_SESSION['password']:'';
$myRole=isset($_SESSION['role'])?$_SESSION['role']:'';
$msg="";
$dt = date("d-M-y H:i A");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Your Cart Before Buying</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3 style="text-align:center">Review Your Cart Before Buying</h3>
<?php
if(isset($_POST["amt"]) && $_POST["amt"]>0){
	
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<table class="view-cart" id="tab">
						<tr style="text-align:center;">
						<td><strong>Claire Energy Cooking Gas</strong>
						<div style="font-size:11px;">Opp Living Faith Church, Naka Rd Mkd Benue.<br>
						08073761926, 08038500572<br>
						<em>...cooking gas made easy</em><br>'
						.$dt.'</div></td>
						</tr>';

	
		
		$cart_box 		.=  "<tr style=\"font-size:12px;\"><td> $_POST[amtkg]kg (Qty : $_POST[qty]) <span> <strike>$currency</strike>$_POST[total] </span></td></tr>";
		
	
	$cart_box .= "<tr><td><hr><span class=\"view-cart-total\" style='float:right'><strong>Total : $currency ".sprintf("%01.2f", $_POST['total'])."<strong></span></td></tr>";
	$cart_box .= "<tr style=\"text-align:center; font-size:11px;\"><td>Email: claireenergycareltd@gmail.com<br>
				Thank you. Please call again<br>
				Powered by Claire Energy-Care Int'l Ltd.</td></tr>
				</table>";
	
	echo $cart_box;
}else{
	echo "Your Cart is empty";
}
?>
<form method="post" action="" name="form1">
<input type="hidden" name="amt" value="<?php echo $_POST['amt']?>">
<input type="hidden" name="qty" value="<?php echo $_POST['qty']?>">
<input type="hidden" name="total" value="<?php echo $_POST['total']?>">
<input name="finish" value="Finish" type="submit" onClick="javascript:printtab();">
</form>
<?php	
$d = date("Y-m-d H:i:s");
$dtt = date("YmdHis");
$gettypes=NULL;
	$gettypes=mysqli_fetch_array(mysqli_query("select * from kgpricetb where prodid='PA1'"));	

$c=1;
if(isset($_POST['finish'])!=''){
	$gpr = mysqli_fetch_array(mysqli_query("select prodid from productcat where catid = 'PA1'"));
	$gq = mysqli_fetch_array(mysqli_query("select prodname,totqty,asat from products where prodid = '$gpr[prodid]'"));
	
$sn = mysqli_num_rows(mysqli_query("select * from sales"));
$saleid = $sn+1;
$saleid = $saleid.$dtt;
$prodid="PA1";
		if(mysqli_query("insert into `sales`(`saleid`,`prodid`,`unitprice`,`qty`,`totalprice`,`dot`,`transid`,`staffid`,`discount`) values 
('$saleid','$prodid','$_POST[amt]','$_POST[qty]','$_POST[total]','$d','$saleid$dtt','$user','')")){
	
	mysqli_query("insert into `transhistory`(transid,dot,staffid,transtype,tco,receipt) values 
('$saleid$dtt','$d','$user','Sale','$_POST[total]','')") or die(mysqli_error());
$c++;
$qr = $gq['totqty'] - $_POST['amtkg'];
//$pq = $gpr['instock'] - $_POST['qty'];
mysqli_query("update products set totqty = '$qr' where prodid = '$gpr[prodid]'");
//mysqli_query("update productcat set instock = '$pq' where catid = 'PA1'");

			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Transaction Completed Successfully.
            </div>';	
			header("location:ms2.php");
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}

}
	
?>
<script type="text/javascript">
function printtab(){
var tab = document.getElementById('tab');
    newwin = window.open("");
	newwin.document.write(tab.outerHTML);
	newwin.print();
	newwin.close(); 	
}
</script>
<style>
@media print {
	*{margin:0 !important;}
	body{width:100%;}
    input {
        border: none;
        border-bottom: 2px solid #000000;
    }
	li{list-style:none;
	list-style-type:decimal;
	}
	ul{margin-left: auto;
  margin-right: auto;
  background: #fff;
  list-style:decimal;
}
</style>
</body>
</html>