<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Profile</title>
</head>

<body>
<?php
ob_start();
include("Head.php");
session_start();
    include("../Asset/connection/connection.php");
	$selAdmin="select * from tbl_admin where admin_id='".$_SESSION["lgid"]."'";
	//echo $selAdmin;
	$row=$conn->query($selAdmin);
	$data=$row->fetch_assoc();
	?>
    <br /><br /><br />
     <h2 align="center">Your Profile</h2>
     <div id="tab" align="center">
<table border="1" cellpadding="10" align="center">
  <tr>
    <td>Name</td>
    <td><?php echo $data["admin_name"]?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["admin_email"]?></td>
  </tr>
</table>
</div>
</body>
<br /><br /><br /><br /><br /><br />
<?php

?>
</html>