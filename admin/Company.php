<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
$company=$_POST["txt_name"];
$date=$_POST["txt_date"];
$address=$_POST["txt_address"];
$insertqry="INSERT INTO tbl_company(company_name,company_startdate,company_address) VALUES('".$company."','".$date."','".$address."')";
 $selQrye="SELECT * FROM tbl_company where company_name='".$company."'";
$rowe=$conn->query($selQrye);
if(mysqli_num_rows($rowe)>0)
{
	?>
	<script>
     alert("Product already added");
     window.location="Product.php";
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
     window.location="Company.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed");
 window.location="Company.php";
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
<title>Untitled Document</title>
</head>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="131">Company Name</td>
      <td width="168"><input type="text" name="txt_name" id="txt_name" /></td>
       </tr>
       <tr>
      <td width="131">Start Date</td>
      <td width="168"><input type="text" name="txt_date" id="txt_date" /></td>
       </tr>
       <tr>
      <td width="131">Company Address</td>
      <td width="168"><textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>

       </tr>

    <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
  </table>
</form>