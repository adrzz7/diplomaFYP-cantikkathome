<?php
include_once 'connect.php';

// Get the variables.
$orderid = $_GET['orderid'];

$res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid AND cart.CART_CustID = customer.CUSTOMER_ID");
?>

<!DOCTYPE html>
<html>
<head>
<title>Orders Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #6F4B79;
}

/* Header/Blog Title */
.header {
  padding: 10px;
  font-size: 40px;
  text-align: center;
  background: white;
}


/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}


/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h3>OD<?php echo $orderid; ?></h3>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
    <h2>PRODUCT ORDERED</h2>
    <table class="order"  width="850px"  >


	<tr>
	<td colspan="5"><hr></td>
	</tr>
	<thead>
		<th colspan="2" >Product</th>
		<th colspan="1">Quantity</th>
		<th >Price Per Unit</th>
		<th >Total Price</th>
	</thead>
;

  <?php
  $total=0;
 while(  $row = mysqli_fetch_assoc($res) ):
   ?>
	<tr>
		<td style="text-align:center">
		<br>	<b><?php echo $row['PRODUCT_Name'];?> </b><br><br>
    <img src=data:image;base64,<?php echo $row['PRODUCT_Images']; ?> width="100px" /><br><br>
<br>
		</td>
		<td>
    <td style="text-align:center"><?php echo $row['CART_Qty'];?></td>
		</td>
		<td style="text-align:center"> RM <?php echo $row['PRODUCT_Price'];?></td>
		<td style="text-align:center"> RM <?php echo$row['PRODUCT_Price'] * $row['CART_Qty'];?></td>


	</tr>
  <tr>
	<td colspan="5"><hr></td>
	</tr>
	<tr>
  <td style="text-align:right" colspan="3"></td>
	</tr>
  <?php
  $total =$total + ($row['PRODUCT_Price'] * $row['CART_Qty'] );
  endwhile; ?>

</table>
<h2>TOTAL : RM <?php echo $total; ?></h2>

      </div>


  </div>
<?php $ress = mysqli_query($connect,"SELECT *
FROM orders,product,cart,customer
WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_CustID = customer.CUSTOMER_ID");
$custrow = mysqli_fetch_assoc($ress); ?>
  <div class="rightcolumn">
    <div class="card">
    <h2>CUSTOMER INFORMATION</h2>
      <h3>Name</h3>
      <p><?php echo $custrow['CUSTOMER_FirstName'];?> <?php echo  $custrow['CUSTOMER_LastName'];  ?> </p>
      <h3>Contact Number</h3>
      <p><?php echo  $custrow['CUSTOMER_ContactNum'];  ?> </p>
      <h3>Email</h3>
      <p><?php echo  $custrow['CUSTOMER_Email'];  ?> </p>
    </div>
    <div class="card">
      <h3>BILLING ADDRESS</h3>
      <p><?php echo  $custrow['CUSTOMER_Address'];  ?> </p>
    </div>

  </div>
</div>

</body>
</html>
