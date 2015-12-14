<?php
include_once "logincheck1.php";

$response= "";


include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/userfunctions.php";

//$owner_id= $_POST['owner_id'];
$full_name = $_POST['full_name'];
$pass = $_POST['pass'];
$email_id = $_POST['email_id'];
$isActive = $_POST['isActive'];
$user_address = $_POST['user_address'];
$dob = $_POST['dob'];
$date = time();
$gender = $_POST['gender'];
$created_at = date("Y-m-d H:i:s", $date); 
if (!empty($owner_id)) {
	$data = insertintousers($full_name, $pass,$email_id,$isActive,$user_address,$dob,$gender,$created_at);
	foreach($friend_names as $name)
	{
		insertintofriend($name,$data);
	}
	$response = "insert=success";
	 $target_dir = '/opt/lampp/htdocs/PHP/2/categoryimages/';
    $target_file = $target_dir."$data"."_icon.jpg";
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $categoryiconname = basename($_FILES['user_image']['name']);
    $check = getimagesize($_FILES["user_image"]["tmp_name"]);
    	if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
			$response="insert=success";
			updateCat($category_id);		
			header("location: ../catAdd.php?in=1");
		}
		else{
			$response = "insert=failed";
			header("location: ../catAdd.php?in=5");
         if($_SESSION['is_logged_in'] == false){
           header("Location: ../logout.php");
         }
		}
		    $target_file = $target_dir."$data"."_cover.jpg";
		    if (move_uploaded_file($_FILES["user_cover"]["tmp_name"], $target_file)) {
			$response="insert=success";
			updateCat($category_id);		
			header("location: ../catAdd.php?in=1");
		}
		else{
			$response = "insert=failed";
			header("location: ../catAdd.php?in=5");
         if($_SESSION['is_logged_in'] == false){
           header("Location: ../logout.php");
         }
		}
 
}
else {
	$response = "insert=failed";
}

?>	