<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recovery</title>
<style>
.required {
  color: red;
}
span
{
	color: red;
	text: 12px;
	font-size: 14px;
	
}
</style>
</head>

<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("../Asset/connection/connection.php");
if(isset($_POST["btnotp"]))
{
$email=$_POST["txtemail"];
$email=test_input($email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
	?>
    <script>
    alert("Invalid email");
	window.location="RecoveryPassword.php";
	</script>
    <?php
    }	
else
{	
	
	$_SESSION["femail"]=$_POST["txtemail"];
	$ran=rand(100000,999999);
		$_SESSION["token"]=$ran;
	require '../Asset/phpMail/src/Exception.php';
require '../Asset/phpMail/src/PHPMailer.php';
require '../Asset/phpMail/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pharmaceuticalmedico@gmail.com'; // Your gmail
    $mail->Password = 'xhqpjfwipzjsllui'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('pharmaceuticalmedico@gmail.com'); // Your gmail
  
    $mail->addAddress($_POST["txtemail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Recover Password";
    $mail->Body = "Hello"." ".$name." "."Your OTP for New Password is"." ".$_SESSION["token"]."";
  if($mail->send())
  {

		?>
		<script>
	 window.location="OTP.php";
		
		</script>
        <?php
	
  }
  else
  {
		?>
		<script>
		    alert("Failed");
		
		</script>
        <?php
	
  }

}
  	}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<script src="../Asset/Jquery/jQuery.js"></script>
<script src="Validation.js"></script>




<!doctype html>
<html lang="en">
  <head>
  	<title>Account Recovery</title>
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
					<h2 class="heading-section">Account Recovery</h2>
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
		      		<div class="form-group"><span class="required">  *</span></p>
		      			<input type="email" name="txtemail" id="txtemail" placeholder="Email" size="35" onfocusout="validateEmail(this)" class="form-control rounded-left" required><span id="email"></span>
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
	            	<button type="submit" name="btnotp" id="btnotp" class="btn btn-primary rounded submit p-3 px-5">Send OTP</button>
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
