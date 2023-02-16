<?php

$connect = mysqli_connect("localhost","root","","cantikkathome");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cantikkathome");
/*QUERY: ORDER HISTORY
select product.PRODUCT_ID, product.PRODUCT_Name,product.PRODUCT_Price,cart.CART_Qty,cart.CART_ORDER_ID
from product,cart,customer,order
where
      cart.CART_ProductID = product.PRODUCT_ID AND
      cart.CART_CustID = customer.CUSTOMER_ID AND
      order.ORDER_ID
      CART_Buying_Status ='Bought' AND
      customer.CUSTOMER_ID =3
GROUP BY  cart.CART_ORDER_ID */

?>
