<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
session_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaintReplyView</title>
</head>

<body>
<div id="tab" align="center">
<center>
<table width="467" height="301" border="1">
  <tr>
    <td colspan="2"><b><center>Your Complaint Details</center></b></td>
  </tr>
   <?php
$selQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where comp_status='1' and c.user_id='".$_SESSION["lgid"]."'";
   
   $row=$conn->query($selQry);
   while($data=$row->fetch_assoc())
   {
   ?>
  <tr>
    <td width="238"><font color="red">Subject:</font></td>
    <td width="213"><?php echo $data["comp_sub"] ?></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><?php echo $data["comp_desc"] ?></td>
  </tr>
  <tr>
    <td>Replied To Your Complaint:</td>
    <td><?php echo $data["comp_reply"] ?></td>
  </tr>
  <?php
   }
  ?>
</table>
</center>
</div>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
