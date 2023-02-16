<?php
	session_start();
    include '../connect.php';
		if(!isset($_SESSION["CUSTOMER_Username"]) ) {
    header("Location:Login.php");
	}

	$userid=$_SESSION['CUSTOMER_ID'];

if (isset($_POST['prodid'])) {
	$prodid = $_POST['prodid'];
	$cartid=$_POST['cartid'];
	$qty= $_POST['qtyy'];


		mysqli_query($connect,"INSERT INTO cart (CART_ProductID  ,CART_CartID,	CART_Qty,CART_CustID,CART_Buying_Status ) VALUES('$prodid','$cartid','$qty' , '$userid','Unbought' ) "   ) ;

}

if (isset($_POST['delid'])) {
	$cart_detail_id= $_POST['delid'];
	 mysqli_query($connect,"DELETE FROM cart_product_details WHERE ConsultationID=$cart_detail_id");
}

 ?>
