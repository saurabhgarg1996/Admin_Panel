<?php
	//include_once "logincheck1.php";

$response= "";


/*include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/freeservicefunction.php";
*/
$user_id =10;// $_POST['user_id'];

$target_dir='/opt/lampp/htdocs/PHP/2/categoryimages/';
$img = 'jsbdcnv fmkb fmkb mb,mvcbkcv';//$_POST['img'];
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $target_dir."$user_id"."_image.png";
$success = file_put_contents($file, $data);
echo $success ? "1" :"0"; 
?>