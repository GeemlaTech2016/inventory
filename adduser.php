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
	$gettypes=mysqli_fetch_array(mysql_query($conn,"select * from login where userid='{$_GET["id"]}'"));	
}

if(isset($_POST['ok'])!=''){
	if($_POST['id']!=''){
		if(mysql_query($conn,"update login set password='{$_POST["password"]}',role1='{$_POST["rank"]}',status1='{$_POST["status1"]}' where userid='{$_POST["id"]}'")){
			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Admin Updated Successfully.
            </div>';	
		}else{
			$msg='<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Sorry! An error has occured, please try again.
                            		</div>';
		}
	}else{//u.userid, u.password, u.fullname
		if(mysqli_query($conn,"insert into login(userid,password,role1,status1) values('{$_POST["userid"]}','{$_POST["password"]}','{$_POST["rank"]}','{$_POST["status1"]}')")){
			$msg='<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Admin Added Successfully.
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
										if(mysqli_query($conn,"delete from login where userid='$del'"))
										//header("location:employees.php");
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
                $("#hiredate").datepicker({
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
								<h2><a href="">ADMINS</a></h2>	
									
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
												<h3>Add New Admin</h3><p><?php echo $msg?></p>
												<form name="form1" method="post" action="">
												<div>
													<span>User ID<label>*</label></span>
													<input type="text" name="userid" required value="<?php echo $gettypes['userid']?>"> 
												</div>
                                                <div>
													<span>Password<label>*</label></span>
													<input type="password" name="password" required value="<?php echo md5($gettypes['password'])?>"> 													  <input type="hidden" name="id" value="<?php echo $gettypes['userid']?>">
												</div>
                                                <div>
													<span>Rank/Department</span>
													<select name="rank">
                                                    <option value="admin" selected>Admin</option>
                                                    </select> 
												</div>
                                                <div>
													<span>Status</span>
													<select name="status1">
                                                    <option value="active">Active</option>
                                                   <option value="suspended">Suspended</option>
                                                   <option value="terminated">Terminated</option>
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
												<h3>All Admins</h3><p>&nbsp;</p>
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <thead>
                                    <tr style="font-size:12px">
                                        
                                        <th>User ID</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                    <?php
					$b=0; 
					$q = mysqli_query($conn,"select * from login where role1='ceo' or role1='admin' and status1 = 'active'");
					while($rs1 = mysqli_fetch_array($q)){
						$b++;
					
					?>            
        <tr class="" style="font-size:12px;">
                                        
                                       
                                        <td><?php echo $rs1['userid']?></td>
                                        <td><?php echo md5($rs1['password'])?></td>
                                        <td><?php echo $rs1['role1']?></td>
                                        <td><?php echo $rs1['status1']?></td>
                                       <td><a href="adduser.php?id=<?php echo $rs1['userid']?>">Edit</a>&nbsp;&nbsp;
                                       <a href="adduser.php?del=<?php echo $rs1['userid']?>">Delete</a></td>
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