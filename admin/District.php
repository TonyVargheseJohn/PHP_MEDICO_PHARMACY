<?php

include("../Asset/connection/connection.php");

if(isset($_POST["submit"]))
{
	$district=$_POST["district_name"];
	$insertqry ="insert into tbl_district(district_name)values(' ".$district."')";
	if($conn->query($insertqry))
	{
?>
 
   <script>
     alert("inserted");
	 window.location="District.php";
   </script>
   <?php
	}
	else 
	{
		?>
        <script>
		 alert("failed");
		 window.location="District.php";
		 </script>
         <?php
	}

}


if(isset($_GET["delID"]))
{
	
	$delQry ="delete from tbl_district where district_id='".$_GET["delID"]."'";
	if($conn->query($delQry))
	{
?>
 
   <script>
     alert("Deleted");
	 window.location="District.php";
   </script>
   <?php
	}
	else 
	{
		?>
        <script>
		 alert("failed");
		 window.location="District.php";
		 </script>
         <?php
	}

}


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
 
 
 
<table border="1" cellpadding="10">
  <tr>
    <td>District</td>
    <td>
      <input type="text" name="district_name" id="district_name" />
    </td>
  </tr>
  <tr>
    <td colspan="2"  align="center">
      <input type="submit" name="submit" id="btn_submit"   value="Submit" />
      </td>
  </tr>
</table>
<br />
<hr />
<br />
<table border="1" cellpadding="10">
  <tr>
    <th scope="col">Si No</th>
    <th scope="col">District</th>
    <th scope="col"> Action</th>
  </tr>
  <?php
  $selQry="select * from tbl_district";
  $row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["district_name"];?></td>
    <td><a href="District.php?delID=<?php echo $data["district_id"];?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>


</form>
</body>
</html>