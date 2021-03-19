<?php
session_start();
include("authen.php");
include("secure.php");

$user=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$myPass=isset($_SESSION['password'])?$_SESSION['password']:'';
$myRole=isset($_SESSION['role'])?$_SESSION['role']:'';
$msg="";
$dt = date("Y-m-d");
$time=date(" H:i:s");
$gettypes=NULL;
$getamt=NULL;
$custname="";
$amttopay=0.0;
if(isset($_GET['cust']) && $_GET['cust']!=''){
	//$id=$_GET['id'];
	$gettypes=mysqli_fetch_array(mysqli_query($conn,"select * from payments where custid='{$_GET["cust"]}' and dot='{$_GET["datee"]}' order by datepaid desc limit 1"));	
	if($gettypes==NULL){
		$getamt = mysqli_fetch_array(mysqli_query($conn,"select sum(totalprice) as 'totp'
  from sales where (dot>='$_GET[datee] 00:00:00' and dot<='$_GET[datee] 23:59:59')
  and custid = '$_GET[cust]' and status='active' order by dot asc;"));		
		}else{
		$getamt = mysqli_fetch_array(mysqli_query($conn,"select sum(amtpaid) as 'totp'
  from payments where (dot>='$_GET[datee]' and dot<='$_GET[datee]')
  and custid = '$_GET[cust]'"));		
		}
$custname = mysqli_fetch_array(mysqli_query($conn,"select custname from customers where custid='$_GET[cust]'"));
$atp = mysqli_fetch_array(mysqli_query($conn,"select sum(amtpaid) as 'totp'
  from payments where (dot>='$_GET[datee]' and dot<='$_GET[datee]')
  and custid = '$_GET[cust]'"));
  $ap=0.0;
  if($atp['totp']==NULL || $atp['totp']==""){
	  $amttopay = $_GET['amt'] - 0.0;
  }else{
	$amttopay = $_GET['amt'] - $getamt['totp']; 
	$ap = $atp['totp']; 
  }
}

if(isset($_POST['ok'])!=''){
	$amt = $_POST["amt"];
	$amt1 = str_replace(",","",$amt);
	$amtpaid = $_POST["amtpaid"];
	$amtpaid1 = str_replace(",","",$amtpaid);
	$amtbal = $amt1 - $amtpaid1;
	if($_POST['id']!=''){
		//if($_POST["dismode"]=='Cash')
		
	$gett = mysqli_num_rows(mysqli_query($conn,"select * from transhistory"));
	$t=$gett+1;
	$transid = $_GET["cust"].$t;
	
	$dstatus="pending";
	//if($amtbal==0.0)
		//$dstatus="paid";
		
		if(mysqli_query($conn,"insert payments(dot,datepaid,amt,amtpaid,amtbal,dismode,purpose,custid,tellernum,bankname) values('{$_GET["datee"]}','{$_POST["datepaid"]}','{$_GET["amt"]}','$amtpaid1','$amtbal','{$_POST["dismode"]}','{$_POST["purpose"]}','{$_GET["cust"]}','{$_POST["receipt"]}','{$_POST["bank"]}')")){
			mysqli_query($conn,"insert into transhistory(transid,dot,staffid,transtype,tco,receipt) values('$transid','{$_POST["dot"]}$time','$user','Payment','$amt1','{$_POST["receipt"]}')");
			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Payment Information Updated Successfully.
            </div>';	
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}
	}else{//u.userid, u.password, u.fullname
	
	
	}
}
?>
<?php
										$del = isset($_GET['del'])?$_GET['del']:'';
										if(mysqli_query($conn,"delete from payments where sn='$del'")){
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
                $("#datepaid").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
                
            });
        </script>
        <script type="text/javascript">
                    function Comma(Num) { //function to add commas to textboxes
        Num += '';
        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
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
								<h2><a href="">PAYMENTS </a></h2>	
									
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
												<h3>New Payment</h3><p><?php echo $msg?></p>
												<form name="form1" method="post" action="">
                                                
                                                <div>
											    <span>Received From<label></label></span>
                                            <input type="text" name="receiver" id="receiver" value="<?php echo $custname['custname']?>" readonly>
                                                <input type="hidden" name="id" value="<?php echo $_GET['cust']?>"> 
                                                </div>
                                                <div>
													<span>Initial Total</span>
													<input type="text" name="iamt" id="iamt" value="<?php echo $_GET['amt']?>" readonly> 
												</div>
												<div>
													<span>Amount To Pay</span>
													<input type="text" name="amt" id="amt" value="<?php echo $amttopay?>" readonly> 
												</div>
                                                <div>
													<span>Amount Paid</span>
													<input type="text" name="amtpaid" id="amtpaid" onKeyUp="javascript:this.value=Comma(this.value);" value="<?php echo $ap?>"> 
												</div>
                                               
                                                <div>
													<span>Date of Transaction</span>
													<input type="text" name="dot" id="dot" value="<?php echo $_GET['datee']?>" readonly> 
											  </div>
                                              <div>
													<span>Date Paid</span>
													<input type="text" name="datepaid" id="datepaid" value="<?php echo $gettypes['datepaid']?>"> 
											  </div>
                                                
                                              <div>
													<span>Purpose</span>
													<input type="text" name="purpose" >
												</div>
                                                <div>
													<span>Payment Type</span>
													<select name="dismode" id="dismode">
                                                    <option value="Bank" selected>Bank</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Others">Others</option>
                                                    </select> 
												</div>
                                                <div>
													<span>Bank</span>
													<select name="bank">
                                                    <?php
													$a = mysqli_query($conn,"select * from banks");
													while($ra = mysqli_fetch_array($a)){
													?>
                                                    <option value="<?php echo $ra['bankid']?>" ><?php echo $ra['bankname']?></option>
                                                    <?php
													}
													?>
                                                    </select>
												</div>
                                               <div>
											    <span>Receipt No</span>
                                                <input type="text" name="receipt" >
                                                </div>
                                             
                                                
												 <?php if($gettypes!=NULL){?>
												<input type="submit" value="Update" name="ok">
                                                <?php }else{?>
                                                <input type="submit" value="Add Payment" name="ok">
                                                <button type="reset" class="">Reset</button>
                                        		<?php }?>
											</form>
												
											</div>
											<div class="col-md-8 banner-left-grid fullwidth-left-grid">
												<h3>All Payment For this Transactions</h3><p>&nbsp;</p>
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                               <thead>
                                    <tr style="font-size:10px">
                                        
                                        <th>Date</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Purpose</th>
                                      	<th>Customer</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                    <?php
					$b=0; 
					$q = mysqli_query($conn,"select * from payments where custid='$_GET[cust]' and dot='$_GET[datee]' order by datepaid asc");
					while($rs = mysqli_fetch_array($q)){
						$b++;
						$gc=mysqli_fetch_array(mysqli_query($conn,"select * from customers where custid='$_GET[cust]'"));
					?>            
        <tr class="" style="font-size:10px;">
                                        
                                       
                                        <td><?php echo $rs['dot']." / ".$rs['datepaid']?></td>
                                        <td><?php echo number_format($rs['amtpaid'],2)?></td> 
                                        <td><?php echo number_format($rs['amtbal'],2)?></td>
                                        <td><?php echo $rs['purpose']?></td>
                                        <td><?php echo $gc['custname']?></td>
                                       <td><a href="addpayment.php?del=<?php echo $rs['sn']?>">Delete</a></td>
        </tr>
                    <?php
					}
					?>        
                   <tr class="" style="font-size:10px; font-weight:bold">
                                        
                                       
                                        <td></td>
                                        <td></td> 
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
                                    <script>
    document.getElementById("receiver").onchange = function() {
        
          document.form1.submit();    
    };
</script>
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
</body>
</html>