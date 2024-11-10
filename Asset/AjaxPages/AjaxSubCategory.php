<?php
  include("../connection/connection.php");
?>

<option value="">---select---</option>

<?php
    $sel="select * from tbl_subcat where cat_id='".$_GET["sid"]."'";
    $row=$conn->query($sel);
    while($data=$row->fetch_assoc())
    {
      ?>
            <option value="<?php echo $data["subcat_id"];?>"><?php echo $data["subcat_name"];?></option>
            <?php
      
    }
?>