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


 $userid=$_SESSION['CUSTOMER_ID'];
 $query = "SELECT * FROM customer WHERE CUSTOMER_ID =$userid";
 $result =mysqli_query($connect,$query);
 $custrow = mysqli_fetch_assoc($result);


 $comment = $_POST['comment'];
 $details = $_POST['details'];
 $service = $_POST['service'];
 $schid = $_POST['schid'];


 mysqli_query($connect,"INSERT INTO consultation ( CONSULTATION_CustomerID , 	CONSULTATION_ScheduleID  , CONSULTATION_ServiceType , CONSULTATION_Details , CONSULTATION_ExtraComments ,		CONSULTATION_Status, CONSULTATION_Email_Status  )
 VALUES ( '$userid', '$schid', '$service', '$details' , '$comment' ,'Unprocessed','No')");

 $res = mysqli_query($connect,"SELECT CONSULTATION_ID  FROM consultation WHERE CONSULTATION_ScheduleID ='$schid' ");
 $consultationRow=mysqli_fetch_array($res,MYSQLI_NUM);
 $conid = $consultationRow[0];

 $currentdate = date ('Y-m-d');
 $result =mysqli_query($connect, "INSERT INTO payment_consultation( PAYMENT_CONSULTATIONID   ,PAYMENT_CONSULTATION_Date,	PAYMENT_CONSULTATION_Status , PAYMENT_CONSULTATION_Amount  ) VALUES('$conid' ,'$currentdate' , 'Unapproved'  , '50.00'   ) ");



       $sql = "UPDATE consultation_schedule SET SCHEDULE_Availability	 = 'Unavailable' WHERE SCHEDULE_ID  = $schid" ;
       $scheduleres=mysqli_query($connect,$sql);



       $first_name = $custrow['CUSTOMER_FirstName'];
       $last_name = $custrow['CUSTOMER_LastName'];
       $email = $custrow['CUSTOMER_Email'];
       $token = $POST['stripeToken'];

       // Create Customer In Stripe
       $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
       ));

$conid =  "CONSULTATION ID :".$conid ;

       // Charge Customer
       $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "myr",
        "description" => $conid,
        "customer" => $customer->id,

       ));

       // Redirect to success
       header('Location: success.php');
