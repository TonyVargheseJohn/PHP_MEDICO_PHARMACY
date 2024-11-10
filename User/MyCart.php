<?php
ob_start();
include("Head.php");

include("../Asset/connection/connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
            />
        <style>
            .product-image {
                float: left;
                width: 20%;
            }

            .product-details {
                float: left;
                width: 20%;
            }

            .product-price {
                float: left;
                width: 12%;
            }

            .product-quantity {
                float: left;
                width: 16%;
            }

            .product-removal {
                float: left;
                width: 9%;
            }

            .product-line-price {
                float: left;
                width: 12%;
                text-align: right;
            }

            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .product:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                content: "";
                display: table;
            }

            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                clear: both;
            }

            .group,
            .shopping-cart,
            .column-labels,
            .product,
            .totals-item {
                zoom: 1;
            }

            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .product .product-price:before,
            .product .product-line-price:before,
            .totals-value:before {
                content: "₹";
            }

            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }

            h1 {
                font-weight: 100;
            }

            label {
                color: #aaa;
            }

            .shopping-cart {
                margin-top: -45px;
            }

            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            .column-labels .product-image,
            .column-labels .product-details,
            .column-labels .product-removal {
                text-indent: -9999px;
            }

            /* Product entries */
            .product {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .product .product-image {
                text-align: center;
            }
            .product .product-image img {
                width: 100px;
            }
            .product .product-details .product-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .product .product-details .product-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .product .product-quantity input {
                width: 40px;
            }
            .product .remove-product {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
            }
            .product .remove-product:hover {
                background-color: #a44;
            }

            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #6b6;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }

            .checkout:hover {
                background-color: #494;
            }

            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 1px solid #eee;
                }

                .column-labels {
                    display: none;
                }

                .product-image {
                    float: right;
                    width: auto;
                }
                .product-image img {
                    margin: 0 0 10px 10px;
                }

                .product-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }

                .product-price {
                    clear: both;
                    width: 70px;
                }

                .product-quantity {
                    width: 100px;
                }
                .product-quantity input {
                    margin-left: 20px;
                }

                .product-quantity:before {
                    content: "x";
                }

                .product-removal {
                    width: auto;
                }

                .product-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .product-removal {
                    float: right;
                }

                .product-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }

                .product .product-line-price:before {
                    content: "Item Total: ₹";
                }

                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }


            label{
                margin: 0px 15px;
            }



            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }

            .switch2-checked{
                background-color: #2ecc71;
            }


        </style>
    </head>
    <?php
	
	$but = 0;
	
        if (isset($_POST["btn_checkout"])) {
                 
                 $amt = $_POST["carttotalamt"];
                
				if(isset($_POST["cb_checkout"]))
         {
           $_SESSION["pay"] = true;
         }
         else
         {
           $_SESSION["pay"] = false;
         }
                
                $selC = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.prod_id=c.prod_id  where b.user_id='" .$_SESSION["lgid"]. "'and b.booking_status='0'";
                $rs = $conn->query($selC);
                $row=$rs->fetch_assoc();
                
                
                $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where user_id='" .$_SESSION["lgid"]. "'";
                if($conn->query($upQry1))
                {
					$upQry1s = "update tbl_cart set cart_status='1' where booking_id='" .$row["booking_id"]. "'";
					if($conn->query($upQry1s))
					{
					  $_SESSION["bid"] = $row["booking_id"];
					  ?>
					  <script>
						 window.location="BookingDetails.php";
					  </script>
					  <?php
					}
                    
                }
               
          
        }


    ?>
    <body onload="recalculateCart()">
        <h1>Cart</h1>
       
            <div class="column-labels">
                <label class="product-price" style="width: 16%; text-align:center">Image</label>
                <label class="product-price" style="width: 19%; text-align:center">Details</label>	
                <label class="product-price" style="width: 8%; text-align:center">Price</label>
                
                <label class="product-price" style="width: 10%; text-align:center">Qty</label>
                <label class="product-price" style="width: 8%; text-align:center">Prescription</label>
                <label class="product-price" style="width: 9%; text-align:center">Remove</label>
                <label class="product-price" style="width: 12%; text-align:center">Total</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 50px">           
         <?php  
		 $flag=0;              
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id='" .$_SESSION["lgid"]. "' and booking_status='0' and cart_status=0";
               $res = $conn->query($sel);
                while ($row=$res->fetch_assoc()) {
					if($row["presc_status"]==2 || $row["presc_status"]==1)
					{
						$flag=1;
					}
                    $selPr = "select * from tbl_product where prod_id='" .$row["prod_id"]. "'";
                    $respr = $conn->query($selPr);
                    if ($rowpr=$respr->fetch_assoc()) {
						
						$selstock1 = "select sum(cart_quantity) as stock from tbl_cart where prod_id='".$rowpr["prod_id"]."'";
                        $resst1 = $conn->query($selstock1);
                    	$rowst1=$resst1->fetch_assoc();
						
						
                        $selstock = "select sum(stock_quantity) as stock from tbl_productstock where prod_id='".$rowpr["prod_id"]."'";
                        $resst = $conn->query($selstock);
                    if ($rowst=$resst->fetch_assoc()) {
						
						$stock = $rowst["stock"] - $rowst1["stock"];
            ?>

            <div class="product">
                <div class="product-image">
                    <img
                        src="../Asset/Files/Product/<?php echo $rowpr["prod_img"] ?>"
                        />
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo $rowpr["prod_name"] ?></div>
                    <p class="product-description">
                    <?php echo $rowpr["prod_desc"] ?>
                    </p>
                </div>
                <div class="product-price " style="padding-left:50px"><?php echo $rowpr["prod_price"] ?></div>
                <div class="product-quantity" style="margin-left:-25px">
                
                    <input alt="<?php echo $row["cart_id"] ?>" type="number" value="<?php echo $row["cart_quantity"] ?>" min="1" max="<?php echo $stock; ?>"/>
                </div>
                <div class="product-quantity" style="margin-left:-65px">
                	<?php
					
					if($row["presc_status"]=="1" ||  $row["presc_status"]=="2")
					{
						?>
                        <img src="outbox.png" width="30" height="30">
                        <?php
					}
					else if($rowpr["prod_prescription"]=="1" )
					{
						$but=1;
						?>
                        <img src="file.png" width="30" height="30" onClick="triggerFile()">
                    	<input alt="<?php echo $row["cart_id"] ?>" id="fileUpload"  onChange="handleFileSelect(this)" type="file" style="visibility:hidden" />
                        <?php
					}
					else if($rowpr["prod_prescription"]=="0")
					{
						?>
                        	<img src="prohibited.png" width="30" height="30">
                        <?php
					}
					?>
                </div>
                <div class="product-removal" style="margin-left:-95px">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="product-line-price" style="margin-left:-85px">
                    <?php
                        $pr = $rowpr["prod_price"];
                        $qty = $row["cart_quantity"];
                        $tot = (int)$pr * (int)$qty;
                        echo $tot;
                    ?>
                </div>
            </div>
            <?php
                    }
                }
              
                }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value=""/>
                </div>
            </div>
            <center>
            <span> COD </span>
                <label class="switch2 switch2-checked">

                    <input type="checkbox" name="cb_checkout" checked />
                    <div></div>


                </label>
                <span>Card Payment</span>
            </center>
            <?php
			echo $but;
			if($but==0)
			{
			
				//echo $flag;
        ?>
                <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
           <?php
			}	
		   ?>

        </div>
               
