<?php
include("authen.php");
include("config.inc.php");
$custid = $_GET['custid'];
if($custid!="x"){
$gcust = mysqli_fetch_array(mysqli_query($conn, "select custid,custname from customers where custid = '$custid'"));
?>
<div style="font-size:11px;" id="javaquery"><?php echo "Customer: ".$gcust['custname']?></div>
<?php
}else{
?>
<div style="font-size:11px;" id="javaquery"><?php echo ""?></div>
<?php } ?>