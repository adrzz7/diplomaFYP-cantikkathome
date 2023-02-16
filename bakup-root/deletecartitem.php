<?php
include_once 'connect.php';
// Get the variables.
$cart_detail_id= $_POST['cart_detail_id'];
// echo $appid;

//$delete = mysqli_query($connect,"DELETE FROM cart_product_details WHERE ConsultationID=$cart_detail_id");
if (!$connect -> query("DELETE FROM cart WHERE CART_DETAIL_ID =$cart_detail_id")) {
  echo("Error description: " . $mysqli -> error);



     }


?>
