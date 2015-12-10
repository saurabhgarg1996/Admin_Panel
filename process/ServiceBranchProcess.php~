<?php
include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/serviceBranchFunction.php";

//$owner_id= $_POST['owner_id'];
$service_id = 461;//$_POST['service_id'];
$branch_name = 24;//$_POST['branch_name'];

$branch_email = "IIT_JEE";//$_POST['branch_email'];
$branch_contact_name = "OF NO USE";//$_POST['branch_contact_name'];
$branch_mobile_number = "www.bothraclasses.com";//$_POST['branch_mobile_number'];

$branch_landline_number = $_POST['branch_landline_number'];
$branch_address =$_POST['branch_address'];
$branch_area = $_POST['branch_area'];
$branch_city = $_POST['branch_city'];
$branch_pincode = $_POST['branch_pincode'];
$branch_state = $_POST['branch_state'];
$branch_country = $_POST['branch_country'];
$address = $branch_address.$branch_area.$branch_city.$branch_state.$branch_country.$branch_pincode;
$prepAddr = str_replace(' ','+',$address);
$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
$output = json_decode($geocode);
$branch_lat =  $output->results[0]->geometry->location->lat;
$branch_lng = $output->results[0]->geometry->location->lng;
$isEnabled = $_POST['isEnabled'];
$listingType = $_POST['listingType'];
$ProvidesFreeSrvc = $_POST['ProvidesFreeSrvc'];
$premiumStartDate = $_POST['premiumStartDate'];
$premiumEndDate = $_POST['premiumEndDate'];
$amount_paid = $_POST['amount_paid'];

$date = time();
$count = 1;
$created_at = date("Y-m-d H:i:s", $date); 
if (!empty($service_id)) {
	$data = insertintoserviceBranch($service_id, $branch_name,$branch_email ,$branch_contact_name,$branch_mobile_number,$branch_landline_number,$branch_address,$branch_area ,$branch_city ,$branch_pincode ,$branch_state ,$branch_country ,$branch_lat ,$branch_lng,$isEnabled ,$listingType ,$ProvidesFreeSrvc ,$premiumStartDate ,$premiumEndDate,$amount_paid ,$created_at);
	
	foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name ){	
			$target_dir = "/opt/lampp/htdocs/PHP/2/categoryimages/";
			$target_file = $target_dir."$data"."_image_"."$count".".jpg";		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$ownericon_name = basename($_FILES['images']['name'][$key]);
			$check = getimagesize($_FILES["images"]["tmp_name"][$key]);
			if($check!=false) {
				$response = "insert=success";
			}
			if (file_exists($target_file)) {
				$response = "insert=failed";
			}
			if ($_FILES["images"]["size"][$key] > 5000000) {
				$response = "insert=failed";
			}
			if ($imageFileType != "jpg") {
				$response = "insert=failed";
			}
			if ($response == "insert=success") {
				if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $target_file)) {
						$response = "insert=success";
				}
				else {
					$response = "insert=failed";
				}
			}
		$count = $count + 1;
		insertintoimages($data,NULL,NULL,"gallery",$tagetfile,$created_at);
	}
	$count = 1;
	foreach($_FILES["cover_image"]["tmp_name"] as $key=>$tmp_name ){
		$target_dir = "/opt/lampp/htdocs/PHP/2/categoryimages/";
			$target_file = $target_dir."$data"."_cover_"."$count".".jpg";		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$ownericon_name = basename($_FILES['cover_image']['name'][$key]);
			$check = getimagesize($_FILES["cover_image"]["tmp_name"][$key]);
			if($check!=false) {
				$response = "insert=success";
			}
			if (file_exists($target_file)) {
				$response = "insert=failed";
			}
			if ($_FILES["cover_image"]["size"][$key] > 5000000) {
				$response = "insert=failed";
			}
			if ($imageFileType != "jpg") {
				$response = "insert=failed";
			}
			if ($response == "insert=success") {
				if (move_uploaded_file($_FILES["cover_image"]["tmp_name"][$key], $target_file)) {
						$response = "insert=success";
				}
				else {
					$response = "insert=failed";
				}
			}
		$count = $count +1;		
		insertintoimages($data,NULL,NULL,"cover_image",$tagetfile,$created_at);
	}
	else {
		$response = "insert=failed";
	}

}
else {
	$response = "insert=failed";
}

?>