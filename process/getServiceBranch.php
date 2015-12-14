<?php
	
	
include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/subcategorydetails.php";
$id =192;//$_POST['subcategory_id'];
$lat= 19.122829;//$_POST['userlat'];
$lng =72.9131101;//$_POST['userlng'];

$data = getAlldetails($id,$lat,$lng);

echo json_encode(array('servicebranchdata'=>$data));


?>


