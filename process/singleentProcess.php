<?php
include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/serviceBranchFunction.php";
include_once "../lib/ownerServiceFunction.php";
include_once "../lib/singleentfunction.php";
//$owner_id= $_POST['owner_id'];
$owner_id = 461;//$_POST['owner_id'];
$category_id = 24;//$_POST['category_name'];

$ent_name = "IIT_JEE";//$_POST['ent_name'];
$ent_details = "OF NO USE";//$_POST['ent_details'];
$ent_website = "www.bothraclasses.com";//$_POST['ent_website'];

$isActive = $_POST['isActive'];
$listingType = $_POST['listingType'];
$ProvidesFreeSrvc = $_POST['ProvidesFreeSrvc'];
$premiumStartDate = $_POST['premiumStartDate'];
$premiumEndDate = $_POST['premiumEndDate'];
$amount_paid = $_POST['amt_paid'];
	
$date = time();
$count = 1;
$created_at = date("Y-m-d H:i:s", $date); 
if (!empty($service_id)) {
	$data = insertintosingleent($owner_id, $category_id,$ent_name ,$ent_details,$ent_website,$isActive ,$listingType ,$ProvidesFreeSrvc ,$premiumStartDate ,$premiumEndDate,$amount_paid ,$created_at);
	$subcategory_ids = $_POST['subcategoryids'];
	foreach( $subcategory_ids as $subcategory_id ){
		insertintoservicesubcatrelation(NULL,$data,NULL,$subcategory_id);	
	}
	if!empty($_FILES["ent_icon"]["tmp_name"])
	{
		$target_dir = "/opt/lampp/htdocs/PHP/2/categoryimages/";
			$target_file = $target_dir."$data"."_icon.jpg";		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$ownericon_name = basename($_FILES['ent_icon']['name'][$key]);
			$check = getimagesize($_FILES["ent_icon"]["tmp_name"][$key]);
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
				if (move_uploaded_file($_FILES["ent_icon"]["tmp_name"][$key], $target_file)) {
						$response = "insert=success";
				}
				else {
					$response = "insert=failed";
				}
			}
	}
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