<?php
ob_start();
include("Head.php");
session_start();
include("../Asset/connection/connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_product p on p.prod_id=c.prod_id where booking_status>0 and cart_status>0";
$result=$conn->query($selqry);  
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Booking</title>
</head>

<body>
<div align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td> 
      <td>Name</td>
    <td>Name Of User</td>
    <td>Contact Of User</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Status</td>
    </tr>
     <?php
   $i=0;
  while($row=$result->fetch_assoc())
  {
                       $selO="select * from tbl_product where prod_id='".$row["prod_id"]."'";
                      $rowO=$conn->query($selO);
                      if($dataO=$rowO->fetch_assoc())
                      {
                        $Price=$dataO["prod_price"];
                      }
                      else
                      {
                        $Price=$row["prod_price"];
                      }
    
    $qty=$row["cart_quantity"];
  $price=$Price;
  $totalamt=$qty*$price;
     $i++;
  ?>
  <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["prod_name"];?></td>
      <td><?php echo $row["user_name"];?></td>
      <td><?php echo $row["user_contact"];?></td>
          <td><img src="../Asset/Files/Product/<?php echo $row["prod_img"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_quantity"];?></td>
          <td><?php echo $Price;?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          <?php
                
          if($row["booking_status"]==1 && $row["cart_status"]==1)
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
                        Order Completed / <a href="ShopComplaints.php?">Complaint</a> /<a href="ProductRating.php?pid=<?php echo $row["prod_id"]?>">Review</a>
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
</html>
<!--<?php
ob_flush();
include("Foot.php");
?>-->