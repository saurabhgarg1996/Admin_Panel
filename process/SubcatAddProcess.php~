<?php
include_once "logincheck1.php";

$response= "";

include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/subcatfunctions.php";


//if(isset($_POST['submit'])){

$categoryid= $_POST['catid'];
$subcategoryname = $_POST['subcategoryname'];
$showinapp = $_POST['show_in_app'];
$subcategoryname = trim(htmlspecialchars($subcategoryname));


if(!empty($subcategoryname)){
	//$val = $_FILES["upload_subcategory_image"]["tmp_name"];
	if(!empty($_FILES["upload_subcategory_image"]["tmp_name"])){
		$up = iInsertSubCats($categoryid, $subcategoryname, $showinapp, '');
		if($up>0){
			
			$target_dir = "/opt/lampp/htdocs/PHP/2/categoryimages/";
			$target_file = $target_dir."$categoryid"."_"."$up"."_icon.jpg";
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$categoryiconname = basename($_FILES['upload_subcategory_image']['name']);
			$check = getimagesize($_FILES["upload_subcategory_image"]["tmp_name"]);
			if ( $check !== false ){
				header("location: ../subcatAdd.php?in=1");
				$response="insert=success";
			}
			if (file_exists($target_file)) {
				header("location: ../subcatAdd.php?in=2");
				$response="insert=failed";
			}
			if ($_FILES["upload_subcategory_image"]["size"] > 5000000){
				header("location: ../subcatAdd.php?in=3");
				$response="insert=failed";			
			}
			if ($imageFileType != "jpg"){
				header("location: ../subcatAdd.php?in=4");
				$response="insert=failed";			
			}	
			if ($response == "insert=success"){
					
				if (move_uploaded_file($_FILES["upload_subcategory_image"]["tmp_name"], $target_file)) {
					$response="insert=success";
					update($up,$category_id);					
				}
				else{
					$response = "insert=failed";
					header("location: ../subcatAdd.php?in=5");
               if($_SESSION['is_logged_in'] == false){
                 header("Location: ../logout.php");
               }
				}
			}
		}
		else{
			$response = "insert=failed";
			header("location: ../subcatAdd.php?in=6");
         if($_SESSION['is_logged_in'] == false){
          	header("Location: ../logout.php");
         }		
		}                     
	}
	else {
	header("location: ../subcatAdd.php?in=7");
    if($_SESSION['is_logged_in'] == false){
       header("Location: ../logout.php");
     }
	}
}
else {
	header("location: ../subcatAdd.php?in=8");
	 $response = "Please enter a Sub-category name.";
    if($_SESSION['is_logged_in'] == false){
        header("Location: ../logout.php");
    }
} 
//}
/*
else {
	header("location: ../subcatAdd.php?in=9");
	if($_SESSION['is_logged_in'] == false){
        header("Location: ../logout.php");
    }
}*/
?>