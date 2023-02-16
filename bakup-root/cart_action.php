<?php
	session_start();
    include 'connect.php';
		if(!isset($_SESSION["CUSTOMER_Username"]) ) {
    header("Location:Login.php");
	}

$prodid = $_POST['prodid'];
$userid=$_SESSION['CUSTOMER_ID'];
$cartid=$_POST['cartid'];
$qty= $_POST['qtyy'];


	mysqli_query($connect,"INSERT INTO cart (CART_ProductID  ,CART_CartID,	CART_Qty,CART_CustID,CART_Buying_Status ) VALUES('$prodid','$cartid','$qty' , '$userid','Unbought' ) "   ) ;


 ?>
