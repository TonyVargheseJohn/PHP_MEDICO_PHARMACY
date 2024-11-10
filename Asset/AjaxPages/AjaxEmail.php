<?php 
  include("../connection/connection.php"); 
  $selu="select * from tbl_user where user_email='".$_GET["did"]."'"; 
  $rowu=$conn->query($selu); 
   
  if($data=$row->fetch_assoc()) 
  { 
   echo "Already Exist"; 
  } 
  else if($datau=$row->fetch_assoc()) 
  { 
   echo "Already Exist"; 
  } 
  else 
  { 
   echo ""; 
  } 
  ?>