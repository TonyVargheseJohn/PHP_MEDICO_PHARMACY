<?php
include("../connection/connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_product p inner join tbl_subcat sc on sc.subcat_id=p.subcat_id inner join tbl_category c on c.cat_id=sc.cat_id  where true ";
        $row = "SELECT count(*) as count from tbl_product p inner join tbl_subcat sc on sc.subcat_id=p.subcat_id inner join tbl_category c on c.cat_id=sc.cat_id  where true ";

if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND p.prod_name lIKE '".$name."%'";
            $row = $row." AND p.prod_name lIKE '".$name."%'";
        }
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.cat_id IN(".$category.")";
            $row = $row." AND c.cat_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND sc.subcat_id IN(".$subcategory.")";
            $row = $row." AND sc.subcat_id IN(".$subcategory.")";
        }
		

        $resultS = $conn->query($sqlQry);
        $resultR = $conn->query($row);
        
       
        $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Asset/Files/Product/<?php echo $rowS["prod_img"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["prod_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $rowS["prod_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["cat_name"]; ?><br>
                                            <?php echo $rowS["subcat_name"]; ?><br>
                                            
                                            
                                            <?php
											if($rowS["prod_prescription"]==1)
											{
												?>
												<p style="color:red"> This medicine need doctor Prescription <p>
                                               <?php  
											}
											?>
                                            
                                            
                                            
                                            
                                            
                                        </p>
                                       <?php
									   
									   $selstock1 = "select sum(cart_quantity) as stock from tbl_cart where prod_id='".$rowS["prod_id"]."'";
                        $resst1 = $conn->query($selstock1);
                    	$rowst1=$resst1->fetch_assoc();
						
									   
                                         $stock = "select sum(stock_quantity) as stock from tbl_productstock where prod_id = '" . $rowS["prod_id"] . "'";
											 $result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
											
											
											$stock = $row2["stock"] - $rowst1["stock"];
											
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS["prod_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        <a href="ProductDetailsViewMore.php?pid=<?php echo $rowS["prod_id"]; ?>" class="btn btn-warning btn-block">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>