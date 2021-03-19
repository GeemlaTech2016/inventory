<?php
$currency = "N";
$conn=mysqli_connect("localhost:3306","root","newton","inventory2");


	if (array_key_exists("log",$_POST)) {

	  if(trim($_POST["uid"]) !=""){
	  $id=trim($_POST["uid"]);
echo $id;
		$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `login` WHERE `userid` = '$id'"));


		if (isset($user["userid"]) && $user["userid"] != "") {


			if ($user["password"] == trim($_POST["pass"])) {

					$user1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `login` WHERE `userid` = '$id'"));

							$_SESSION['role']=$user1["role1"];

							$_SESSION['password']=$user1["password"];


							$_SESSION["uid"] = $user1["userid"];

							$_SESSION["is_loged"] = true;

							$role=trim($_SESSION['role']);

							if(trim($role)=='admin'){
							header("Location:home.php");

							}elseif(trim($role)=='Sales'){
							header("Location:ms.php");
							}else{

							header("Location:index.php");
							}



			exit();
			}

			/*

				correct username but wrong

				password. increment login fail count

			*/

			else {?>

				<script type="text/javascript">

					alert("Invalid username or password");


					//return false;

				</script>

		<?php }

		}

		/*

				wrong username

		*/

		else{?>

			<script type="text/javascript">

					alert("Invalid username or password");

					//return false;

				</script>

	<?php }



		/*

			non existent user

		*/



	}

	else{?>

			<script type="text/javascript">

					alert("pls. enter your ID");

					//return false;

				</script>

	<?php }

}


?>
