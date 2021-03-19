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
 <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src="js/jquery-1.10.2.min.js"></script>
        <script>
            $(window).load(function() {
                $(".se-pre-con").fadeOut("slow");
                $("#sdate").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
				$("#enddate").datepicker({
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
								<h2><a href="">INCOME & EXPENSE REPORT</a></h2>	
									
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
                                            <div class="col-md-12 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
												<h3>Income & Expense Report</h3><p>&nbsp;</p>
                   <form name="form1" method="post" action="">
		<table width="100%" class="table table-striped table-bordered table-hover">
                               <thead>
                                    <tr style="font-size:10px">
                                        
                                        <th>Start Date</th>
                                        <th><input type="text" name="sdate" id="sdate" autocomplete="off"></th>
                                        <th>End Date</th>
                                        <th><input type="text" name="enddate" id="enddate" autocomplete="off"></th>
                                        <th><input type="submit" name="find" id="find" value="Search" ></th>
                                    </tr>
                                </thead>
                                </table>		
                                </form>
                                <?php
								if(array_key_exists("find",$_POST)){
								?>
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                <tr>
                                                <td>
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                 <thead>
                                                 <tr style="font-size:12px">
                                        <th colspan="3">Income Report from <?php $_POST['sdate']. " to ".$_POST['enddate']?></th>
                                    </tr>
                                    <tr style="font-size:12px">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                 <tbody>
                               
                    <?php
					$b=0; 
					$totsales = 0.0;
					$q = mysqli_query($conn,"select * from sales where dot>='$_POST[sdate]' and dot<='$_POST[enddate]' order by dot asc");
					while($rs = mysqli_fetch_array($q)){
						$b++;
						$totsales = $totsales + $rs['totalprice'];
					?>            
        <tr class="" style="font-size:12px;">
                                      <td><?php echo $b?></td>
                                        <td><?php echo $rs['dot']?></td>
                                        <td><?php echo $rs['totalprice']?></td>
        </tr>
                    <?php
					}
					?>
                    <tr class="" style="font-size:12px;">
                                      <td></td>
                                        <td>Total:</td>
                                        <td><?php echo number_format($totsales,2);?></td>
        </tr>
                 </tbody>
                            </table>
</td>
<td>
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                 <thead>
                                                 <tr style="font-size:12px">
                                        <th colspan="3">Expense Report from <?php $_POST['sdate']. " to ".$_POST['enddate']?></th>
                                    </tr>
                                    <tr style="font-size:12px">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                 <tbody>
                               
                    <?php
					$b=0; 
					$totexp=0.0;
					$q = mysqli_query($conn,"select * from expenses where dot>='$_POST[sdate]' and dot<='$_POST[enddate]' order by dot asc");
					while($rs = mysqli_fetch_array($q)){
						$b++;
						$totexp = $totexp + $rs['amt'];
					?>            
        <tr class="" style="font-size:12px;">
                                      <td><?php echo $b?></td>
                                        <td><?php echo $rs['dot']?></td>
                                        <td><?php echo $rs['amt']?></td>
        </tr>
                    <?php
					}
					?>
                    <tr class="" style="font-size:12px;">
                                      <td></td>
                                        <td>Total:</td>
                                        <td><?php echo number_format($totexp,2);?></td>
        </tr>
                 </tbody>
                            </table>
</td>

                                                </tr>
                                                </table>
                              
                               <?php } ?>
                                          
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