<?php 
include_once "process/logincheck1.php";

$no_visible_elements = "";
include('header.php'); 
include_once "lib/sm-connection.php";
include_once "lib/sm-constant.php";
include_once "lib/catfunctions.php";
include_once "lib/subcatfunctions.php";

?>			
	<div class="row-fluid sortable">
		<div class="box span12">
					<div class="box-content">
						<?php
							if(isset($_REQUEST['delete'])){
								if($_REQUEST['delete'] != ''){
									$del = $_REQUEST['delete'];
									$up = aDeleteTags($del);
									if(is_numeric($up)){
										echo "There was an error";
									} else {
										echo "Record has been deleted";
									}
								}
							}											
						echo "<h3>Note: (black bg color to see transparent icons)</h3>";
						?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Sub Category</th>
								  <th>Status on App</th>
								  <th>Cats</th>
								  <th>Icon</th>
								  <th>Actions</th>
							  </tr>
						   </thead>   
						   <tbody>
						   
						  <?php
							$rv = aGetAllSubCats();
							if(count($rv) > 0){
							if(is_array($rv)){
								foreach ($rv as $rv1){
									echo "<tr>
											<td>".$rv1['sub_category_name']."</td>";
											
											if($rv1['show_in_app'] == 1){
												echo "<td><span class='label-success label label-default'>Active</span></td>";
											} else {
												echo "<td><span class='label-warning label label-default'>InActive</span></td>";
											}
									echo "<td>";
									
									$cat = md5($rv1['category_id']);
									$pu = aGetCatById($cat);
									//print_r ($pu);
										//for($i = 0; $i < count($pu); $i++){
											echo $pu['category_name'];
										//}
										
									echo "</td>
									<td>";
									$categoryid = $rv1['category_id'];
									$subcatid = $rv1['sub_category_id'];
									$target_dir = "categoryimages/";
									$images = scandir($target_dir);
									$icon_name="$categoryid"."_"."$subcatid"."_icon.jpg";
									//echo $icon_name;
									foreach($images as $image){  if($image == $icon_name): 
										echo '<a name="changecategoryiconname" href="categoryimages/'.$image.'" target="_blank"> <img class='."'img'".' src="categoryimages/'.$image.'" style="width: 40px; height: 40px; background-color: #111; alignment-adjust: middle"> </a>';   
										endif;                             
									}
									echo "</td>
									<td class='center'>
												<a class='btn btn-info' href='tags.php?delete=".md5($rv1['category_id'])."' onclick='return confirm(\"Are you sure you want to delete the selected name? The action is not revesible\")'>
													<i class='icon-view label-success'></i> 
														View
												</a>
											</td>
										  </tr>";
									}
								}
							}
						  ?>
						  </tbody>
						  </table>
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php 
include('footer.php'); 
?>