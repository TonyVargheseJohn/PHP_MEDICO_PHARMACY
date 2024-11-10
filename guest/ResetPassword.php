<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
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
.p-viewer {
	z-index: 9999;
	position: absolute;
	left: 560px;
	margin-top: -60px;
}

#message {
  display:none;
  color: #000;
  position: relative;
  padding: 10px 10px;
  margin-top: 0px;
}

#message p {
  padding: 0px 35px;
  font-size: 12px;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

</style>
</head>

<body>
<p>
<a href="HomePage.php">←</a>
  <?php
session_start();
include("../Asset/connection/connection.php");
if(isset($_POST["btnreset"]))
{
	if($_POST["txtnew"]==$_POST["txtconfirm"])
	{
		$sela="select * from tbl_admin where admin_email='".$_SESSION["femail"]."'";
		$rowa=$conn->query($sela);
		$selu="select * from tbl_user where user_email='".$_SESSION["femail"]."'";
		$rowu=$conn->query($selu);
		
		if($dataa=$rowa->fetch_assoc())
		{
			$up="update tbl_admin set admin_password='".$_POST["txtnew"]."' where admin_email='".$_SESSION["femail"]."'";
			if($conn->query($up))
			{
				?>
				<script>
                alert("Password Changed");
                </script>
                <?php
			}
		}
		
		else if($datau=$rowu->fetch_assoc())
		{
			$up="update tbl_user set user_password='".$_POST["txtnew"]."' where user_email='".$_SESSION["femail"]."'";
			if($conn->query($up))
			{
				?>
				<script>
                alert("Password Changed");
				window.location="Login.php";
                </script>
                <?php
			}
		}
		else
		{
			?>
            <script>
			alert("Invalid Details");
            </script>
            <?php
		}
	}
}
?>



</p>

</div>
</body>
</html>
<script src="../Asset/Jquery/jQuery.js"></script>
<script >
//--------------------------------Password Validation------------------------------------------------------ 

//password validation
var myInput = document.getElementById("txtnew");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

//--------------------------------Show Password Eye Icon------------------------------------------------------ 

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#txtnew');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});


//--------------------------------Confirm Password Validation------------------------------------------------------ 

function validateConfirmPassword() 
{
	var cpassword=document.getElementById("txtconfirm").value;
	var password=document.getElementById("txtnew").value;
	if(cpassword==password)
	{
		document.getElementById("scpassword").innerHTML = "";
		return true;
		}
    else
		document.getElementById("scpassword").innerHTML = "<span style='color: red;text: 12px;font-size: 14px;'>Password doesn't match</span>";
		elem.focus();
		return false;
}
</script>


<!doctype html>
<html lang="en">
  <head>
  	<title>Reset Password</title>
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
					<h2 class="heading-section">Reset Password</h2>
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
		      			<input type="password" name="txtnew" id="txtnew" size="35" class="form-control rounded-left" placeholder="New Password" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="txtconfirm" id="txtconfirm" onchange="validateConfirmPassword() " size="35" class="form-control rounded-left" placeholder="Confirm Password" required>
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
	            	<button type="submit" name="btnreset" class="btn btn-primary rounded submit p-3 px-5">Reset</button>
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



