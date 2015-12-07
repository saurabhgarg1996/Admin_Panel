<?php
$no_visible_elements = true;
include('header.php'); ?>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Mia Mia Admin</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login to continue.
            </div>
			<?php
						if(isset($_REQUEST['fail'])){
							if($_REQUEST['fail'] == 1){
								echo "<span style='color: green'><p>You have successfully logged out</p></span>";
							}
							if($_REQUEST['fail'] == 2){
								echo "<span style='color: red'><p>You have entered incorrect login credentials</p></span>";
							} if($_REQUEST['fail'] == 3){
								echo "<span style='color: red'><p>You do not have access to the requested area</p></span>";
							}
						}

						if(isset($_REQUEST['pass'])){
								if($_REQUEST['pass'] == 1){
									echo "<p style='color: green;'>The password has been updated; login with new password to continue.</p>";
								} else if($_REQUEST['pass'] == 2){
									echo "<p style='color: red;'>There was an error while updating your password.</p>";
								} else if($_REQUEST['pass'] == 3){
									echo "<p style='color: green;'>Your password has been emailed to your admin id.</p>";
								} else if($_REQUEST['pass'] == 4){
									echo "<p style='color: red;'>You have entered invalid admin email id.</p>";
								}
							}
			?>
            <form class="form-horizontal" action="process/logincheck.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Email Id" name="email">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="clearfix"></div>
					
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
<?php require('footer.php'); ?>