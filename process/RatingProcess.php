<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/RatingFuntions.php";


//$rating_id = 461;//$_POST['rating_id'];
$user_id = 2;//$_POST['user_id'];

$name = "IIT_JEE";//$_POST['name'];
$email = "OF NO USE";//$_POST['email'];
$message = "www.bothraclasses.com";//$_POST['message'];
$rating = 5;//$_POST['rating'];
$approval= 1;//$_POST['approval'];
$branch_id = 25;//$_POST['branch_id'];
$singleent_id = NULL;//$_POST['singleent_id'];
$freeservice_id = NULL;//$_POST['freeservice_id'];
$date = time();

$created_at = date("Y-m-d H:i:s", $date); 
$data = getAllworkinghrs();
$check = 0;
if($freeservice_id!=NULL){
	foreach ($data as $point)
	{
		if($point['freeserviceid']==$freeservice_id && $point['user_id']==$user_id )
		{
			$check=1;
		}
	} 
	}
else if ($branch_id!=NULL){
	foreach ($data as $point)
	{
		if($point['branch_id']==$branch_id && $point['user_id']==$user_id )
		{
			$check=1;
		}
	}
}
else if ($singleent_id!=NULL){
	foreach ($data as $point)
	{
		if($point['singleent_id']==$singleent_id && $point['user_id']==$user_id )
		{
			$check=1;
		}
	}
}
if (!empty($user_id) && $check==0 ) {
	$data = insertintoratings($user_id,$name,$email,$message,$rating,$approval,$branch_id,$singleent_id,$freeservice_id,$created_at);
	}
	
else {
	$response = "insert=failed";
	echo "Review already given";
}

?>
