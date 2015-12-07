<?php
	
include_once "../lib/sm-connection.php";
include_once "../lib/sm-constant.php";
include_once "../lib/intfunctions.php";
	
	$tag = $_POST['Tag'];
	$showInApp = $_POST['showInApp'];

	$chk = aGetAllTags();
		if(is_array($chk)){
			foreach ($chk as $chk1){
				$p1 = $chk1['tag'];

				if($p1 == $tag){
					//echo "Record already exists";
					header("location: ../interestAdd.php?in=1");
					exit();
				}
			}
		}

	if($tag != '' ){
			$pu = iInsertTags($tag, $showInApp, '', '');
				if(is_numeric($pu)){
					header("location: ../interestAdd.php?in=2");
					//echo "Record Inserted";
				} else {
					header("location: ../interestAdd.php?in=3");
					//echo "There was an error";
				}
		}
	
?>
