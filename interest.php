<?php 
include_once "process/logincheck1.php";

$no_visible_elements = "";
include('header.php'); 

include_once "lib/sm-connection.php";
include_once "lib/sm-constant.php";
include_once "lib/intfunctions.php";
							
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
						?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Interest Name</th>
								  <th>Show In App</th>
								  <th>Actions</th>
							  </tr>
						   </thead>   
						   <tbody>
						   
						  <?php
							$rv = aGetAllTags();
							if(count($rv) > 0){
							if(is_array($rv)){
								foreach ($rv as $rv1){
									echo "<tr>
											<td>".$rv1['tag']."</td>
											<td>";
											if($rv1['showInApp'] == 1){
												echo "<span class='label-success label label-default'>Yes</span>";
											} else {
												echo "<span class='label-warning label label-default'>No</span>";
											}
											echo "</td>
											<td class='center'>
												<a class='btn btn-default' href='#' onclick='return confirm(\"Are you sure you want to delete the selected name? The action is not revesible\")'>
													<i class='icon-trash icon-white'></i> 
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