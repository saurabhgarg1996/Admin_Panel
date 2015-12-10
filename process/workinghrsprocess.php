<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/workinghrsfunction.php";


//$rating_id = 461;//$_POST['rating_id'];

$day = "IIT_JEE";//$_POST['day'];
$start_hour = "OF NO USE";//$_POST['start_hour'];
$end_hour = "www.bothraclasses.com";//$_POST['end_hour'];
$closed = 5;//$_POST['rating'];

$branch_id = 25;//$_POST['branch_id'];
$singleent_id = NULL;//$_POST['singleent_id'];
$freeservice_id = NULL;//$_POST['freeservice_id'];
$data = getAllratings();
$check = 0;
if($freeservice_id!=NULL){
	foreach ($data as $point)
	{
		if($point['freeserviceid']==$freeservice_id && $point['day']==$day )
		{
			$check=1;
		}
	} 
	}
else if ($branch_id!=NULL){
	foreach ($data as $point)
	{
		if($point['branch_id']==$branch_id && $point['day']==$day )
		{
			$check=1;
		}
	}
}
else if ($singleent_id!=NULL){
	foreach ($data as $point)
	{
		if($point['singleent_id']==$singleent_id && $point['day']==$day )
		{
			$check=1;
		}
	}
}
if (!empty($day) && $check==0 ) {
	$data = insertintoworkinghours($day,$start_hour,$end_hour,$closed,$branch_id,$singleent_id,$freeservice_id);
	}
	
else {
	$response = "insert=failed";
	echo "Review already given";
}

?>