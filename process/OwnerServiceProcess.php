<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/ownerServiceFunction.php";

//$owner_id= $_POST['owner_id'];
$owner_id = 461;//$_POST['owner_id'];
$category_id = 24;//$_POST['category_id'];

$service_name = "IIT_JEE";//$_POST['service_name'];
$service_details = "OF NO USE";//$_POST['service_details'];
$service_website = "www.bothraclasses.com";//$_POST['service_website'];
$date = time();

$created_at = date("Y-m-d H:i:s", $date); 
if (!empty($category_id)) {
	$data = insertintoownerservices($owner_id,$category_id,$service_name,$service_details,$service_website,$created_at);
	$subcategory_ids = $_POST['subcategoryids'];
	foreach( $subcategory_ids as $subcategory_id ){
		insertintoservicesubcatrelation($data,NULL,NULL,$subcategory_id);	
	}
	if(!empty($_FILES["owner_image"]["tmp_name"])){	
		
		if($data>0)
		{
			$target_dir = "/opt/lampp/htdocs/PHP/2/categoryimages/";
			$target_file = $target_dir."$data"."_icon.jpg";		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$ownericon_name = basename($_FILES['owner_image']['name']);
			$check = getimagesize($_FILES["owner_image"]["tmp_name"]);
			if($check!=false) {
				$response = "insert=success";
			}
			if (file_exists($target_file)) {
				$response = "insert=failed";
			}
			if ($_FILES["owner_image"]["size"] > 5000000) {
				$response = "insert=failed";
			}
			if ($imageFileType != "jpg") {
				$response = "insert=failed";
			}
			if ($response == "insert=success") {
				if (move_uploaded_file($_FILES["owner_image"]["tmp_name"], $target_file)) {
						$response = "insert=success";
				}
				else {
					$response = "insert=failed";
				}
			}
		}
		else {
			$response = "insert=failed";		
		}
	}
	else {
		$response = "insert=failed";
	}

}
else {
	$response = "insert=failed";
}

?>