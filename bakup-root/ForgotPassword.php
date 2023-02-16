<?php
session_start();
include 'Connection.php';

if(isset($_POST['submit']))
{

    $Username = $_POST['Username'];
    $result = mysqli_query($connect,"SELECT * FROM customer where Username='" . $_POST['Username'] . "'");
    $row = mysqli_fetch_assoc($result);
    $fetchUsername=$row['Username'];
    $Email=$row['Email'];
    $Password=$row['Password'];

    if($Username==$fetchUsername) {
       $message = "<p>Hi!<br>Below is your CantikkAtHome account's password</p>Password: <b>$Password</b></b><br><br>Thank you!";

        function send_mail($to, $subject, $message)
        {
            $mail = new \PHPMailer\PHPMailer\PHPMailer();

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->SMTPDebug = 1;                                       //Enable SMTP debugging
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
        send_mail($Email, "CantikkAtHome Password", $message);
        echo "<script>location.replace('Login.php')</script>";
    }else{
        echo "<script>alert('Username does not exist! Please try again!') </script>";
        echo "<script>location.replace('index.php')</script>";

    }
}?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        body{
            background-color:#FEFEE8;
            padding:20px;
            font-family: "Times New Roman", Times, serif;
            margin: 10% auto auto;
            width: 50%;
            border: 3px solid lightgrey;

        }

        .FrgtHead{
            margin:auto auto;
            width: 42%;
            font-size: 250%;
        }

        .FrgtUsernameBox{
            font-size:70%;
            border-radius: 20px;
            text-align: center;
            font-weight:bolder;
        }

        .FrgtNote{
            font-size: 150%;
        }

        .FrgtBtn{
            text-align: center;
            font-weight:bolder;
            font-size: 130%;
            background-color:#4F3A83;
            color:#F3BF3F;
            border-radius: 30px;
            width:110px;
            height:45px;
        }
        .FrgtBtn:hover{
            background-color:#8A68DF;
            cursor:pointer;
        }

    </style>
</head>
<body>
<h1 class="FrgtHead">Forgot Password</h1>
<form action='' method='post'>
    <p class="FrgtNote">Please enter your username! We will send your password through your email!</p>
    <h1>Username :
        <label class="FrgtUsername">
            <input type="text" name="Username" size="15" maxlength="25" required class="FrgtUsernameBox"/>
        </label></h1>
    <p class="FrgtNote">Kindly check your email :)</p>
    <form action ="index.php" method="POST">
        <input class="FrgtBtn" type="submit" name="submit" value="SUBMIT"><br>
    </form>

</form>
</body>
</html>