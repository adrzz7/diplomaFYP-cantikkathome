<?php
	session_start();
    include 'connect.php';
	if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

	$userid=$_SESSION['CUSTOMER_ID'];


	$prodid = $_POST['prodid'];
	$cartid=$_POST['cartid'];
	$qty= $_POST['qtyy'];


	//	mysqli_query($connect,"INSERT INTO cart (CART_ProductID  ,CART_CartID,	CART_Qty,CART_CustID,CART_Buying_Status,CART_ORDER_ID ) VALUES('$prodid','$cartid','$qty' , '$userid','Unbought',"" ) "   ) ;

if (!$connect -> query("INSERT INTO cart (CART_ProductID  ,CART_CartID,	CART_Qty,CART_CustID,CART_Buying_Status,CART_ORDER_ID ) VALUES('$prodid','$cartid','$qty' , '$userid','Unbought','0' )")) {
  echo("Error description: " . $connect -> error);
}

if (isset($_POST['delid'])) {
	$cart_detail_id= $_POST['delid'];
	 mysqli_query($connect,"DELETE FROM cart WHERE CART_DETAIL_ID=$cart_detail_id");
}

?>

