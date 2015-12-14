<?php
	include_once "../lib/userfunction.php";
	include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
	
	$user_id = 5;//$_POST['user_id'];
	$data = getuserbyid($user_id);
		
	$a=json_encode($data);
	
	echo 	$a;
?>