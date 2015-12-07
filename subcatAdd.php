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
			<div class="box-inner">
			
				<div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Elements</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
			<div class="box-content">
                <div class="form-group">
                		<?php
							if(isset($_REQUEST['in'])){
								if($_REQUEST['in'] == 2){
									echo "Record already exists";
								} if($_REQUEST['in'] == 1){
									echo "Record Inserted";
								} if($_REQUEST['in'] == 3){
									echo "Size of image exceeded";
								} if($_REQUEST['in'] == 4 ){
									echo "Image is not in correct format";								
								}
								if($_REQUEST['in'] == 5){
									echo "sjf";
								} if($_REQUEST['in'] == 6){
									echo "mhsd";
								} if($_REQUEST['in'] == 7){
									echo "Smjds";
								} if($_REQUEST['in'] == 8 ){
									echo "Imjefd";								
								} if($_REQUEST['in'] == 9 ){
									echo "Imhbfrj";								
								}
								
							}
							?>
                    <form name="submit" role="form" enctype="multipart/form-data" method="post" action="process/SubcatAddProcess.php">
					<label class="control-label" for="selectError">Select Category</label>
                    <div class="controls">
                    <div class="form-group">
                        <select id="selectError" data-rel="chosen" name="catid">
                            <?php
								$rv = aGetAllCats();
								if(count($rv) > 0){
									if(is_array($rv)){
										foreach ($rv as $rv1){
											echo "<option value='".$rv1['category_id']."'>".$rv1['category_name']."</option>";
										}
									}
								}
									
							?>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label" for="selectError">Sub Category Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="subcategoryname" style="width:45%"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label" for="selectError" >Upload Icon</label>
                    <div class="controls">
                        <input type="file" name="upload_subcategory_image" id="" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label" for="selectError">Show in User App?</label>
					<div class="controls">
                    
                        <select id="selectError" data-rel="chosen" name="show_in_app" width="170px" required>
                            <option></option>
                            <option value="1">---Yes---</option>
                            <option value="0">---No---</option>		
                        </select>
                    
                </div>
                </div>
				<button type="submit" class="btn btn-info">Submit</button>
				</form>
            </div>
            </div>
		</div><!--/span-->
	</div><!--/row-->
<?php 
include('footer.php'); 
?>