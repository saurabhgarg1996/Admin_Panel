<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/freeservicefunction.php";


//$rating_id = 461;//$_POST['rating_id'];

$user_id = 11;//$_POST['user_id'];
$freeservice_id = 5;//$_POST['freeservice_id'];
	$date = time();
$created_at = date("Y-m-d H:i:s", $date);
$days = 1; 
$expiry = date("Y-m-d H:i:s",strtotime("+2 minutes", strtotime($created_at))); 
echo "$expiry";
$consumed = 0;
	$data = getAllfreeserviceid();
	$check = 0;
	$used = 0;
	$expired = 0;
 foreach ($data as $point ){
	if($point['user_id']==$user_id && $point['freeservice_id']==$freeservice_id)
	{
		if($point['consumed']==1 )
			{
					$used = 1;
			}
		else if($point['expired']==0) {
			$check =1;
	}
}
}
if($used==1){
	echo "Free Service already used";
}
else if (!empty($user_id) && $check==0 ) {
	insertintofreeservices($user_id,$freeservice_id,$created_at,$expiry,$consumed,$expired);
	}
	
else {
	$response = "insert=failed";
	echo "Free Service already claimed";
}

?>