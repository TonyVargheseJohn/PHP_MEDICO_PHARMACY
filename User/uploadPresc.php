<?php
session_start();
include("../Asset/connection/connection.php");
?>
<?php 
    
        $id = $_POST["id"];
        $photo=$_FILES["file"]["name"];
		$path=$_FILES["file"]["tmp_name"];
		move_uploaded_file($path,"../Asset/Files/Product/".$photo);
		echo $upQry = "update tbl_cart set prod_presc = '" .$photo. "' , presc_status=1 where cart_id='" .$id. "'";
        $conn->query($upQry);
    
?>
