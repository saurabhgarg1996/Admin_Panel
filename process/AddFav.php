<?php
	include_once "../lib/userfunction.php";
	include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
	
	$user_id = 5;//$_POST['user_id'];
	$service_id =55;// $_POST['service_id'];
	$data = insertintofav($user_id,$service_id);
	echo 	$data;
																		
?>
