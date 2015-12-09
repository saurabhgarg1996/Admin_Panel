<?php
	include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/RatingFunctions.php";

//$owner_id= $_POST['owner_id'];
$user_id = $_POST['owne	_id'];
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
		insertintoservicesubcatrelation($data,$subcategory_id);	
	}
}
else {
	$response = "insert=failed";
}

?>