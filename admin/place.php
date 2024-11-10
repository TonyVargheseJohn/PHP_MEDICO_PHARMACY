<?php
include("../Asset/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
$place=$_POST["txt_place"];		
$pin=$_POST["txt_pin"];
$disid=$_POST["ddlDistrict"];
$insertqry="INSERT INTO tbl_place(place_name,place_pincode,district_id) VALUES('".$place."','".$pin."','".$disid."')";
if($conn->query($insertqry))
{
 ?>
    <script>
     alert("Inserted");
     window.location="place.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="place.php";
</script>
<?php	
}
}
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
if($conn->query($delQry))
{
?>
<script>
alert("Deleted");
window.location="place.php";
</script>
<?php
}
else
{
?>	
<script>
alert("failed");
window.location="place.php";
</script>	
<?php
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
<form id="form1" name="form1" method="post" action="">
 <table width="304" border="1">
    <tr>
      <td>District Name</td>
      <td>
      <select name="ddlDistrict" id="ddlDistrict">
       <?php
   					$selQry="select * from tbl_district";
   					$row=$conn->query($selQry);
   					 while($data=$row->fetch_assoc())
   						{
		?>
        <option value="<?php echo $data["district_id"];?>"><?php echo $data["district_name"];?></option>
      <?php
	  
						}
						?>
      </select>
      
      
      </td>
    </tr>
    <tr>
      <td width="118">Place Name:</td>
      <td width="170"><input type="text" name="txt_place" id="txt_place"></td>
    </tr>
    <tr>
      <td>Pincode:</td>
      <td><input type="text" name="txt_pin" id="txt_pin"></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="Submit"></center></td>
    </tr>
  </table>
  <br />
  <hr />
  <table width="279" border="1">
    <tr>
      <th width="70" scope="col">Si No</th>
      <th width="98" scope="col">Place</th>
      <th width="98" scope="col">Pincode</th>
      <th width="89" scope="col">Action</th>
    </tr>
   
   
   <?php
   $selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
   $row=$conn->query($selQry);
   $i=0;
   while($data=$row->fetch_assoc())
   {
	   $i++;
	   ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["place_name"];?></td>
       <td><?php echo $data["place_pincode"];?></td>
        <td><?php echo $data["district_name"];?></td>
      <td><a href="place.php?delID=<?php echo $data["place_id"];?>">delete</a></td>
    </tr>
    <?php
   }
   ?>
  </table>
  <br />
</form>
</body>
</html>