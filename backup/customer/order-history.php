<?php
	session_start();
    include '../connect.php';

		if(!isset($_SESSION["CUSTOMER_Username"]) ){
    //header("Location:MainPage.php");
	}



  $userid=$_SESSION["CUSTOMER_ID"];











?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    <style media="screen">

    <?php //include 'navbar-css.php'; ?>

    @import url(https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700);
    /* 'container' class exists already in CF store */
    .container {
      width: 950px;
      margin: 0 auto;
      overflow: hidden;
    }

    .row {
      width: 100%;
      box-sizing: border-box;
    }
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    .order-breadcrumb {
      margin-bottom: 10px;
      color: #555;
      font-family: "Lato", sans-serif;
      font-weight: 300;
      font-size: 14px;
    }
    .order-breadcrumb a {
      color: #555;
      text-decoration: none;
      margin-right: 4px;
    }
    .order-breadcrumb a:hover {
      text-decoration: underline;
      color: #bada55;
    }
    .order-breadcrumb a.active {
      font-weight: 400;
      color: #bada55;
    }

    .title-row {
      font-family: "Lato", sans-serif;
      font-weight: 400;
      font-size: 30px;
      margin-bottom: 15px;
    }
    .title-row .page-title {
      width: 50%;
      float: left;
    }
    .title-row .page-title h1 {
      margin: 15px 0;
    }
    .title-row .search-orders {
      width: 50%;
      float: left;
      margin-top: 10px;
    }
    .title-row .search-orders input[type=text] {
      width: 75%;
      height: 24px;
      padding-left: 10px;
    }
    .title-row .search-orders input[type=submit] {
      border: none;
      background: #eee;
      border: 1px solid #ccc;
      border-radius: 2px;
      padding: 8px 10px;
      cursor: pointer;
    }
    .title-row .search-orders input[type=submit]:hover {
      background: #ddd;
    }

    .order_sorter {
      width: 100%;
      position: relative;
      padding-left: 5px;
      border-bottom: 1px solid #ddd;
      margin-bottom: 18px !important;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      font-size: 13px;
      line-height: 19px;
      color: #111;
      font-family: "Lato", sans-serif;
      font-weight: 300;
    }
    .order_sorter ul {
      display: block;
      margin: 0;
      padding: 0;
    }
    .order_sorter li {
      list-style: none;
      display: inline-block;
      margin: 0 50px 0 0;
      position: relative;
      bottom: -1px;
      border-bottom-width: 2px;
      border-bottom-style: solid;
      border-bottom-color: transparent;
      word-wrap: break-word;
    }
    .order_sorter li.first {
      margin: 0 5px;
    }
    .order_sorter li.selected {
      border-bottom-color: #bada55;
      font-weight: 700;
    }
    .order_sorter a {
      text-decoration: none;
      color: #555;
    }

    .download-all {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      text-align: center;
    }
    .download-all a.all-history {
      color: #555;
      font-size: 14px;
      font-weight: 300;
      text-decoration: none;
      padding: 6px 15px;
    }
    .download-all:hover {
      text-decoration: underline;
    }

    .post-sorter {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      margin: 25px 0;
      text-align: center;
    }
    .post-sorter .order-number {
      font-size: 13px;
      font-weight: 400;
    }
    .post-sorter .order-sorter {
      cursor: pointer;
      margin: 0 5px;
      border-radius: 2px;
    }

    select {
      border: 1px solid #111;
      background: transparent;
      width: 150px;
      padding: 5px 35px 5px 5px;
      font-size: 12px;
      border: 1px solid #ccc;
      height: 30px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background: url(data:image/gif;base64,R0lGODlhCwALAJEAAAAAAP///xUVFf///yH5BAEAAAMALAAAAAALAAsAAAIUnC2nKLnT4or00PvyrQwrPzUZshQAOw==) 96%/15% no-repeat #eee;
      background-size: 11px 11px;
    }

    /* CAUTION: IE hackery ahead */
    select::-ms-expand {
      display: none;
      /* remove default arrow on ie10 and ie11 */
    }

    .order-summary {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      margin: 0 auto;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    .order-summary div {
      border: 1px solid #ddd;
      border-radius: 2px;
      width: 23.75%;
      float: left;
      box-sizing: border-box;
      margin-right: 15px;
      text-align: center;
      border-left: 4px solid #bada55;
      padding: 10px;
    }
    .order-summary div:last-child {
      margin-right: 0;
    }
    .order-summary div h2 {
      font-size: 24px;
      font-weight: 400;
    }
    .order-summary div h3 {
      font-size: 14px;
      font-weight: 300;
      margin-top: 5px;
    }

    .order-container {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      font-size: 13px;
      border: 1px solid #ddd;
      background: #fff;
      margin-bottom: 15px;
    }
    .order-container .header {
      padding: 14px 18px;
      background: #fafafa;
      border-bottom: 1px solid #ddd;
    }
    .order-container .header .col-1 {
      float: left;
      width: 20%;
    }
    .order-container .header .col-2 {
      float: left;
      width: 15%;
    }
    .order-container .header .col-3 {
      float: left;
      width: 40%;
    }
    .order-container .header .col-4 {
      float: left;
      width: 25%;
    }
    .order-container .header span:nth-child(2) {
      display: block;
      font-weight: 600;
      margin-top: 4px;
    }
    .order-container .box {
      background: #fff;
      padding: 18px 18px;
    }
    .order-container .box img {
      max-width: 140px;
      border: 1px solid #ddd;
      box-shadow: 0;
      transition: box-shadow 0.5s;
    }
    .order-container .box img:hover {
      box-shadow: 0 0 3px #888;
    }
    .order-container .box .col-1 {
      float: left;
      width: 18%;
    }
    .order-container .box .col-2 {
      float: left;
      width: 62%;
    }
    .order-container .box .col-2 p {
      line-height: 1.4em;
      margin-bottom: 10px;
    }
    .order-container .box .col-2 .btn-default {
      width: 25%;
      font-size: 12px;
      padding: 5px;
    }
    .order-container .box .col-2 .error-title {
      width: 80%;
      text-align: center;
      margin: 10px 0;
      padding: 8px;
      border: 1px solid #ff3300;
      color: #ff3300;
    }
    .order-container .box .col-2 .product-title {
      font-size: 16px;
      font-weight: 400;
      display: block;
      margin-bottom: 5px;
    }
    .order-container .box .col-2 .product-title i {
      font-size: 12px;
      cursor: pointer;
      opacity: 0.5;
    }
    .order-container .box .col-3 {
      float: right;
      width: 20%;
    }
    .order-container .box a.btn-default {
      padding: 8px 0;
      background: #f3f3f3;
      border: 1px solid #ddd;
      color: #555;
      text-decoration: none;
      text-align: center;
      width: 100%;
      display: block;
      margin-bottom: 10px;
    }
    .order-container .box a.btn-default:hover {
      background: #eee;
    }
    </style>
  </head>
  <body>



    <?php //include 'navbar.php'; ?>

    <div class="container">
 <br><br>




 <div class="row title-row">
   <div class="page-title">
     <h1>Your Orders</h1>
   </div>

 </div>


 <div class="row order_sorter">
   <ul id="toggle-orders">
     <li class="first"></li>
     <li class="oh selected"><a href="#">Order History</a></li>
     <li class="fo"><a href="#">Pending/Future Orders</a></></li>
     <li class="com"><a href="#">Completed/Delivered</a></li>
   </ul>
 </div>



 <div class="row" id="order-history">


     <?php
		 $ress = mysqli_query($connect,"SELECT 	* FROM customer,cart,product,orders,payment_order WHERE cart.CART_CustID=customer.CUSTOMER_ID AND payment_order.PAYMENT_ORDER_OrderID=orders.ORDERS_ID AND  product.PRODUCT_ID =cart.CART_ProductID AND CART_ORDER_ID=orders.ORDERS_ID AND CART_CustID  =$userid
	GROUP BY orders.ORDERS_ID");


	while($row = mysqli_fetch_assoc($ress)):;



    echo " <div class='order-container'>";


echo "<div class='header'>";
  echo "<div class='row'>";
    echo "<div class='col-1'><span>ORDERS PLACED</span><span>".$row["ORDERS_Ordered_Date"]."</span></div>";
    echo "<div class='col-2'><span>TOTAL</span><span>".$row["PAYMENT_ORDER_Amount"]."</span></div>";
    echo "<div class='col-3'><span>ORDER#</span><span>".$row["ORDERS_ID"]."</span></div>";
    echo "<div class='col-8'><span>ORDER STATUS</span><span>".$row["ORDERS_Order_Status"]."</span></div>";

  echo "</div>";
echo "</div>";


$orderid=$row["ORDERS_ID"];

  $res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
  WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid GROUP by product.PRODUCT_ID");
  while($prodrow = mysqli_fetch_assoc($res)):;
  echo "<div class='box'>";
  echo "  <div class='row'>";
  echo "    <div class='col-1'>";
        echo " <img src='data:image;base64,".$prodrow["PRODUCT_Images"]."'width='80' height='80'>";
    echo "  </div>";
  echo "  <div class='col-2'>";
    echo "  <span class='product-title'>".$prodrow["PRODUCT_Name"]." <i class='fa fa-pencil-square-o aria-hidden=true'></i></span>";
  echo "    Total Quantity ".$prodrow["CART_Qty"]." <br>";
  echo "    Target Date: Aug 09, 2017 <br>";
  echo "    Billed On: Aug 09, 2017 <br>";
  echo "    Mailed: August 10, 2017</p>";
  echo "    <a href=# class='btn-default'><i class='fa fa-repeat aria-hidden=true'></i> Re-Order</a>";
  echo "  </div>";

  echo "    <div class=col-3>";
    echo "    <a class='btn-default' href=https://dashboard.stripe.com/emails/receipts/pmtrc_1IHYL1AdUBNlkal9ESj2wtah onclick=open(this.href).print(); return false  ><i class='fa fa-download aria-hidden=true'></i> Download</a>";
    echo "    <a href=https://cantikkathome.aftership.com/".$row["ORDERS_Tracking_No"]." class='btn-default'><i class='fa fa-truck aria-hidden=true'></i> Track</a>";
    echo "    <a href=# class='btn-default'><i class='fa fa-remove aria-hidden=true'></i> Cancel</a>";
    echo "  </div>";
		echo "  </div>";
		echo "  </div>";

endwhile;


echo "  </div>"; //order-container


endwhile;

 ?>



 </div><!-- end of Order History -->




 <div id="future-orders">


	      <?php
	 		 $ress = mysqli_query($connect,"SELECT 	* FROM customer,cart,product,orders,payment_order WHERE   orders.ORDERS_Order_Status ='Unprocessed' AND cart.CART_CustID=customer.CUSTOMER_ID AND payment_order.PAYMENT_ORDER_OrderID=orders.ORDERS_ID AND  product.PRODUCT_ID =cart.CART_ProductID AND CART_ORDER_ID=orders.ORDERS_ID AND CART_CustID  =$userid
	 	GROUP BY orders.ORDERS_ID");
 while($row = mysqli_fetch_assoc($ress)):;



	     echo " <div class='order-container'>";


	 echo "<div class='header'>";
	   echo "<div class='row'>";
	     echo "<div class='col-1'><span>ORDERS PLACED</span><span>".$row["ORDERS_Ordered_Date"]."</span></div>";
	     echo "<div class='col-2'><span>TOTAL</span><span>".$row["PAYMENT_ORDER_Amount"]."</span></div>";
	     echo "<div class='col-3'><span>ORDER#</span><span>".$row["ORDERS_ID"]."</span></div>";
	     echo "<div class='col-8'><span>ORDER STATUS</span><span>".$row["ORDERS_Order_Status"]."</span></div>";

	   echo "</div>";
	 echo "</div>";


	 $orderid=$row["ORDERS_ID"];

	   $res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
	   WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_Order_Status ='Unprocessed' AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid  GROUP by product.PRODUCT_ID");
	   while($prodrow = mysqli_fetch_assoc($res)):;
	   echo "<div class='box'>";
	   echo "  <div class='row'>";
	   echo "    <div class='col-1'>";
	         echo " <img src='data:image;base64,".$prodrow["PRODUCT_Images"]."'width='80' height='80'>";
	     echo "  </div>";
	   echo "  <div class='col-2'>";
	     echo "  <span class='product-title'>".$prodrow["PRODUCT_Name"]." <i class='fa fa-pencil-square-o aria-hidden=true'></i></span>";
	   echo "    Total Quantity ".$prodrow["CART_Qty"]." <br>";
	   echo "    Target Date: Aug 09, 2017 <br>";
	   echo "    Billed On: Aug 09, 2017 <br>";
	   echo "    Mailed: August 10, 2017</p>";
	   echo "    <a href=# class='btn-default'><i class='fa fa-repeat aria-hidden=true'></i> Re-Order</a>";
	   echo "  </div>";

	   echo "    <div class=col-3>";
	     echo "    <a href=# class='btn-default'><i class='fa fa-download aria-hidden=true'></i> Download</a>";
	     echo "    <a href=https://cantikkathome.aftership.com/".$row["ORDERS_Tracking_No"]." class='btn-default'><i class='fa fa-truck aria-hidden=true'></i> Track</a>";
	     echo "    <a href=# class='btn-default'><i class='fa fa-remove aria-hidden=true'></i> Cancel</a>";
	     echo "  </div>";
	 		echo "  </div>";
	 		echo "  </div>";

	 endwhile;


	 echo "  </div>"; //order-container


	 endwhile;

	  ?>


 </div><!-- end of future-orders -->








 <div id="completed-orders">


	 	      <?php
	 	 		 $ress = mysqli_query($connect,"SELECT 	* FROM customer,cart,product,orders,payment_order WHERE cart.CART_CustID=customer.CUSTOMER_ID AND   orders.ORDERS_Order_Status ='Completed' AND payment_order.PAYMENT_ORDER_OrderID=orders.ORDERS_ID AND  product.PRODUCT_ID =cart.CART_ProductID AND CART_ORDER_ID=orders.ORDERS_ID AND CART_CustID  =$userid
	 	 	GROUP BY orders.ORDERS_ID");
	  while($row = mysqli_fetch_assoc($ress)):;



	 	     echo " <div class='order-container'>";


	 	 echo "<div class='header'>";
	 	   echo "<div class='row'>";
	 	     echo "<div class='col-1'><span>ORDERS PLACED</span><span>".$row["ORDERS_Ordered_Date"]."</span></div>";
	 	     echo "<div class='col-2'><span>TOTAL</span><span>".$row["PAYMENT_ORDER_Amount"]."</span></div>";
	 	     echo "<div class='col-3'><span>ORDER#</span><span>".$row["ORDERS_ID"]."</span></div>";
	 	     echo "<div class='col-8'><span>ORDER STATUS</span><span>".$row["ORDERS_Order_Status"]."</span></div>";

	 	   echo "</div>";
	 	 echo "</div>";


	 	 $orderid=$row["ORDERS_ID"];

	 	   $res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
	 	   WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_Order_Status ='Completed' AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid  GROUP by product.PRODUCT_ID");
	 	   while($prodrow = mysqli_fetch_assoc($res)):;
	 	   echo "<div class='box'>";
	 	   echo "  <div class='row'>";
	 	   echo "    <div class='col-1'>";
	 	         echo " <img src='data:image;base64,".$prodrow["PRODUCT_Images"]."'width='80' height='80'>";
	 	     echo "  </div>";
	 	   echo "  <div class='col-2'>";
	 	     echo "  <span class='product-title'>".$prodrow["PRODUCT_Name"]." <i class='fa fa-pencil-square-o aria-hidden=true'></i></span>";
	 	   echo "    Total Quantity ".$prodrow["CART_Qty"]." <br>";
	 	   echo "    Target Date: Aug 09, 2017 <br>";
	 	   echo "    Billed On: Aug 09, 2017 <br>";
	 	   echo "    Mailed: August 10, 2017</p>";
	 	   echo "    <a href=# class='btn-default'><i class='fa fa-repeat aria-hidden=true'></i> Re-Order</a>";
	 	   echo "  </div>";

	 	   echo "    <div class=col-3>";
	 	     echo "    <a href=# class='btn-default'><i class='fa fa-download aria-hidden=true'></i> Download</a>";
	 	     echo "    <a href=https://cantikkathome.aftership.com/".$row["ORDERS_Tracking_No"]." class='btn-default'><i class='fa fa-truck aria-hidden=true'></i> Track</a>";
	 	     echo "    <a href=# class='btn-default'><i class='fa fa-remove aria-hidden=true'></i> Cancel</a>";
	 	     echo "  </div>";
	 	 		echo "  </div>";
	 	 		echo "  </div>";

	 	 endwhile;


	 	 echo "  </div>"; //order-container


	 	 endwhile;

	 	  ?>




 </div><!-- end of copleted-orders -->
</div><!-- container ends -->












<script type="text/javascript">
$('#future-orders').css('display','none');

$('#toggle-orders li').click(function () {
  $('#toggle-orders li').not(this).removeClass('selected');
  $(this).addClass('selected');
});


$('.fo').click(function () {
  $('#order-history').hide();
  $('#future-orders').fadeIn('slow');
  $('#completed-orders').hide();

});

$('.oh').click(function () {
  $('#order-history').fadeIn('slow');
	$('#completed-orders').hide();
	$('#future-orders').hide();


});

$('.com').click(function () {
  $('#completed-orders').fadeIn('slow');
  $('#future-orders').hide();
  $('#order-history').hide();

});

// By default, selecting 'Past 6 months' on dropdown selector
// $(function () {
//     $('select option[value="6months"]').prop('selected', true);
// });
</script>


<?php //include 'footer.php'; ?>


  </body>
</html>
