<?php
session_start();
include("authen.php");
include("secure.php");

$user=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$myPass=isset($_SESSION['password'])?$_SESSION['password']:'';
$myRole=isset($_SESSION['role'])?$_SESSION['role']:'';
$msg="";
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
								<h2><a href="">Welcome, Your Sales at a glance</a></h2>	
									
								</div>
									<div class="clearfix"> </div>
                                    
								</div>
								<?php
								$dt = date("Y-m-d");
								$totsales = 0.0;
								$totsales = mysqli_fetch_array(mysqli_query($conn, "select sum(totalprice) as `totalprice` from sales where dot >='$dt 00:00:00' and dot <= '$dt 23:59:59' "));
								if($totsales==NULL) $totsales=0.0;
								
								$c=0.0;
								$totvol = mysqli_query($conn, "select * from sales where dot >='$dt 00:00:00' and dot <= '$dt 23:59:59' ");
								while($rs=mysqli_fetch_array($totvol)){
									$tv = mysqli_fetch_array(mysqli_query($conn, "select * from productcat where catid='$rs[prodid]' "));
									$c = $c + ($tv['cylindersize']*$rs['qty']);
								}
								if($totvol==NULL) $c=0.0;
								
								$totqty = mysqli_fetch_array(mysqli_query($conn, "select prodid,sum(qty) as `totalqty` from sales where dot >='$dt 00:00:00' and dot <= '$dt 23:59:59' group by prodid order by qty desc limit 1"));
								$gpca = mysqli_fetch_array(mysqli_query($conn, "select prodid from productcat where catid ='$totqty[prodid]'"));
								$gp = mysqli_fetch_array(mysqli_query($conn, "select prodname from products where prodid ='$gpca[prodid]'"));
								
								$os =  mysqli_fetch_array(mysqli_query($conn, "select sum(onhand) as `onhand` from products where asat <= '$dt 23:59:59'"));
								
								$leadcat = mysqli_fetch_array(mysqli_query($conn, "select prodid,count(prodid) as `totprod` from sales where dot >='$dt 00:00:00' and dot <= '$dt 23:59:59' group by prodid order by totprod desc limit 1"));
								$leadcat1= mysqli_fetch_array(mysqli_query($conn, "select category from productcat where catid ='$leadcat[prodid]'"));
								?>
							<div class="banner-middle">
								<div class="strip"> </div>
								<?php
								if($myRole=='admin' || $myRole=='ceo'){
								?>
								<!-- banner-bottom-grids -->
								<div class="banner-bottom-grids">
									<!-- banner-bottom-left -->
									<div class="banner-bottom-left">
										
										<div class="banner-bottom-left-grids">
											<div class="col-md-3 banner-left-grid fullwidth-left-grid">
												<h3>Total Sales Today</h3>
												<a href=""><img src="images/pic1.jpg" alt="" /></a>
												<h4 align="center"><a href=""><?php echo $currency." ".number_format($totsales['totalprice'],2)?></a></h4>
												
											</div>
											<div class="col-md-3 banner-left-grid fullwidth-left-grid">
												<h3>Total Volume Sold Today</h3>
												<a href=""><img src="images/pic2.jpg" alt="" /></a>
												<h4 align="center"><a href=""><?php echo $c?></a></h4>
												
											</div>
                                            <div class="col-md-3 banner-left-grid fullwidth-left-grid">
												<h3>Leading Category Sold Today</h3>
												<a href=""><img src="images/pic3.jpg" alt="" /></a>
												<h4 align="center"><a href=""><?php echo $leadcat1['category']?></a></h4>
												
											</div>
											<div class="col-md-3 banner-left-grid fullwidth-left-grid">
												<h3>Opening Stock</h3>
												<a href=""><img src="images/pic2.jpg" alt="" /></a>
												<h4 align="center"><a href=""><?php echo number_format($os['onhand']*1000)?></a></h4>
												<!--<p class="comments">August 4 2010, <a href="#">8 Comments</a></p>-->
												
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
                                <?php
								}else{
								?>
                                <!-- banner-bottom-grids -->
								<div class="banner-bottom-grids">
									<!-- banner-bottom-left -->
									<div class="banner-bottom-left">
										
										<div class="banner-bottom-left-grids">
											<div class="col-md-3 banner-left-grid fullwidth-left-grid">
												<h3>Please use the links above to navigate the system</h3>
												
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
                                <?php
								}
								?>
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
</body>
</html>