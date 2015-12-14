<?php
	include_once "../lib/userfunction.php";
	include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";

	$user_id  = $_POST['user_id'];
	$friends = $_POST['friends'];
	foreach($friends as $friend)
	{
		addintofriendlist($user_id,$friend);	
	}
?>