<?php

$connect = mysqli_connect("localhost","root","","cantikkathome");


$orderid=$_GET['ORDERID'];
if (!$connect -> query("SELECT * FROM orders,product,cart,customer
WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid GROUP by product.PRODUCT_ID")) {
  echo("Error description: " . $connect -> error);
}

$res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid GROUP by product.PRODUCT_ID");
$total=0;



?>
