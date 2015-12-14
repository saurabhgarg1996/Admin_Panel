<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/RatingFuntions.php";


//$rating_id = 461;//$_POST['rating_id'];
$user_id = $_POST['user_id'];

$name = NULL;//$_POST['name'];
$email = NULL;//$_POST['email'];
$message = $_POST['message'];
$rating = $_POST['rating'];
$approval= 1;//$_POST['approval'];
$branch_id = $_POST['branch_id'];
$singleent_id = $_POST['singleent_id'];
$freeservice_id = $_POST['freeservice_id'];
$date = time();

$created_at = date("Y-m-d H:i:s", $date); 
$data = getAllratings();
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
	if($branch_id!=0)
		$avgdata = getAllratingsbyid($branch_id,0,0);
	else if($singleent_id!=0)
		$avgdata = getAllratingsbyid(0,$singleent_id,0);
 else if($freeservice_id!=0)
		$avgdata = getAllratingsbyid(0,0,$freeservice_id);
			$rating = 0;$count=0;
		
		foreach($avgdata as $point)
		{
			$count=$count+1;
			$rating=$rating + $point['rating'];
		}
		$redata = $rating/$count;
		echo "Submitted Successfully ";
		if($branch_id!=0)
			updateservice_branch($branch_id,$rating);
	else if($singleent_id!=0)
		update_singleent($singleent_id,$rating);
 else if($freeservice_id!=0)
		updatefreeservice_id($freeservice_id,$rating);
		
	
	}
	
else {
	$response = "insert=failed";
	echo "Review already given";
}

?>
