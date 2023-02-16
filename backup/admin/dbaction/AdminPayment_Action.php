<?php
include_once 'connect.php';


// Get the variables.
if ($_GET['payid']) {
  $payid = $_GET['payid'];
  $chkYesNo = $_GET['chkYesNo'];

  $update = mysqli_query($connect,"UPDATE payment_order SET PAYMENT_ORDER_Status='Approved' WHERE PAYMENT_ORDER_ID =$payid");

}


if ($_GET['payconsid']) {
  $payconsid = $_GET['payconsid'];
  $chkYesNo = $_GET['chkYesNo'];

  $update = mysqli_query($connect,"UPDATE payment_consultation SET PAYMENT_CONSULTATION_Status='Approved' WHERE 	PAYMENT_CONSULTATION_ID =$payconsid");

}
?>
