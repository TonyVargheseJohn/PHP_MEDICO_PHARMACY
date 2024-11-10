

<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
session_start();


if(isset($_POST["btn_submit"]))
{
	$feedback=$_POST["txt_feedback"];
	$user=$_SESSION["lgid"];
	$insertQry="INSERT INTO tbl_feedback(feedback_details,user_id)VALUES('".$feedback."','".$user."')";

 if($conn->query($insertQry))
{
 ?>
    <script>
     alert("Inserted");
     window.location="Feedback.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="Feedback.php";
</script>
<?php 
}
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<center>
<h2>Give Your Feedback </h2>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    
    <tr>
      <td>Feedback</td>
      <td><textarea name="txt_feedback" id="txt_feedback" cols="45" rows="5"></textarea></td>
    </tr>
     <tr>
    <td colspan="2"  align="center">
      <input type="submit" name="btn_submit" id="btn_submit"   value="submit" />
      </td>
  </tr>
  </table>
</form>
</center>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>