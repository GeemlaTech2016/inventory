<?php
$test = isset($_SESSION["is_loged"])?$_SESSION["is_loged"]:'';
if(!$test){
	die("Access Denied");
}
?>