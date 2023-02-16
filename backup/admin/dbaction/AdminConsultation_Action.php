<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';
include_once 'cantikkathome\connect.php';


// Get the variables.



if (isset($_POST['cnfrmupdt'])){

  $consultationstatus = $_POST['consultstatus'];

  $meetlink = $_POST['meetinglink'];
  $consultid =substr("$_POST[CONSULTATION_ID] ",2);

      $res = mysqli_query($connect,"SELECT *  FROM consultation,customer,consultation_schedule,beautician WHERE consultation.CONSULTATION_ScheduleID =consultation_schedule.SCHEDULE_ID AND consultation.CONSULTATION_CustomerID=customer.CUSTOMER_ID  AND consultation.CONSULTATION_ID  = $consultid AND consultation_schedule.SCHEDULE_BeauticianID =beautician.BEAUTICIAN_ID ");


      $row = mysqli_fetch_assoc($res);

if ( $row['CONSULTATION_Email_Status'] == "No" && $consultationstatus =="Processing (Email Sent)"  ) {


  $custname = $row['CUSTOMER_FirstName'].$row['CUSTOMER_LastName'];
  $email = $row['CUSTOMER_Email']; // $row['Email'];
  $day = $row['SCHEDULE_Day'];
  $date= $row['SCHEDULE_Date'];
  $time= $row['SCHEDULE_Start'] ." -- " .$row['SCHEDULE_End'] ;
  $beautname  =$row['BEAUTICIAN_Name'] ;
  $beautemail=$row['BEAUTICIAN_Email'];

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
       $mail->addCC($beautemail);


      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Confirmation of Consultation';
      $mail->Body    =
      "<b> Dear $custname , </b> <br/>
      Your consultation is confirmed !  <br/> <br/>
      Below are the details of the consultation : <br/> <br/>
      &nbsp;  &nbsp; Date : $date <br/>
      &nbsp;  &nbsp; Day  : $day <br/>
      &nbsp;  &nbsp; Time : $time <br/>
      &nbsp;  &nbsp; Meeting Link : $meetlink <br/>
      &nbsp;  &nbsp; Beautician : $beautname <br/> <br/>
      If you have any additional questions, use the contact details below to get in touch with us. <br/><br/>

      We cant wait to make you feel better ! Thanks for showing your support ❤. <br/> <br/>
      Sincerely ,<br/>
      CantikkAtHome <br/>
      +60377855470/+60146711175/<a href=mailto:CantikkAtHome@gmail.com>Email</a>";

      $mail->send();
      mysqli_query ($connect,"UPDATE consultation SET CONSULTATION_Email_Status='Yes',CONSULTATION_MeetingLink='$meetlink' WHERE CONSULTATION_ID =$consultid");

        }
  $update = mysqli_query($connect,"UPDATE consultation SET CONSULTATION_Status ='$consultationstatus' WHERE CONSULTATION_ID =$consultid");

          ?>    <script type="text/javascript">
        	window.location.href='Admin_Consultation.php';
              	</script>
          <?php
}
?>
