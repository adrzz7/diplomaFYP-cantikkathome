
<?php
session_start();

	include 'connect.php';
	if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Orders</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php include 'navbarcss.php'; ?>

</head>
<body>
	<?php include 'navbar.php'; ?>


 <!--main board-->
 <div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h1>ORDER</h1>
  </div>
</div>
        </div>
				<button id="basic" class="btn btn-primary">Print ticket</button>


			  <br>
		<table class=" table table-responsive table-hover table-sm table-bordered">
			<thead class="thead-dark">
					<tr class="text-center">
							<th> No</th>
              <th> Order ID</th>
              <th> Customer Name</th>
							<th> Address </th>
							<th> Contact Number </th>
							<th> Email</th>
              <tH > Ordered Date  </tH>
              <tH > Status  </tH>
              <tH > Tracking Number  </tH>
              <tH > Action </tH>

					</tr>
			</thead>

			<?php
$count =0;
				$res = mysqli_query($connect,"SELECT orders.ORDERS_ID ,customer.CUSTOMER_FirstName , customer.CUSTOMER_LastName , customer.CUSTOMER_Address , customer.CUSTOMER_ContactNum , customer.CUSTOMER_Email ,orders.ORDERS_Ordered_Date ,orders.ORDERS_Order_Status,orders.ORDERS_Tracking_No
					FROM orders, customer,product,cart
					WHERE cart.CART_CustID=customer.CUSTOMER_ID AND orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID
					GROUP BY orders.ORDERS_ID");


						$ability="";  	$state="";
						 while ($row = mysqli_fetch_assoc($res) )
						 {
								$orderid =$row['ORDERS_ID'];

							 if (  $row['ORDERS_Order_Status']== "Unprocessed"   )
							      $rowcolour ="table-danger";
          		else  if (  $row['ORDERS_Order_Status']== "Processing"   )
									 $rowcolour ="table-warning";
              else
                  $rowcolour ="table-success";


			?>

			<tr class="<?php echo $rowcolour ; ?> " >
        <td class="text-center"><?php $count++ ; echo $count ?>  </td>
        <td class="text-center"> OD<?php echo $row['ORDERS_ID']; ?>  </td>
					<td class="text-center"><?php echo $row['CUSTOMER_FirstName']; echo  $row['CUSTOMER_LastName'];  ?>  </td>
          <td > <?php echo $row['CUSTOMER_Address'];   ?>  </td>
          <td > <?php echo $row['CUSTOMER_ContactNum'];   ?>  </td>
          <td > <?php echo $row['CUSTOMER_Email'];   ?>  </td>
          <td > <?php echo $row['ORDERS_Ordered_Date'];   ?>  </td>
          <td > <?php echo $row['ORDERS_Order_Status'];?></td>
          <td > <?php echo $row['ORDERS_Tracking_No'];   ?>   </td>

					<td style="width:200px">


					       <button class='btn btn-primary' type='button'  value="<?php echo $orderid ?>" onclick="window.location.href='Admin_OrderDetail.php?orderid=<?php echo "$orderid"  ?>'" name='detailbtn' >DETAILS</button>
								 <button class='btn btn-primary' type='button'  data-toggle="modal" data-target="#editModal<?php echo $orderid ?>"  name='update' >UPDATE</button>
					</td>







			</tr>

<?php
include 'modalord.php';

}

?>
	  </table>


		<script>
		$('#basic').on("click", function () {
			$('.container').printThis({

		importCSS: true,            // import parent page css
		importStyle: true,
		pageTitle: "Ticket",
		base: false,       // add title to print page
		printDelay: 333,

			});
		});


		</script>

	</div>
	</div>
	<?php include 'script.php'; ?>
</body>
</html>
