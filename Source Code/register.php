<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Docmed</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('template/links.php'); ?>

</head>

<body id="top">
   
  <?php include_once('template/header.php'); ?>

	<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
			<div class="col-md-10 offset-md-1">
			<h2 c
			
			lass="pageTitle">Register</h2>
				<div class="block text-center">
        		<form id="register">
        		<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="fname">First Name :</label>
						</div>
						<div class="col-md-7">
					    	<input type="text" class="form-control" id="fname" name="FName">
					    </div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3 txt-right">
						    <label for="lname">Last Name :</label>
						</div>
						<div class="col-md-7">
						    <input type="text" class="form-control" id="lname" name="LName">
						</div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="dob">Date of Birth :</label>
						</div>
						<div class="col-md-7">
					    	<input type="date" class="form-control" id="dob" name="DOB">
					    </div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="gender">Gender :</label>
						</div>
						<div class="col-md-7">
					    	<select class ='form-control' name="Gender">
								<option value = "Female">Female</option>
								<option value = 'Male'>Male</option>
								<option value = 'Other'>Other</option>
                            </select>	
					    </div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="address">Address :</label>
						</div>
						<div class="col-md-7">
					    	<input type="text" class="form-control" id="address" name="Address">
					    </div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="uname">Username :</label>
						</div>
						<div class="col-md-7">
					    	<input type="text" class="form-control" id="uname" name="Username">
					    </div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="pword">Password :</label>
						</div>
						<div class="col-md-7">
					    	<input type="password" class="form-control" id="pword" name="Password">
					    </div>
					</div>
				</div>
				<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3 txt-right">
					    	<label for="cpword">Confirm Password :</label>
						</div>
						<div class="col-md-7">
					    	<input type="password" class="form-control" id="cpword" name="CPassword">
					    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-9 offset-md-3">
		        		<button type="submit" class="btn btn-primary pull-left">Register</button>
		        	</div>
		        </div>
        	</form>
			<div class="row">
    		 <div class="col-md-9 offset-md-3">
 			 <div class="alert alert-danger sm-gap hide"
			id="loginError">
          	<strong>Error!</strong> Username or Password is Invalid!
        </div>
      </div>
    </div>
  </div>
        </form>
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
  </div>
  </div>

<?php include_once('template/footer.php'); ?>


    <?php include_once('template/scripts.php'); ?>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#register").validate({
    			rules: {
    				FName: {
						required: true,
						minlength: 2
					},
					LName: {
						required: true,
						minlength: 2
					},
					DOB: {
						required: true
					},
					Gender: {
						required: true
					},
					Address: {
						required: true,
						minlength: 10
					},
					Username: {
						required: true,
						minlength: 5
					},
					Password: {
						required: true,
						minlength: 5
					},
					CPassword: {
						required: true,
						minlength: 5,
						equalTo : "#pword"
					}
    			},
				submitHandler: function(form) {
				    $.ajax({
				        type: "POST",
				        url: "system/handler/register_handler.php",
				        data: $(form).serialize(),
				        success: function(data)
						{
				          if(data == "DONE"){
							window.location.href = "login.php";
				          }
				          else{
				          	$("#loginError").fadeIn();
				          	setTimeout(function(){
				          		$("#loginError").fadeOut();
				          	},5000);
				          }
				        }
				    });
				}
			});
    	});
    </script>

  </body>
  </html>