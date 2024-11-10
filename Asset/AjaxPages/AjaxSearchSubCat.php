<?php
include("../connection/connection.php");
$selqry="select * from tbl_subcat where cat_id IN(".$_GET["data"].")";
$result=$conn->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
        <li class="list-group-item">
            <div class="form-check">
                <label class="form-check-label">
                    <input onchange="productCheck()"  type="checkbox" class="form-check-input product_check" value="<?php echo $row["subcat_id"]; ?>" id="subcategory"><?php echo $row["subcat_name"]; ?>
                </label>
            </div>
        </li>
    <?php 
}
?>
