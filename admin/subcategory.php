<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");

if(isset($_POST["btn_submit"]))
{
$sub=$_POST["txt_subcat"];  
$catid=$_POST["sel_category"];    
$insertqry="INSERT INTO tbl_subcat(subcat_name,cat_id) VALUES('".$sub."','".$catid."')";
 $selQrye="SELECT * FROM tbl_subcat where subcat_name='".$sub."'";
$rowe=$conn->query($selQrye);
if(mysqli_num_rows($rowe)>0)
{
	?>
	<script>
     alert("Subcategory already added");
     window.location="subcategory.php";
    </script>  

<?php
}
else
{

if($conn->query($insertqry))
{
 ?>
    <script>
     alert("Inserted");
     window.location="Subcategory.php";
    </script>  
    
<?php
}
else
{
?>  
<script>
alert("Failed");
 window.location="Subcategory.php";
</script>
<?php
}
}
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sub Category</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="552" height="282" border="1" cellpadding="10">
    <tr>
      <th width="200" scope="row">Category Name</th>
      <td width="300">
      <select name="sel_category" id="sel_category">
      <option value="">---select---</option>
       <?php
             $selQry="select * from tbl_category";
             $row=$conn->query($selQry);
              while($data=$row->fetch_assoc())
               {
    ?>
          
      <option value="<?php echo $data["cat_id"];?>"><?php echo $data["cat_name"];?> </option>
      <?php
    
            }
            ?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Sub Category Name</th>
      <td><input type="text" name="txt_subcat" id="txt_subcat" /></td>
    </tr>
    
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></th>
    </tr>
  </table>
</form>
</body>
</html>