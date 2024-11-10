<?php

include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
  $reply=$_POST["txt_reply"];
  $insqry="UPDATE tbl_complaint SET comp_reply='".$reply."', comp_replydate	= curdate() WHERE comp_id ='".$_GET["ReplyID"]."'";
if($conn->query($insqry))
  {
?>
<script>
alert("Replied");
window.location="ViewUserComplaints.php";
</script>
<?php
  $upQry="update tbl_complaint set comp_status=1 where comp_id='".$_GET["ReplyID"]."'";	
  $conn->query($upQry);
  }
else
  {
?>
<script>
alert("Cannot Replied");
window.location="ViewUserComplaints.php";
</script>	
<?php	
  }
}	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComplaintReply</title>
</head>

<body>
<div>
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="368" height="466" border="1">
    <?php
if(isset($_GET["ReplyID"]))
{
$relQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where comp_id='".$_GET["ReplyID"]."'";
$row=$conn->query($relQry);
  	 while($data=$row->fetch_assoc())
	 {
?>

 <tr>
      <td width="125">Name Of User:</td>
      <td width="200"><?php echo $data["user_name"]?></td>
    </tr>
    <tr>
      <td>Subject:</td>
      <td><?php echo $data["comp_sub"]?></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><?php echo $data["comp_desc"] ?></td>
    </tr>
  <?php
  }
}
?>
    <tr>
      <td height="86">Reply Here:</td>
      <td><textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td height="86" colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></center></td>
    </tr>
  </table>
</form>
</center>
</div>
</body>
</html>