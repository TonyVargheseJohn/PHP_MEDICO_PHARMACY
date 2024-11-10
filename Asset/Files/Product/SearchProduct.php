<?php
include("../Asset/connection/connection.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
</head>

<body>
<center><u><h1><i>Search Your Medicine</i></h1></u></center>
<form id="form1" name="form1" method="post" action="">
 <center>
  <table width="433" border="1" cellpadding="10">
    <tr>
      <td width="174">Enter Product Name:</td>
      <td width="207"><input type="text" name="txt_product" id="txt_product" /></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_search" id="btn_search" value="Submit" /></center></td>
    </tr>
  </table>
  </center>
  <br>
  <hr>
    <table width="523" height="172" border="1">
  <tr>
  
  <?php
  if(isset($_POST["btn_search"]))
{
$product=$_POST["txt_product"];


  $searchQry="SELECT * FROM tbl_product p INNER JOIN tbl_company c on c.company_id=p.company_id  WHERE p.prod_name='".$product."'";
  	$row=$conn->query($searchQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
        <td>
  <p>Product Image: <img src="../Asset/Files/Product/<?php echo $data["prod_img"];?>" width="120" height="120" /></p>
  <p>Product Name: <?php echo $data["prod_name"];?></p>
  <p>Product Price: <?php echo $data["prod_price"];?></p>
  <p>Product Description: <?php echo $data["prod_desc"];?></p>      
  <p>Company Name: <?php echo $data["company_name"];?></p>
  <center><a href="Booking.php?InsID=<?php echo $data["prod_id"];?>">Add to Cart</a></center>
  </td>
    <?php
  if($i==4)
  {
    echo "</tr><tr>";
    
    $i=0;
  }
  }
}
  ?>
</form>


</html>