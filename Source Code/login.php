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
			<div class="col-md-7 offset-md-2">
			<h2 class="pageTitle">Login</h2>
				<div class="block text-center">
        		<form id="login">
        		<div class="form-group">
        			<div class="row">
	        			<div class="col-md-3">
					    	<label for="uname">Username :</label>
						</div>
						<div class="col-md-9">
					    	<input type="text" class="form-control" id="uname" name="Username">
					    </div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
						    <label for="pword">Password :</label>
						</div>
						<div class="col-md-9">
						    <input type="password" class="form-control" id="pword" name="Password">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-9 offset-md-3">
		        		<button type="submit" class="btn btn-primary pull-left">Login</button>
		        	</div>
		        </div>
        	</form>
        </div>
        <div class="row">
			<div class="col-md-9 offset-md-3">
		        <div class="alert alert-danger sm-gap hide" id="loginError">
				  <strong>Error!</strong> Username or password invalid.
				  </div>
			</div>
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
    		$("#login").validate({
    			rules: {
    				Username : "required",
    				Password : "required"
    			},
				submitHandler: function(form) {
				    $.ajax({
				        type: "POST",
				        url: "system/handler/login_handler.php",
				        data: $(form).serialize(),
				        success: function(data)
						{
				          if(data == "FOUND"){
							window.location.href = "index.php";
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