<?php
$name=" ";
if(isset($_POST["but_calculate"]))
{
	$fname=$_POST["txt_f"];
	$lname=$_POST["txt_l"];
	$gender=$_POST["radio"];
	$status=$_POST["radio"];
	$salary=$_POST["txt_salary"];
	
	if($gender=="male")
	{
		$name="mr".$fname." ".$lname;
		
		}
	else
        {
		 if($status=="single") 
		 {  
		   $name="ms .".$fname." ".$lname;
		 }
		 else{	
		  $name="mrs .".$fname." ".$lname;
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

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="109">First Name</td>
      <td width="176"><textfield name="txt_name1" id="txt_name1" cols="10" rows="2">
        <input type="text" name="txt_f" id="txt_f" />
      </textfield></td>
    </tr>
    <tr>
      <td>Second Name</td>
      <td><textfeild f="txt_name2" id="txt_name2" cols="10" rows="2">
        <input type="text" name="txt_l" id="txt_l" />
      </textfeild></td>
    </tr>
    <tr>
      <td> Gender:</td> 
      <td>
      <input type="radio" name="btn_male" id="btn_male" value="male" />
      Male
      <input type="radio" name="btn_female" id="btn_female" value="female" />
      Female</td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="radio" id="btn_single" value="btn_single" />
        Single
        <input type="radio" name="radio" id="btn_married" value="btn_married" />
        Married</td>
    </tr>
    <tr>
      <td>Salary</td>
      <td><input type="text" name="txt_salary" id="txt_salary" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="but_calculate" id="but_calculate" value="Calculate" /></td>
    </tr>
  </table>
  <table border="1" cellpadding="10">
    <tr>
      <td width="58">Name</td>
      <td width="289"><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Status</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>TA</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>DA</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>HRA</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>LIC</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>PF</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>NET</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>