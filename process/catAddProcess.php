<?php
		include_once "logincheck1.php";

		$response= "";

		
		include_once "../lib/sm-connection.php";
		include_once "../lib/sm-constant.php";
		include_once "../lib/catfunctions.php";


		$categoryname = $_POST['categoryname'];
    	$categoryname = trim(htmlspecialchars($categoryname));
		$showinapp = $_POST['show_in_app'];
		if (!empty($categoryname))
		{
			 if(!empty($_FILES['upload_category_image']["tmp_name"])){
					$category_id = iInsertCats($categoryname,$showinapp);	
					if ($category_id>0){
						 $response = "insert=success";
						 $target_dir = '/opt/lampp/htdocs/PHP/2/categoryimages/';
                   $target_file = $target_dir."$category_id"."_icon.jpg";
                   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                   $categoryiconname = basename($_FILES['upload_category_image']['name']);
                   $check = getimagesize($_FILES["upload_category_image"]["tmp_name"]);
							
						if ( $check !== false ){
								header("location: ../catAdd.php?in=1");
								$response="insert=success";
						}
						if (file_exists($target_file)) {
							header("location: ../catAdd.php?in=2");
							$response="insert=failed";
						}
						if ($_FILES["upload_subcategory_image"]["size"] > 5000000){
							header("location: ../catAdd.php?in=3");
							$response="insert=failed";			
						}
						if ($imageFileType != "jpg"){
							header("location: ../catAdd.php?in=4");
							$response="insert=failed";			
						}	
						if ($response == "insert=success"){
					
								if (move_uploaded_file($_FILES["upload_category_image"]["tmp_name"], $target_file)) {
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
				}
		else{
			$response = "insert=failed";
			header("location: ../catAdd.php?in=6");
         if($_SESSION['is_logged_in'] == false){
          	header("Location: ../logout.php");
         }		
		}                     
	}
	else {
	header("location: ../catAdd.php?in=7");
    if($_SESSION['is_logged_in'] == false){
       header("Location: ../logout.php");
     }
	}
}
else {
	header("location: ../catAdd.php?in=8");
	 $response = "Please enter a Sub-category name.";
    if($_SESSION['is_logged_in'] == false){
        header("Location: ../logout.php");
    }
} 
?>				
