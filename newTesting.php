<?php
$target_file = '~/';
if (move_uploaded_file($_FILES["upload_subcategory_image"]["tmp_name"], "$target_file")) {
	echo "Done";						
}
?>