<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_complaint where comp_id='".$_GET["delID"]."'";
  if($conn->query($delQry))
  {
?>
   <script>
   alert("Deleted");
   window.location="ViewUserComplaints.php";
   </script>
<?php
}
else
{
?>	
  <script>
  alert("failed");
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
<title>ViewUserFeedback</title>
</head>

<body>
<center><i><h1><b><u>Feedback</u></b></h1></i></center>
<form id="form1" name="form1" method="post" action="ViewUserComplaints.php">
 <center> <table width="703" height="302" border="1">
    <tr>
      <th width="45" scope="col">Sl No</th>
      <th width="131" scope="col">Name Of User</th>
      <th width="163" scope="col"> Feeedback</th>
      <!--<th width="219" scope="col">Complaint Description</th>
      <th colspan="2" scope="col">Action</th>-->
      </tr>
     <?php
	$selectQry="select * from tbl_feedback c inner join tbl_user u on c.user_id=u.user_id ";
	$row=$conn->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>      <td><?php echo $i ?></td>
      <td><?php echo $data["user_name"] ?></td>
      <td><?php echo $data["feedback_details"] ?></td>
     <!-- <td><?php echo $data["comp_desc"] ?></td>-->
     <!-- <td width="111"><a href="ComplaintReply.php?ReplyID=<?php echo $data["comp_id"];?>"><center>Reply</center></a></td>
      <td width="111"><a href="ViewUserComplaints.php?delID=<?php echo $data["comp_id"];?>"><center>Delete</center></a></td>-->
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<p>&nbsp;</p>
</body>
</html>