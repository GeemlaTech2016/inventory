<?php
session_start();
include("authen.php");
include("secure.php");

$user=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$myPass=isset($_SESSION['password'])?$_SESSION['password']:'';
$myRole=isset($_SESSION['role'])?$_SESSION['role']:'';
$msg="";

$gettypes=NULL;
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$_GET['id'];
	$gettypes=mysqli_fetch_array(mysqli_query($conn, "select * from customers where custid='{$_GET["id"]}'"));	
}

if(isset($_POST['ok'])!=''){
	if($_POST['id']!=''){
		if(mysqli_query($conn, "update customers set custname='{$_POST["custname"]}',phone='{$_POST["phone"]}',email='{$_POST["email"]}',datereg='{$_POST["datereg"]}',address='{$_POST["address"]}',branchid='{$_POST["branch"]}',ctype='{$_POST["ctype"]}' where custid='{$_POST["id"]}'")){
			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Customer Updated Successfully.
            </div>';	
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}
	}else{//u.userid, u.password, u.fullname
	$getn = mysqli_num_rows(mysqli_query($conn, "select * from customers"));
	$g = $getn+1;
	$custid = "CE".$g.date('Ymd');
		if(mysqli_query("insert into customers(custid,custname,phone,email,datereg,address,branchid,ctype) values('$custid','{$_POST["custname"]}','{$_POST["phone"]}','{$_POST["email"]}','{$_POST["datereg"]}','{$_POST["address"]}','{$_POST["branch"]}','{$_POST["ctype"]}')")){
			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Customer Added Successfully.
                            		</div>';	
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}
	}
}
?>
<?php
										$del = isset($_GET['del'])?$_GET['del']:'';
										if(mysqli_query($conn, "delete from customers where custid='$del'")){
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
                $("#datereg").datepicker({
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
								<h2><a href="">CUSTOMERS</a></h2>	
									
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
												<h3>Add New Customer</h3><p><?php echo $msg?></p>
												<form name="form1" method="post" action="">
												<div>
													<span>Customer Name<label>*</label></span>
													<input type="text" name="custname" required value="<?php echo $gettypes['custname']?>"> 
												</div>
												<div>
													<span>Telephone<label>*</label></span>
													<input type="text" name="phone" required value="<?php echo $gettypes['phone']?>"> 
												</div>
                                                <div>
													<span>Email</span>
													<input type="text" name="email" value="<?php echo $gettypes['email']?>"> 
												</div>
                                                <div>
													<span>Date Registered</span>
													<input type="text" name="datereg" id="datereg" value="<?php echo $gettypes['datereg']?>"> 
												</div>
                                                <div>
													<span>Address</span>
													<input type="text" name="address" value="<?php echo $gettypes['address']?>"> 
                                                    <input type="hidden" name="id" value="<?php echo $gettypes['custid']?>"> 
												</div>
                                                <div>
													<span>Customer Type</span>
													<select name="ctype">
                                                    <option value="Retailer">RETAILER</option>
                                                    <option value="Dealer" selected>VENDOR/DEALER</option>
                                                   </select> 
												</div>
                                                <div>
													<span>Branch</span>
													<select name="branch">
                                                    <?php
													$q=mysqli_query("select * from branches");
													while($gb=mysqli_fetch_array($q)){
													?>
                                                    <option value="<?php echo $gb['branchid']?>"><?php echo $gb['brname']?></option>
                                                    <?php
													}
													?>
                                                    </select> 
												</div>
												 <?php if($gettypes!=NULL){?>
												<input type="submit" value="Update" name="ok">
                                                <?php }else{?>
                                                <input type="submit" value="Register" name="ok">
                                                <button type="reset" class="">Reset</button>
                                        		<?php }?>
											</form>
												
											</div>
											<div class="col-md-8 banner-left-grid fullwidth-left-grid">
												<h3>All Customers</h3><p>&nbsp;</p>
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <thead>
                                    <tr style="font-size:10px">
                                        
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                      	<th>Address</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                    <?php
					$b=0; 
					$q = mysqli_query($conn, "select * from customers");
					while($rs = mysqli_fetch_array($q)){
						$b++;
					
					?>            
        <tr class="" style="font-size:10px;">
                                        
                                       
                                        <td><?php echo $rs['custname']?></td>
                                        <td><?php echo $rs['phone']?></td>
                                        <td><?php echo $rs['email']?></td>
                                        <td><?php echo $rs['ctype']?></td>
                                        <td><?php echo $rs['address']?></td>
                                       <td><a href="customers.php?id=<?php echo $rs['custid']?>">Edit</a>&nbsp;&nbsp;
                                       <a href="customers.php?del=<?php echo $rs['custid']?>">Delete</a></td>
        </tr>
                    <?php
					}
					?>        
                               
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