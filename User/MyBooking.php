<?php
ob_start();
include("Head.php");
session_start();
include("../Asset/connection/connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.prod_id=c.prod_id where b.booking_status = 1 and c.cart_status ='1' and  b.user_id='".$_SESSION["lgid"]."'";

//echo $selqry;
$result=$conn->query($selqry);	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
     
    </tr>
    
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_quantity"];
	$price=$row["prod_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["prod_name"];?></td>
          <td><img src="../Asset/Files/Product/<?php echo $row["prod_img"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_quantity"];?></td>
          <td><?php echo $row["prod_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          <?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        Product Packed 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==3)
					{
						?>
                        Product Shipped 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==4)
					{
						?>
                        Order Completed / <a href="ShopComplaints.php?">Complaint</a> /<a href="ProductRating.php?pid=<?php echo $row["product_id"]?>">Review</a>
                        <?php
					}
				
				
				?>
          </td>

  </tr>
  <?php
	}
	?>
  </table>
  
  
</form>
</div>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>