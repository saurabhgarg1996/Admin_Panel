<?php
	include_once "process/logincheck1.php";
	include('header.php'); 
	include_once "lib/sm-connection.php";
	include_once "lib/sm-constant.php";
	include_once "lib/catfunctions.php";
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
									echo "Record Updated";
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
									echo "No Change in Image";
								} if($_REQUEST['in'] == 8 ){
									echo "Imjefd";								
								} if($_REQUEST['in'] == 9 ){
									echo "Imhbfrj";								
								}
								
							}
							?>
           <?php     		
           if(isset($_REQUEST['id'])){
								$id = $_REQUEST['id'];
								$data = aGetCatById($id);
								$categoryid = $data['category_id'];
        echo '<form name="submit" role="form" enctype="multipart/form-data" method="post" action="process/catEditProcess.php?id='.$categoryid.'">';
				
							
								
								//print_r($data);
								echo "<div class='form-group'>
					
                    <label class='control-label' for='selectError'>Category Name</label>
                    <div class='controls'>
                        <input type='text' class='form-control' name='categoryname' style='width:45%' value='".$data["category_name"]."'/>
                    </div>
                </div>
				<div class='form-group'>
						  <label class='control-label' f>Current Icon</label>";
							echo "<br>";						   
						   
							$target_dir = "categoryimages/";
							$images = scandir($target_dir);
							$icon_name="$categoryid"."_icon.jpg";
							//echo $icon_name;
							foreach($images as $image){  if($image == $icon_name): 
								echo '<a name="changecategoryiconname" href="categoryimages/'.$image.'" target="_blank"> <img class='."'img'".' src="categoryimages/'.$image.'" style="width: 40px; height: 40px; background-color: #111; alignment-adjust: middle"> </a>';   
								endif; 
						  }
						  echo "<br>";		
						  echo "<br>";		
                   echo "<label class='control-label' for='selectError' >Upload New Icon</label>
                    <div class='controls'>
                        <input type='file' name='upload_category_image' id='' />
                    </div>
                </div>
				<div class='form-group'>
                    <label class='control-label' for='selectError'>Show in User App?</label>
					<div class='controls'>
                    
                        <select id='selectError' data-rel='chosen' name='show_in_app' width='170px' required>
                        ";
                        if ( $data["show_in_app"] == 1 ){
                          echo  "<option></option>
                            <option value='1' selected='selected'>---Yes---</option>
                            <option value='0'>---No---</option>		
                        </select>";
                        }
                        else {
                        echo  "<option></option>
                            <option value='1' >---Yes---</option>
                            <option value='0' selected='selected'>---No---</option>		
                        </select>";
                        }
                                            
               echo "</div>
                </div>
				<button type='submit' class='btn btn-info'>Submit</button>";
							} 
				?>				
				
				</form>
            </div>
            </div>
		</div><!--/span-->
	</div><!--/row-->
<?php 
include('footer.php'); 
?>