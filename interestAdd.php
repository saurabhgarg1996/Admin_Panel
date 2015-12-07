<?php
include_once "process/logincheck1.php";
$no_visible_elements = "";
include('header.php');

?>
	<div class="row-fluid sortable">
		<div class="box span12">
					<div class="box-content">
						<?php
							if(isset($_REQUEST['in'])){
								if($_REQUEST['in'] == 1){
									echo "Record already exists";
								} if($_REQUEST['in'] == 2){
									echo "Record Inserted";
								} if($_REQUEST['in'] == 3){
									echo "There was an error";
								} 
							}
						?>
						<form class="form-horizontal" action="process/intProcess.php" method="post">

							<div class="control-group">
								<label class="control-label" for="Tag">Interest Name</label>
								<div class="controls">
								  <input class="input-xlarge" name="Tag" id="Tag" type="text" placeholder=""  required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="show">Show In App</label>
								<div class="controls">
								<div class="radio">
									<label>
									<input type="radio" name="showInApp" id="show" value="1" checked /> Yes
									</label>
									<label>
									<input type="radio" name="showInApp" id="show" value="0" /> No
									</label>
								</div>
								</div>
							</div>
							<br />
							 <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
							 </div>
						</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php
include('footer.php');
?>