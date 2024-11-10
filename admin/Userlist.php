<?php
include("../Asset/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_GET["delID"]))
{
 $delQry="delete from tbl_user where user_id='".$_GET["delID"]."'";
  if($conn->query($delQry))
  {
?>
   <script>
   alert("Deleted");
   window.location="Userlist.php";
   </script>
<?php
}
else
{
?> 
  <script>
  alert("failed");
  window.location="Userlist.php";
  </script> 
<?php
}
}
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserLists</title>
</head>

<body>
<b>UserLists</b>
<form id="form1" name="form1" method="post" action="">
  <table width="873" height="208" border="1">
    <tr>
      <th width="30" height="76" scope="col">SI NO</th>
      <th width="59" scope="col">NAME</th>
      <th width="84" scope="col">GENDER</th>
      <th width="98" scope="col">CONTACT</th>
      <th width="65" scope="col">EMAIL</th>
      <th width="120" scope="col">PHOTO</th>
      <th width="120" scope="col">PROOF</th>
        <th width="74" scope="col">ACTION</th>
    </tr>
    <?php
   
 $selQry="select * from tbl_user";
  $row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  $i++;
 ?>
    
    <tr>
      <td height="124"><?php echo $i; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><?php echo $data["user_gender"]; ?></td>
      <td><?php echo $data["user_contact"]; ?></td>
      <td><?php echo $data["user_email"]; ?></td>
      <td><img src="../Asset/Files/User/<?php echo $data["user_photo"]; ?>" width="120" height="120" /></td>
      <td><img src="../Asset/Files/User/<?php echo $data["user_proof"]; ?>" width="120" height="120"/></td>
      <td><a href="Userlist.php?delID=<?php echo $data["user_id"];?>">Delete</a></td> 
      
    </tr>
    <?php
  }
  ?>
  </table>
</form>
</body>
</html>