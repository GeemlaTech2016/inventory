<?php
$test = isset($_SESSION["is_loged"])?$_SESSION["is_loged"]:'';
if($test){
	$ckp = mysqli_query($conn,"select * from products");
?>
<div class="top-nav">
					<ul class="nav1">
						<li><a href="home.php">Home</a></li>
                        <li><a href="profile.php">My Profile</a></li> 
						<li><a href="changepass.php">Change Password</a></li>	
                        <li><a href="out.php">Logout</a></li>	
                 	</ul>
                    <?php
			  while($rckp = mysqli_fetch_array($ckp)){
				if($rckp['totqty'] <= $rckp['reorderlevel']){	
					?>
                  <marquee scrolldelay="100" style="background:#F00; color:#FFF; font-weight:bold;"><?php echo "Quantity of ".$rckp['prodname']." has reached re-order level"?></marquee>
                  <?php
					}
				}
				  ?>	  
				</div>
                <?php
}else{
				?>
				<div class="top-nav">
					<ul class="nav1">
						<li><a href="">About</a></li>                                           
						<li><a href="index.php">Login</a></li>  
						<li><a href="">Contact</a></li>							
					</ul>
				</div>
                <?php
}
				?>