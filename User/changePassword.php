<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");

session_start();


if(isset($_POST["btn_submit"]))
{//main
	$oldpassword=$_POST["txt_oldpassword"];
	$newpassword=$_POST["txt_password"];
	$confirmpassword=$_POST["txt_newpassword"];
	
	
	$selQry ="select * from  tbl_user where user_id='". $_SESSION["lgid"]."'";
	$row=$conn->query($selQry);
	
		 if($data=$row->fetch_assoc())
	{//fetch
		if($data["user_password"]==$oldpassword)
		{//old
			if($newpassword==$confirmpassword)
		{//new
			$insertqry ="update tbl_user set user_password=' ".$newpassword."'where user_id='". $_SESSION["lgid"]."'";
	if($conn->query($insertqry))
	{//conn
?>
 
   <script>
     alert("Updated");
	// window.location="HomePage.php";
   </script>
   <?php
	}//conn
	else 
	
	{//conn
		?>
        <script>
		 alert("Mismatch");
		// window.location="HomePage.php";
		 </script>
         <?php
	}//conn
		}//new
		else
		{//new
		?>
	<script>
		 alert("Mismatch");
		// window.location="HomePage.php";
		 </script>
<?php
		}//new
		}//old
		else
		{//old
		?>
<script>
		 alert("Wrong Password");
		// window.location="HomePage.php";
		 </script>
<?php
		}//old
	}//fetch
}//main

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p align="center"> Change Password</p>
<form id="form1" name="form1" method="post" action="">
 <table border="1" cellpadding="10" align="center">
  <tr>
      <th scope="col">Old Password</th>
      <th scope="col"><input type="password" name="txt_oldpassword" id="txt_oldpassword" /></th>
    </tr>
    <tr>
      <th scope="col">New Password</th>
      <th scope="col"><input type="password" name="txt_password" id="txt_password" /></th>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
    <td colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="submit"/>
    <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel"/></center></td>
    </tr>
  </table>
  
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>