</form>
        <!-- partial -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
		
		
		function triggerFile(){
			
			$('#fileUpload').click();
			document.getElementById('fileUpload').addEventListener('change', handleFileSelect, false);
			
		}
		
		
		
		
		
		function handleFileSelect(evt) {
                var f = evt.target.files[0]; // FileList object
                var reader = new FileReader();
                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        var binaryData = e.target.result;
                        //Converting Binary Data to base 64
                        var base64String = window.btoa(binaryData);
                        //showing file converted to base64
 						var val = 'data:image/jpeg;base64,' + base64String;
						
						var form_data = new FormData();                  
    					form_data.append('file', f);
						form_data.append('id', evt.target.alt);
						
						$.ajax({
								url: 'uploadPresc.php', // <-- point to server-side PHP script 
								dataType: 'text',  // <-- what to expect back from the PHP script, if anything
								cache: false,
								contentType: false,
								processData: false,
								data: form_data,                         
								type: 'POST',
								success: function(php_script_response){
									location.reload();
								}
							 });
                    };
                })(f);
                reader.readAsBinaryString(f);
            }
		
		
        /* Set rates + misc */
        var fadeTime = 300;

        /* Assign actions */
        $(".product-quantity input").change(function() {
			
            $.ajax({
                url: "../Asset/AjaxPages/AjaxCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);

        });

        $(".product-removal button").click(function() {

            $.ajax({
                url: "../Asset/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });

        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });

            /* Calculate totals */
            var total = subtotal;

            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
					
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }

        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });

        }

        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </body>
    <?php
ob_flush();
include("Foot.php");
?>
</html>