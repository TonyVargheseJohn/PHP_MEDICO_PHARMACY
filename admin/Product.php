
<?php

include("../Asset/connection/connection.php");


if(isset($_POST["btn_submit"]))
{
$sub=$_POST["sel_subcat"];  
$prodname=$_POST["txt_name"];
$prodprice=$_POST["txt_price"];  
$proddesc=$_POST["txt_desc"];    
$subcat=$_POST["sel_subcat"];  
$company=$_POST["sel_company"];  
$prep=$_POST["cb_prep"];

$photo=$_FILES["file_image"]["name"];
$path=$_FILES["file_image"]["tmp_name"];
move_uploaded_file($path,"../Asset/Files/Product/".$photo);

if($prep!=" ")
{
	$status=1;
}



$insertqry="INSERT INTO tbl_product(prod_name,prod_price,prod_desc,prod_prescription,subcat_id,company_id,prod_img) VALUES('".$prodname."','".$prodprice."','".$proddesc."','".$status."','".$subcat."','".$company."','".$photo."')";


  $selQrye="SELECT * FROM tbl_product where prod_name='".$prodname."'";
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
     window.location="Product.php";
    </script>  
    
<?php
}
else
{
?>  
<script>
alert("Failed");
window.location="Product.php";
</script>
<?php
}
}
if(isset($_GET["delID"]))
{
  $delQry="delete from tbl_product where prod_id='".$_GET["delID"]."'";
  if($conn->query($delQry))
  {
  ?>
  <script>
  alert("Record Deleted");
  window.location="Product.php";
  </script>
  <?php
  }
  else
  {
    ?>
    <script>
    alert("Record Deletion Failed");
    window.location="Product.php";
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
<title>New Product</title>
</head>

<body>
  <div>
    <br><br><br><br>
    <a href="HomePage.php">←</a>
    <h2 align="center" >Add New Product</h2>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <th width="105" scope="row">Category</th>
      <td width="336"><select name="sel_category" id="sel_category" onChange="getSub(this.value)">
      <option value="">---SELECT---</option>
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
      <th scope="row">Subcategory</th>
      <td><select name="sel_subcat" id="sel_subcat">
      <option value="">--SELECT--</option>
       <?php
	    $selQry="select * from tbl_subcat";
	  $row=$conn->query($selQry);
      while($data=$row->fetch_assoc())
	  { 
	   ?>
       <option value="<?php echo $data["subcat_id"];?>"><?php echo $data["subcat_name"];?> </option>
           <?php
	  }
	  ?>
    </select>
    <label for="txt_subcat"></label></td>
    </tr>
     <tr>
      <th scope="row">Company</th>
      <td><select name="sel_company" id="sel_company">
      <option value="">--SELECT--</option>
      <?php
	  $selQry="select * from tbl_company";
	  $row=$conn->query($selQry);
      while($data=$row->fetch_assoc())
	  {
		  ?>
           <option value="<?php echo $data["company_id"];?>"><?php echo $data["company_name"];?> </option>
           <?php
	  }
	  ?>
    </select> <label for="txt_company"></label>
    <option value=""></option></td>
    </tr>
    <tr>
      <th scope="row">Product Name</th>
      <td><input type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
        <tr>
      <th scope="row">Prescription</th>
      <td><input type="checkbox" name="cb_prep" id="cb_prep" />
        Need Doctor Prescription</td>
    </tr>
    <tr>
      <th scope="row">Price</th>
      <td><input type="text" name="txt_price" id="txt_price" required autocomplete="off"/></td>
    </tr>
    <tr>
      <th height="135" scope="row">Product Description</th>
      <td><textarea name="txt_desc" id="txt_desc" cols="45" rows="5"></textarea required autocomplete="off"></td>
    </tr>
    <tr>
      <th height="68" scope="row">Product image</th>
      <td><input type="file" name="file_image" id="file_image" required /></td>
    </tr>
    <tr>
      <th height="49" colspan="2" scope="row"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          <input type="submit" name="btn_reset" id="btn_reset" value="Reset" /></th>
    </tr>
  </table>
  <br><br><br>
  <h2 align="center">All Products</h2>
  <table border="1" align="center">
<tr>
<td>SI.NO.</td>
<td>Product Name</td>
<td>Details</td>
<td>Image</td>
<td>Stock Quantity</td> 
<td>Description</td>
</tr>
<?php
$selQry="select * from tbl_product p inner join tbl_subcat s on p.subcat_id=s.subcat_id inner join tbl_company c on c.company_id=p.company_id";
$row=$conn->query($selQry);
$i=0;
while($data=$row->fetch_assoc())
{
  $i++;
  ?>
    
  <tr>
   <td><?php echo$i;?></td>
    <td><?php echo $data["subcat_name"];?></td>
    <td><?php echo $data["company_name"];?></td>
    <td><?php echo $data["prod_name"];?></td>
    <td><?php echo $data["prod_price"];?></td>
    <td><?php echo $data["prod_desc"];?></td>
    <td><img src="../Asset/Files/Product/<?php echo $data["prod_img"];?>" width="120" height="120" /></td>
    <td><a href="Product.php?delID=<?php echo $data["prod_id"];?>">Delete</a></td>
    <td><a href="Productstock.php?InsID=<?php echo $data["prod_id"];?>">Stock</a></td>
    
    </tr>
    <?php

}
?> 
</table>
<br><br><br>
</form>
</div>
</body>
<script src="../Asset/Jquery/jQuery.js"></script>
<script>
function getSub(cid)
{

  $.ajax({
    url:"../Asset/AjaxPages/AjaxSubCategory.php?sid="+cid,
    success: function(html){
    $("#sel_subcat").html(html);
    }
  });
}
</script>
<?php
?>

</html>
