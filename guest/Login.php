<?php
include("../Asset/connection/connection.php");

session_start();

if(isset($_POST["btnLogin"]))
{
  $uname = $_POST["txtusername"];
  $password = $_POST["txtpassword"];
  
  $selQry = "select * from tbl_user where user_email='".$uname."' and user_password='".$password."'";
  $row=$conn->query($selQry);
  
  
  $selAdmin = "select * from tbl_admin where admin_email='".$uname."' and admin_password='".$password."'";
  $rowAdmin=$conn->query($selAdmin);
  
  
  if($data=$row->fetch_assoc())
  {
   $_SESSION["lgid"]=$data["user_id"];
   $_SESSION["lgname"]=$data["user_name"];
    $_SESSION["lemail"]=$data["user_email"];
   
   header("location:../User/HomePage.php");
  }
  
   else if($dataAdmin=$rowAdmin->fetch_assoc())
  {
   $_SESSION["lgid"]=$dataAdmin["admin_id"];
   
   $_SESSION["lgname"]=$dataAdmin["admin_name"];
   
   header("location:../admin/HomePage.php");
  }
  
  
  else
  {
	 
?>
    <script>
           alert("Invalid Username or Password");
     
   </script>
            
            <?php
  }
}
?>




<!doctype html>
<html lang="en">
  <head>
  	<title>Login 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Asset/Template/Login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">𝕄𝕖𝕕𝕚𝕔𝕠 ℙ𝕙𝕒𝕣𝕞𝕒</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(../Asset/Template/Login/images/bg.jpg);"></div>
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<p class="text-center"></p>
						<form action="#" class="login-form" method="post">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="email" name="txtusername" class="form-control" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="txtpassword" class="form-control" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="RecoveryPassword.php">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btnLogin" class="btn form-control btn-primary rounded submit px-3">Login</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<a href="Newuser.php"><p class="mb-0">Don't have an account?</p></a>
		          <a href="Newuser.php">Sign Up</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Asset/Template/Login/js/jquery.min.js"></script>
  <script src="../Asset/Template/Login/js/popper.js"></script>
  <script src="../Asset/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Asset/Template/Login/js/main.js"></script>

	</body>
</html>

