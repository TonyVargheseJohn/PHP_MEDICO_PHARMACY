<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
session_start();
ob_start();
include("Head.php");

  include("../Asset/connection/connection.php");
  if(isset($_POST["btn_proceed"]))
  {
	  require '../Asset/phpMail/src/Exception.php';
require '../Asset/phpMail/src/PHPMailer.php';
require '../Asset/phpMail/src/SMTP.php';
    $address=$_POST["txt_address"];
    $pin=$_POST["txt_pin"];
    $contact=$_POST["txt_contact"];
    $date=$_POST["txt_date"];
	$bid=$_SESSION["bid"];
	$email=$_SESSION["lemail"];
    
        $a = "update tbl_booking set booking_address='".$address."', booking_pin='".$pin."', booking_contact='".$contact."',booking_for_date='".$date."' where booking_id='".$_SESSION["bid"]."'";

  
      if($conn->query($a))
        {
          $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pharmaceuticalmedico@gmail.com'; // Your gmail
    $mail->Password = 'xhqpjfwipzjsllui'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('pharmaceuticalmedico@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Order Confirmation ";
    $mail->Body = ""." ".$name." "."Your Order is Confirmed ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
          
          if($_SESSION["pay"]=="true")
          {
            ?>
                    <script>
       
            window.location="Payment.php";
          </script>
  
    <?php
          }
          else
          {
            ?>
                    <script>
           
            window.location="MyBooking.php";
          </script>
  
    <?php
          }
        }
        else
        {
          echo "<script>alert('Failed')</script>";
        }
      
  }
  
  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Details</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p><strong>Booking Details</strong></p>
    <table width="538" height="428" border="1" cellpadding="10">
      
      <tr>
        <th scope="row"><p>Address</p></th>
        <td><textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <th scope="row">Pin</th>
        <td><input type="text" name="txt_pin" id="txt_pin" /></td>
      </tr>
      <tr>
        <th scope="row">Contact</th>
        <td><input type="text" name="txt_contact" id="txt_contact" /></td>
      </tr>
      <tr>
        <th scope="row">Delivery Date</th>
        <td><input type="date" name="txt_date"/></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="submit" name="btn_proceed" id="btn_proceed" value="Proceed" /></th>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>