<?php
include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
	include_once "../lib/freeservicefunction.php";
	
	$data = getAllfreeserviceid();
	
$date = time();
$current_time = date("Y-m-d H:i:s", $date);	
	foreach($data as $point)
	{
		if(strtotime($point['expiry'])<strtotime($current_time))
			updatefreeservice($point['id'],1);	
	}
	
	



?>
