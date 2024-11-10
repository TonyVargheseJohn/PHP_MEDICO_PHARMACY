<?php

include("../Asset/connection/connection.php");

include("Head.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$conn->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["cat_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$conn->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select sum(cart_quantity) as id from tbl_cart ca inner join  tbl_product p on ca.prod_id=p.prod_id inner join tbl_subcat sc on sc.subcat_id=p.subcat_id inner join tbl_category c on c.cat_id=sc.cat_id  WHERE c.cat_id='".$data["cat_id"]."'";
	// echo $sel1;
	  
	  $row1=$conn->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Product Sales"
    }
  }
});
</script>

</div>
</body>
</html>
