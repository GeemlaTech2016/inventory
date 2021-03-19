<?php
$db_username        = 'root'; //MySqli database username
$db_password        = 'newton'; //MySqli dataabse password
$db_name            = 'inventory2'; //MySqli database name
$db_host            = 'localhost'; //MySqli hostname or IP

$currency			= 'N'; //currency symbol
$shipping_cost		= 1.50; //shipping cost
$taxes				= array( //List your Taxes percent here.
							'VAT' => 12, 
							'Service Tax' => 5,
							'Other Tax' => 10
							);

$mysqli_conn = new mysqli("localhost", "root", "newton","inventory2"); //connect to MySqli
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}