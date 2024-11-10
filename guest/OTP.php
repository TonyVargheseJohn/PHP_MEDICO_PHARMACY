<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verify OTP</title>
</head>

<body>
<?php
session_start();

if(isset($_POST["btnsubmit"]))
{
	if($_SESSION["token"]==$_POST["txtotp"])
	{
		?>
		<script>
		window.location="ResetPassword.php";
		</script>
		<?php
		
	}
	else
	{
		?>
		<script>
		alert("Invalid OTP");
		window.location="OTP.php";
		</script>
		<?php
		
	}
}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>OTP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Asset/Template/Recovery/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">OTP</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<!--<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>-->
		      	<h3 class="text-center mb-4"></h3>
						<form action="#" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" name="txtotp" id="txtotp" placeholder="6 digit code" class="form-control rounded-left" autocomplete="off" required>
		      		</div>
	            
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<!--<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>-->
								</div>
								<!--<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>-->
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary rounded submit p-3 px-5">Submit</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Asset/Template/Recovery/js/jquery.min.js"></script>
  <script src="../Asset/Template/Recovery/js/popper.js"></script>
  <script src="../Asset/Template/Recovery/js/bootstrap.min.js"></script>
  <script src="../Asset/Template/Recovery/js/main.js"></script>

	</body>
</html>


</body>
</html>