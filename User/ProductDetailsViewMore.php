
<?php
ob_start();
include("Head.php");
include("../Asset/connection/connection.php");
if(isset($_POST["btn_submit"]))
{
  
  session_start();
$selqry="select * from tbl_booking where user_id='".$_SESSION["lgid"]."'";

$result=$conn->query($selqry);
if($result->num_rows>0)
{
  
  if($row=$result->fetch_assoc())
  {
    $bid = $row["booking_id"];
    
    
    
    $selqry="select * from tbl_cart where booking_id='".$bid."' and prod_id='".$_GET["pid"]."'";
    //echo $selqry;
    $result=$conn->query($selqry);
    if($result->num_rows>0)
    {
       echo "Already Added to Cart";
      
    }
    else
    {
    
     $insQry1="insert into tbl_cart(prod_id,booking_id)values('".$_GET["pid"]."','".$bid."')";
         if($conn->query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
                         echo"Failed";
                        }
    }
    
  }
  
}
else
{
  

$insQry=" insert into tbl_booking(user_id,booking_date)values('".$_SESSION["lgid"]."',curdate())";
      if($conn->query($insQry))
      {
        $selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=$conn->query($selqry1);
        if($row=$result->fetch_assoc())
        {
          $bid=$row["id"];
          
          
          $selqry="select * from tbl_cart where booking_id='".$bid."'and prod_id='".$_GET["id"]."'";
    $result=$conn->query($selqry);
    if($result->num_rows>0)
    {
       echo "Already Added to Cart";
      
    }
    else
    {
          
          
                     $insQry1="insert into tbl_cart(prod_id,booking_id)values('".$_GET["id"]."','".$bid."')";
                        if($conn->query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
                         echo"Failed";
                        }
            
    }

                }
      }
}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LuckysMart::Search Product</title>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">

        </head>

<body>
<form method="post">
<center>
<table width="1000" height="172" border="1" align="center">
  <tr>
  <?php

$searchQry="SELECT * FROM tbl_product p INNER JOIN tbl_subcat s ON p.subcat_id=s.subcat_id INNER JOIN tbl_category c ON s.cat_id=c.cat_id WHERE p.prod_id='".$_GET["pid"]."'";

$row=$conn->query($searchQry);
$i=0;
while($data=$row->fetch_assoc())
{
$i++;  

?>
<td>
<center>
<p align="center"><img src="../Asset/Files/Product/<?php echo $data["prod_img"]?>" width="120" height="120" /></p>
<p>Product Name:<?php echo $data["prod_name"];?></p>
<p>Product Description:<?php echo $data["prod_desc"];?></p>
<p>Product Price:<?php echo $data["prod_price"];?></p>
<p><input type="submit" name="btn_submit" id="btn_submit" value="Add to Cart" />  </p>

<?php
}
?>

    </body>
    <?php
ob_flush();
include("Foot.php");
?>
</html>