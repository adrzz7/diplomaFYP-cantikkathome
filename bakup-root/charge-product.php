<?php
session_start();
require_once('vendor/autoload.php');
  require_once('connect.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

    if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:MainPage.php");
  }

  \Stripe\Stripe::setApiKey('sk_test_51IFtjgAdUBNlkal9jd6cXEOG6SupCrFw3we0wItHMgyHXLbUyuHGQ3shDqCWsmA4VGZJXPc1QaFppfvjbS1it6Lo00n6EuPTXy');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


 // Get Values
 $cartid = $_POST['cartid'];
 $totalpay = $_POST['tot'];

  //Order date vale
  $orderdate = date ('Y-m-d');


// mysqli_query($connect,"INSERT INTO orders (ORDERS_CartID  , ORDERS_Ordered_Date, ORDERS_Order_Status ,ORDERS_Tracking_No,ORDERS_Email_Status ) VALUES ( '$cartid', '$orderdate'  ,'Unprocessed','TXXX' ,'No' )") ;
 if (!$connect -> query("INSERT INTO orders (ORDERS_CartID  , ORDERS_Ordered_Date, ORDERS_Order_Status ,ORDERS_Tracking_No,ORDERS_Email_Status ) VALUES ( '$cartid', '$orderdate'  ,'Unprocessed','TXXX' ,'No' )")) {
   echo("Error description: " . $connect -> error);
 }


 $ressS = mysqli_query( $connect,"SELECT ORDERS_ID FROM orders WHERE ORDERS_CartID  = '$cartid' ORDER BY ORDERS_ID DESC " );
 if (!$connect -> query("SELECT ORDERS_ID FROM orders WHERE ORDERS_CartID  = '$cartid' ORDER BY ORDERS_ID DESC LIMIT 1")) {
   echo("Error description: " . $connect -> error);
 }

 $orderRow=mysqli_fetch_assoc($ressS);

 $orderid =$orderRow['ORDERS_ID'];

 echo $orderid;


 mysqli_query($connect,"INSERT INTO payment_order (  PAYMENT_ORDER_OrderID  , PAYMENT_ORDER_Payment_Date ,PAYMENT_ORDER_Status, PAYMENT_ORDER_Amount ) VALUES ( '$orderid', '$orderdate' ,'Unapproved','$totalpay'  )") ;


 $resss = mysqli_query($connect,"SELECT  CART_DETAIL_ID   FROM  cart WHERE CART_CartID = '$cartid' AND CART_Buying_Status='Unbought'");

 while( $row = mysqli_fetch_assoc($resss)){
   $new_array[] = $row; // Inside while loop
 }


 $orderdate = date ('Y-m-d');

 foreach ($new_array as $value) {

 $id= implode("",$value);

  mysqli_query($connect,"UPDATE cart SET CART_Buying_Status = 'Bought' WHERE CART_DETAIL_ID=$id ");
  mysqli_query($connect,"UPDATE cart SET CART_ORDER_ID = '$orderid' WHERE CART_DETAIL_ID=$id ");


 }

$userid=$_SESSION['CUSTOMER_ID'];
$query = "SELECT * FROM customer WHERE CUSTOMER_ID =$userid";
$result =mysqli_query($connect,$query);

$row = mysqli_fetch_assoc($result);



 $first_name = $row['CUSTOMER_FirstName'];
 $last_name = $row['CUSTOMER_LastName'];
 $email = $row['CUSTOMER_Email'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));


$totalpay = substr("$_POST[tot]" ,-3);
$totalpay = $totalpay."00";
$orderid =  "ORDER ID :".$orderid ;

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $totalpay,
  "currency" => "myr",
  "description" => $orderid,
  "customer" => $customer->id,

));


require 'vendor/autoload.php';

$options = array(
  'cluster' => 'ap1',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  '7c98d2d88d8aa1a10b30',
  '92ddfe988252e10aa791',
  '1151462',
  $options
);



$data =$orderid ."<br/>New Order Just Arrived";
$pusher->trigger('cantikkathome', 'neworder', $data );



// Redirect to success
header('Location: success.php');


?>
