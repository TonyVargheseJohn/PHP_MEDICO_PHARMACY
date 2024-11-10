<?php
$result="";
if(isset($_POST["add"]))
{
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$result=$num1+$num2;
}
if(isset($_POST["diff"]))
{
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$result=$num1-$num2;

}
if(isset($_POST["pro"]))
{
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$result=$num1*$num2;

}
if(isset($_POST["div"]))
{
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$result=$num1/$num2;
}
?>



<html>
<body>
<form method="POST">
<table border="1">
<tr>
<td>Number1</td>
<td> <input type="text" name="num1"></td>
</tr>
<tr>
<td>Number2</td>
<td> <input type="text" name="num2"></td>
</tr>
<tr>
<td colspan="2" align="center">  
<input type="submit" name="add" value="+">
<input type="submit" name="diff" value="-">
<input type="submit" name="pro" value="*">
<input type="submit" name="div" value="/">
</td>
</tr>
<tr>
<td>Result</td>
<td> <input type="text" name="result" value="<?php echo $result ?>"></td>
</tr>
</table>
</form>
</body>
</html>
