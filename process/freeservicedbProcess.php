<?php
include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/freeservicedbfunctions.php";

//$owner_id= $_POST['owner_id'];
$owner_id = 461;//$_POST['owner_id'];
$branch_id = 24;//$_POST['branch_id'];
$frees_name = $_POST['free_name'];
$free_description = $_POST['free_description'];
$counter = $_POST['count'];
$validity = $_POST['validity'];
$date = time();
$count = 1;
$created_at = date("Y-m-d H:i:s", $date); 
if (!empty($owner_id)) {
	$data = insertintofreeservicedb($owner_id, $branch_id,$frees_name,$free_description,$counter,$created_at,$validity);
}
else {
	$response = "insert=failed";
}

?>