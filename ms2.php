<?php
session_start();
include("authen.php");
include("secure.php");

$user=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$myPass=isset($_SESSION['password'])?$_SESSION['password']:'';
$myRole=isset($_SESSION['role'])?$_SESSION['role']:'';
$msg="";
$d = date("Y-m-d H:i:s");
$dtt = date("YmdHis");
$gettypes=NULL;
	$gettypes=mysqli_fetch_array(mysqli_query("select * from kgpricetb where prodid='PA1'"));	

$c=1;
/*if(isset($_POST['ok'])!=''){
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
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}
	}*/
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
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
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
            $(window).load(function() {
                $(".se-pre-con").fadeOut("slow");
                $("#hiredate1").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
				$("#tdate").datepicker({
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
<?php include("header.php");?>
	<!-- //header -->	
	<!-- bg-banner -->
<div class="container">
	<div class="bg-banner">
		<div class="banner-bottom-bg">
			<div class="banner-bg"> 
				
					<!-- banner -->
					<div class="banner">
						<div class="banner-grids">
						<?php include("nav.php");?>
							
								<div class="ban-top">
								
								<div class="col-md-12 bann-right">
								<h2><a href="">MAKE SALE FOR OTHER QUANTITIES</a></h2>	
									
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
                                            <div class="col-md-8 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
												<h3>Enter details of sale</h3><p><?php echo $msg?></p>
												<form name="form1" method="post" action="view_cart1.php">
												<div>
													<span>Amount</span>
													<input type="text" name="amt" id="amt" required autocomplete="off" onKeyUp="calculate();"> 
												</div>
                                                <div>
													<span>Unit Price</span>
													<input type="text" name="unitprice" id="unitprice" required value="<?php echo $gettypes['sprice']?>" readonly onKeyUp="calculate();"> 
												</div>
												<div>
													<span>Quantity</span>
													<input type="text" name="qty" id="qty" autocomplete="off" required value="1" onKeyUp="calculate();"> 
												</div>
                                                <div>
													<span>Amount in Kg</span>
													<input type="text" name="amtkg" id="amtkg" readonly value="" onKeyUp="calculate();"> 
												</div>
                                                <div>
													<span>Total</span>
													<input type="text" name="total" id="total" value="" readonly onKeyUp="calculate();"> 
												</div>
                                               
												<input type="submit" value="Complete Sale" name="ok">
                                              
                                                <button type="reset" class="">Reset</button>
                                        	
											</form>
												
											</div>
											<div class="col-md-4 banner-left-grid fullwidth-left-grid">
												<p>&nbsp;</p>
											
											
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
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0/jquery-ui.min.css">
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript">
function calculate() {
	//count = document.getElementById('count').value;
		 var unitprice = document.getElementById('unitprice').value;	
		 var qty = document.getElementById('qty').value;
		 var amt = document.getElementById('amt').value;
		 
		 var result = document.getElementById('amtkg');
		 	
			var myResult1 = parseFloat(amt)/parseFloat(unitprice);
			result.value = myResult1.toFixed(2);
			
		var myResult = parseFloat(amt) * parseFloat(qty);
		
                	
                 var tot = document.getElementById('total');
                 
                 tot.value = myResult;
	}
</script>
</body>
</html>