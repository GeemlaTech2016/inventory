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

$saleid = $_POST['saleid'];
$catid= $_POST['prodid'];
$qty= $_POST['qty'];

$gs = mysqli_fetch_array(mysqli_query("select * from sales where saleid = '$saleid'"));
$gpp = mysqli_fetch_array(mysqli_query("select * from productcat where catid = '$catid'"));
$gprd = mysqli_fetch_array(mysqli_query("select * from products where prodid = '$gpp[prodid]'"));
$totqty = $gprd['totqty'];
$tot = $gpp['sellprice'] * $_POST['qty'];

mysqli_query("update products set totqty='$totqty' where prodid='$gpp[prodid]'");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Your Cart Before Buying</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3 style="text-align:center">Review Your Cart </h3>
<?php
if(isset($_POST["prodname"])){
	
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<table class="view-cart" id="tab">
						<tr style="text-align:center;">
						<td><strong>Sylmec Ventures Limited</strong>
						<div style="font-size:11px;">#15 Niger Cresent Opp. Central Mosque Wadata<br>
						08039095995, 08161116613<br>
						<em>Dealers on all types of Bakery Materials & General Merchandise</em><br>'
						.$dt.'</div></td>
						</tr>';

	
		
		$cart_box 		.=  "<tr style=\"font-size:12px;\"><td> $gpp[category] (Qty : $_POST[qty]) <span> <strike>$currency</strike>$tot </span></td></tr>";
		
	
	$cart_box .= "<tr><td><hr><span class=\"view-cart-total\" style='float:right'><strong>Total : $currency ".sprintf("%01.2f", $tot)."<strong></span></td></tr>";
	$cart_box .= "<tr style=\"text-align:center; font-size:11px;\"><td>Email: claireenergycareltd@gmail.com<br>
				Thank you. Please call again<br>
				Powered by Geemla Technologies Ltd.</td></tr>
				</table>";
	
	echo $cart_box;
}else{
	echo "Your Cart is empty";
}
?>
<form method="post" action="" name="form1">
<input type="hidden" name="prodid" value="<?php echo $_POST['prodid']?>">
<input type="hidden" name="qty" value="<?php echo $_POST['qty']?>">
<input type="hidden" name="total" value="<?php echo $tot?>">
<input name="finish" value="Finish" type="submit" onClick="javascript:printtab();">
</form>
<?php	
$d = date("Y-m-d H:i:s");
$dtt = date("YmdHis");
$gettypes=NULL;
	//$gettypes=mysqli_fetch_array(mysqli_query("select * from kgpricetb where prodid='PA1'"));	

$c=1;
if(isset($_POST['finish'])!=''){
	
	$gpr = mysqli_fetch_array(mysqli_query("select prodid,sellprice from productcat where catid = '$_POST[prodid]'"));
	$gq = mysqli_fetch_array(mysqli_query("select prodname,totqty,asat from products where prodid = '$gpr[prodid]'"));
	
$prodid="PA1";
		if(mysqli_query("update `sales` set `prodid`='$_POST[prodid]',`unitprice`='$gpr[sellprice]',`qty`='$_POST[qty]',`totalprice`='$_POST[total]' where saleid='$saleid'")){
	
	mysqli_query("insert into `transhistory`(transid,dot,staffid,transtype,tco,receipt) values 
('$saleid$dtt','$d','$user','Sale','$_POST[total]','')") or die(mysqli_error());
$c++;
$qr = $gq['totqty'] + $_POST['qty'];
$pq = $gpr['instock'] + $_POST['qty'];
mysqli_query("update products set totqty = '$qr' where prodid = '$gpr[prodid]'");
mysqli_query("update productcat set instock = '$pq' where catid = '$_POST[prodid]'");

			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Transaction Completed Successfully.
            </div>';	
			header("location:ms.php");
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