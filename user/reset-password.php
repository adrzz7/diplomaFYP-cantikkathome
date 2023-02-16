<?php
session_start();
include 'connect.php';

use Users\User\phpmailer\vendor\phpmailer\phpmailer\src\PHPMailer;
use Users\User\phpmailer\vendor\phpmailer\phpmailer\src\Exception;

require 'C:/Users/User/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'C:/Users/User/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'C:/Users/User/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
include_once('C:/Users/User/phpmailer/vendor/autoload.php');

if(isset($_POST['submit']))
{


    $CUSTOMER_Username = $_POST['CUSTOMER_Username'];
    $result = mysqli_query($connect,"SELECT * FROM customer where CUSTOMER_Username='" . $_POST['CUSTOMER_Username'] . "'");
    $row = mysqli_fetch_assoc($result);
    $fetchUsername=$row['CUSTOMER_Username'];
    $CUSTOMER_Email=$row['CUSTOMER_Email'];
    $CUSTOMER_Password=$row['CUSTOMER_Password'];

    if($CUSTOMER_Username==$fetchUsername) {
        $message = "<p>Hi!<br>Below is your CantikkAtHome account's password</p>Password: <b>$CUSTOMER_Password</b></b><br><br>Thank you!";

        function send_mail($to, $subject, $message)
        {
            $mail = new \PHPMailer\PHPMailer\PHPMailer();

            try {
                //Server settings
                //$mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                //$mail->SMTPDebug = 1;                                       //Enable SMTP debugging
                $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'CantikkAtHome@gmail.com';                     // SMTP username
                $mail->Password   = 'C@ntikkAtHome7';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                $mail->setFrom('CantikkAtHome@gmail.com', 'CantikkAtHome');
                //Recipients
                $mail->addAddress($to);

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                echo "<script>alert('Email has been sent')</script>";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        //call send mail function to send mail to customers
        send_mail($CUSTOMER_Email, "CantikkAtHome Password", $message);
        echo "<script>location.replace('reset-password.php')</script>";
        echo "<script>location.replace('Login.php')</script>";
    }else{
        echo "<script>alert('Username does not exist! Please try again!') </script>";
        echo "<script>location.replace('reset-password.php')</script>";

    }
}?>
<!DOCTYPE HTML>
<html lang="">
<head>
    <title>Forgot Password</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <style>
        body{

            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            padding:20px;
            font-family: Helvetica,Arial,sans-serif;
            margin: 8% auto auto;
            width: 50%;
            border: 3px solid lightgrey;


        }

        .FrgtHead{
            margin:auto auto;
            text-align: center;
            font-size: 250%;
        }

        .FrgtUsernameBox{
            font-size:70%;
            border-radius: 20px;
            text-align: center;
            font-weight:bolder;

        }

        .FrgtPwdBody{
            background-image: linear-gradient(to right top, white, white);
            border: 3px solid lightgrey;
            padding: 20px;
            border-radius: 40px;
        }

        .FrgtNote{
            font-size: 150%;
        }

        .FrgtBtn{
            text-align: center;
            font-weight:bolder;
            font-size: 130%;
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            color: #fff;
            border-radius: 30px;
            width:110px;
            height:45px;
            outline:none;
        }
        .FrgtBtn:hover{
            cursor: pointer;
            color:#bc49bc ;
            border: solid 2px #bc49bc;
            background-image: linear-gradient(to right top, white, white);
        }



    </style>
</head>
<body>

<div class="FrgtPwdBody">
    <h1 class="FrgtHead">Forgot Password</h1>
    <hr>
    <form action='' method='post'>
        <p class="FrgtNote">We will send your password through your email!</p>
        <h1>Username :
            <label class="FrgtUsername">
                <input type="text" name="CUSTOMER_Username" size="15" maxlength="25" style="outline: none" required class="FrgtUsernameBox"/>
            </label></h1>
        <p class="FrgtNote">Check your email!</p>
        <input class="FrgtBtn" type="submit" name="submit" value="SUBMIT"><br>
    </form>



</div>


<!-- Start of LiveChat (www.livechatinc.com) code -->
<script>
    window._lc = window._lc || {};
    window.__lc.license = 12604245;
    ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechatinc.com/chat-with/12604245/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
</body>
</html>