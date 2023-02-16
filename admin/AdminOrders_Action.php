<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';
include_once 'connect.php';

require_once('..\vendor\autoload.php');

$key = '48cac374-8cfe-4c17-a6e8-cf6f3a6df18b';

$couriers = new AfterShip\Couriers($key);
$trackings = new AfterShip\Trackings($key);
$last_check_point = new AfterShip\LastCheckPoint($key);
//https://cantikkathome.aftership.com/


if (isset($_POST['update'])){

      $orderstatus = $_POST['odstatus'];

      $trackingno = $_POST['trackno'];
			$orderid =substr("$_POST[ORDERS_ID] ",2);

      $update = mysqli_query($connect,"UPDATE orders SET 	ORDERS_Order_Status='$orderstatus' , ORDERS_Tracking_No='$trackingno' WHERE ORDERS_ID ='$orderid'");

			$res = mysqli_query($connect,"SELECT *
				FROM orders, customer,product,cart
				WHERE cart.CART_CustID = customer.CUSTOMER_ID AND orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID = '$orderid'
				GROUP BY orders.ORDERS_ID ");


      $row = mysqli_fetch_assoc($res);
      $contactno=$row['CUSTOMER_ContactNum'];
      $custname = $row['CUSTOMER_LastName'].$row['CUSTOMER_LastName'];
      $email = $row['CUSTOMER_Email'];
      $trackno = $row['ORDERS_Tracking_No'];

			if ($row['ORDERS_Email_Status'] == "No" && $trackingno !="TRXXX"   ) {


      $mail = new PHPMailer(true);

          //Server settings
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'CantikkAtHome@gmail.com';                     // SMTP username
          $mail->Password   = 'C@ntikkAtHome7';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('CantikkAtHome@gmail.com', 'Cantikk At Home');
          $mail->addAddress($email, $custname);     // Add a recipient
        // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Confirmation of Order';
          $mail->Body    = "<b> Your order is confirmed ! </b> <br/> Thanks for showing your support ❤. <br/><br/>Your goods are on the way to your doorsteps. <br/><br/>Here is Tracking No of your item $trackno.<br/><br/> Please click <a href=https://cantikkathome.aftership.com/ $trackno>here </a>  to check the status of your item. Thank you !";

          $mail->send();

            mysqli_query($connect,"UPDATE orders SET ORDERS_Email_Status ='Yes' WHERE  ORDERS_ID  ='$orderid'");
        }

	$orderid ="ORDER-#O".$orderid;
        $trackings = new AfterShip\Trackings('48cac374-8cfe-4c17-a6e8-cf6f3a6df18b');
        $tracking_info = [
            'slug'    => 'usps',
            'title'   => $orderid,
        ];
        $response = $trackings->create('UA448769884US', $tracking_info);
            ?>
						                <script type="text/javascript">
						              	window.location.href='Admin_Orders.php';
						              	</script>

            <?php

}



 ?>
