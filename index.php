<?php
session_start();
include("authen.php");
$msg="";
?>
<?php
	$dt=date("Y-m-d H:i:s");
	$getlock = mysqli_fetch_array(mysqli_query($conn, "select * from lockserver where sn='1'"));
	if($dt < $getlock['startdate'] || $dt > $getlock['enddate']){
		?>
        <meta http-equiv="refresh" content="0; url=404.php" />
        <?php
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
							<div class="banner-middle">
								
								<div class="login-page">
									<div class="account_grid">
										<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
										<img src="images/12.jpg" width="500" height="333">
                                        	<!--<h3>NEW CUSTOMERS</h3>
											<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
											<a class="acount-btn" href="register.html">Create an Account</a>-->
									   </div>
									   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
											<h3>REGISTERED USERS</h3>
											<p>If you have an account, Please log in.</p>
											<form name="form1" method="post" action="">
												<div>
													<span>Username<label>*</label></span>
													<input type="text" name="uid" autofocus required> 
												</div>
												<div>
													<span>Password<label>*</label></span>
													<input type="password" name="pass" required> 
												</div>
												<a class="forgot" href="#">Forgot Your Password?</a>
												<input type="submit" value="Login" name="log">
											</form>
									   </div>	
										<div class="clearfix"> </div>
									</div>
		
								</div>
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
	<?php include("footer.php");?>
	</div>
</body>
</html>