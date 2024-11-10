<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
$category=$_POST["txt_name"];
$insQry="insert into tbl_category(cat_name)values('".$category."')";
 $selQrye="SELECT * FROM tbl_category where cat_name='".$category."'";
$rowe=$conn->query($selQrye);
if(mysqli_num_rows($rowe)>0)
{
	?>
	<script>
     alert("Category already added");
     window.location="Category.php";
    </script>  
<?php
}


else
{
if($conn->query($insQry))
{
 ?>
    <script>
     alert("Inserted");
     window.location="Category.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="Category.php";
</script>
<?php	
}
}
}
?>
<br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center" width="500px">
    <tr>
      <td width="122">Category Name</td>
      <td width="111"><input type="text" name="txt_name" id="txt_name" /></td>
       </tr>
    <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
  </table>
</form>
</div>