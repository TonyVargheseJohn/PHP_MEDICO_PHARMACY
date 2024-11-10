<?php
ob_start();
include("Head.php");

    include("../Asset/connection/connection.php");

if(isset($_GET["aid"]))
{
	$up="update tbl_cart set presc_status=2 where booking_id='".$_GET["aid"]."'";
	$conn->query($up);
}
if(isset($_GET["rid"]))
{
	$up="update tbl_cart set presc_status=3 where booking_id='".$_GET["rid"]."'";
	$conn->query($up);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<br /><br /><br />
<form id="form1" name="form1" method="post" >
  <table border="1"align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Sl.no</td>
      <td >User Name</td>
      <td >Product Name</td>
      <td >Product Prescription</td>
    
    </tr>
    <?php

    $sel="select * from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_product p on c.prod_id=p.prod_id where c.presc_status=1";
	$row=$conn->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	
  ?>
  <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["user_name"];?></td>
      <td><?php echo $data["prod_name"];?></td>
      <td><a href="../Asset/Files/Product/<?php echo $data["prod_presc"];?>"><img src="../Asset/Files/Product/<?php echo $data["prod_presc"];?>"  width="150" height="150"/></a></td>
          


      
     </tr>
  
    <?php
	}
	?>
  </table>
</form>
</body>
<br>
<br><br><br><br><br><br><br><br><br><br>
</html>