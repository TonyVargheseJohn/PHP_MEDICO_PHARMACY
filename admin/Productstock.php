
<?php
ob_start();
include("Head.php");

$st="";
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$quantity=$_POST["txt_num"];
	$st=$_GET["InsID"];
$insertqry="INSERT INTO tbl_productstock(stock_quantity,stock_date,prod_id) VALUES('".$quantity."',curdate(),'".$st."')";
if($conn->query($insertqry))
{
 ?>
    <script>
     alert("Inserted");
     window.location="Productstock.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="Productstock.php";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" cellpadding="10" align="center">
    
    <tr>
      <td>Stock Quantity</td>
      <td><input type="text" name="txt_num" id="txt_num"/></td>
    </tr>
    <tr><center>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td></center>
    </tr>
  </table>
</form>
</body>
</html>