<?php
		include_once "logincheck1.php";

		$response= "";

		
		include_once "../lib/sm-connection.php";
		include_once "../lib/sm-constant.php";
		include_once "../lib/catfunctions.php";
		include_once "../lib/subcatfunctions.php";

		$sub_category_id = $_REQUEST['id'];
		$categoryid= $_POST['catid'];
		$subcategoryname = $_POST['subcategoryname'];
		$subcategoryname = trim(htmlspecialchars($subcategoryname));
		$showinapp = $_POST['show_in_app'];
		
		//print_r($_POST);
		if (!empty($subcategoryname))
		{
			iUpdatesubCats($sub_category_id,$categoryid,$subcategoryname,$showinapp);	
			 if(!empty($_FILES['upload_subcategory_image']["tmp_name"])){
					
					
					
						 $response = "insert=success";
						 $target_dir = '/opt/lampp/htdocs/PHP/2/categoryimages/';
						 
                   $target_file = $target_dir."$categoryid"."_"."$sub_category_id"."_icon.jpg";
                   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                   $categoryiconname = basename($_FILES['upload_subcategory_image']['name']);
                   $check = getimagesize($_FILES["upload_subcategory_image"]["tmp_name"]);
                   if(unlink($target_file)){
                   	header("location: ../remSubCategories.php?in=1");
                   	}
                   else {
                   	header("location: ../remSubCategories.php?in=3");
                   	
                   	}
							
						if ( $check !== false ){
								header("location: ../remSubCategories.php?in=1");
								$response="insert=success";
								
						}
						if (file_exists($target_file)) {
							header("location: ../remSubCategories.php?in=2");
							$response="insert=failed";
							
						}
						if ($_FILES["upload_subcategory_image"]["size"] > 5000000){
							header("location: ../remSubCategories.php?in=3");
							$response="insert=failed";			
						}
						if ($imageFileType != "jpg"){
							header("location: ../remSubCategories.php?in=4");
							$response="insert=failed";			
						}	
						if ($response == "insert=success"){
								if (move_uploaded_file($_FILES["upload_subcategory_image"]["tmp_name"], $target_file)) {
									$response="insert=success";
									update($sub_category_id,$category_id);	
									header("location: ../remSubCategories.php?in=1");				
								}
								else{
									$response = "insert=failed";
									header("location: ../remSubCategories.php?in=5");
				               if($_SESSION['is_logged_in'] == false){
				                // header("Location: ../logout.php");
				               }
								}
						}
			                   
	}
	else {
	header("location: ../remSubCategories.php?in=7");
    if($_SESSION['is_logged_in'] == false){
       //header("Location: ../logout.php");
     }
	}
}
else {
	header("location: ../remSubCategories.php?in=8");
	 $response = "Please enter a Sub-category name.";
    if($_SESSION['is_logged_in'] == false){
        //header("Location: ../logout.php");
    }
} 
?>				
