<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	require '../Asset/phpMail/src/Exception.php';
require '../Asset/phpMail/src/PHPMailer.php';
require '../Asset/phpMail/src/SMTP.php';
$name=$_POST["txt_name"];
$gender=$_POST["radio"];
$contact=$_POST["txt_num"];
$email=$_POST["txt_email"];
$password=$_POST["txt_pass"];


$photo=$_FILES["file_photo"]["name"];
$path=$_FILES["file_photo"]["tmp_name"];
move_uploaded_file($path,"../Asset/Files/User/".$photo);

$proof=$_FILES["file_proof"]["name"];
$path1=$_FILES["file_proof"]["tmp_name"];
move_uploaded_file($path1,"../Asset/Files/User/".$proof);



$insertQry="INSERT INTO tbl_user(user_name,user_gender,user_contact,user_email,user_password,user_photo,user_proof)
VALUES('".$name."','".$gender."','".$contact."','".$email."','".$password."','".$photo."','".$proof."')";
 
  $selQrye="SELECT * FROM tbl_user where user_email='".$email."'";
$rowe=$conn->query($selQrye);
if(mysqli_num_rows($rowe)>0)
{
?>
<script>
alert("Email already in use");
location.href="Newuser.php";
	
</script>	
	
<?php	
}
else{
  if($conn->query($insertQry))
{
	$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pharmaceuticalmedico@gmail.com'; // Your gmail
    $mail->Password = 'xhqpjfwipzjsllui'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('pharmaceuticalmedico@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Your Account Creation is Completed";
    $mail->Body = "Hello"." ".$name." "."Your Account Creation is Completed ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }

 ?>
    <script>
     alert("Inserted");
     window.location="newuser.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="newuser.php";
</script>
<?php 
}
}
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="tab">
<br /><br /><br /><br />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="402" height="485" border="1" align="center">
    <tr>
      <td>Name:</td>
      <td><input type="text" name="txt_name" id="txt_name" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><input type="radio" name="radio" id="radio_m" value="male" />Male
         <input type="radio" name="radio" id="radio_f" value="Female" />
        Female</td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type="number" name="txt_num" id="txt_num" pattern="[0-9+]{10,13}" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="txt_email" id="txt_email" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="txt_pass" id="txt_pass"/></td>
    </tr>
    <tr>
      <td>Photo:</td>
      <td><input type="file" name="file_photo" id="file_photo" required /></td>
    </tr>
    <tr>
      <td>Proof:</td>
      <td><input type="file" name="file_proof" id="file_proof" required/></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></center></td>
    </tr>
  </table>
  <br />
  <hr />
  <br />
  <br />
  
</form>
</div>
</body>
<script src="../Asset/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Asset/AjaxPages/AjaxPlaces.php?did="+did,
	  success: function(html){
		$("#ddl_place").html(html);
	  }
	});
}
</script>
</html>
<br /><br /><br /><br />
<?php
ob_flush();
include("Foot.php");
?>