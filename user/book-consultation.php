<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}




if (isset($_GET['appid'])) {
    $cuurentuser= $_SESSION['CUSTOMER_Username'];
    $appid = $_GET['appid'];
    $res = mysqli_query($connect,"SELECT * FROM customer WHERE CUSTOMER_Username ='$cuurentuser' ");
    $userRow=mysqli_fetch_array($res,MYSQLI_NUM);


    $result = mysqli_query($connect,"SELECT * FROM consultation_schedule WHERE SCHEDULE_ID  =$appid ");
    $schRow=mysqli_fetch_array($result,MYSQLI_NUM);

}




if (isset($_POST['confirmbook'])) {

    $result = mysqli_query($connect,"SELECT * FROM consultation_schedule WHERE SCHEDULE_ID  =$appid ");
    $schRow=mysqli_fetch_array($result,MYSQLI_NUM);

    $comment = $_POST['comment'];
    $details = $_POST['details'];
    $service = $_POST['servicetype'];

    ?>
    <script type="text/javascript">
        window.location.href='consultation-payment.php?schid=<?php echo "$schRow[0]";  ?>&comment=<?php echo "$comment"; ?>&details=<?php echo "$details"; ?>&servicetype=<?php echo "$service"; ?>'
    </script>
    <!--	<meta http-equiv="refresh" content="0;url="> -->


    <?php

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Book Consultation</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src="https://kit.fontawesome.com/1815c61c19.js" crossorigin="anonymous"></script>
<style media="screen">


    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    body {
        background-color: #eee
    }

    nav,
    .wrapper {
        padding: 10px 50px
    }

    nav .logo a {
        color: #000;
        font-size: 1.2rem;
        font-weight: bold;
        text-decoration: none
    }

    nav div.ml-auto a {
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem
    }

    header {
        padding: 20px 0px
    }

    header .active {
        font-weight: 700;
        position: relative
    }

    header .active .fa-check {
        position: absolute;
        left: 50%;
        bottom: -27px;
        background-color: #fff;
        font-size: 0.7rem;
        padding: 5px;
        border: 1px solid #008000;
        border-radius: 50%;
        color: #008000
    }

    .progress {
        height: 2px;
        background-color: #ccc
    }

    .progress div {
        display: flex;
        align-items: center;
        justify-content: center
    }

    .progress .progress-bar {
        width: 47%
    }

    .formBook{
        font-size: 1.5em;
    }

    .form-control{
        font-size: 1em;
        height: 120%;
    }

    .form-group select  option textarea{
        font-size: 1em;
        height: 120%;
    }

    .form-group button{
        margin-top: 1%;
        font-size: 1em;
        height: 50px;
        border-radius: 50px;
        background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
        color: white;
        font-weight: bold;
        border-color: #4F3A83;
        outline: none;
    }

    .form-group button:hover{
        background-image: linear-gradient(to right top, white, #ffffff);
        color: #4F3A83;
        font-weight: bold;
        border-color: #4F3A83;
    }


</style>
<body>

<nav class="bg-white">
    <div class="d-flex align-items-center">
       <div class="logo"> <a href="index.php"> <img src="picture/logo.png"  height="34"> </a>
</div>        <div class="ml-auto"> <a href="Consultation.php" class="text-uppercase" style="font-weight:bold; font-size: 1.5em; color: #4F3A83">Back to Consultation</a> </div>
    </div>
</nav>
<header>
    <div class="d-flex justify-content-center align-items-center pb-3">
        <div class="px-sm-5 px-2 active">CONSULTATION DETAILS  <span class="fas fa-check"></span> </div>
        <div class="px-sm-5 px-2 active"><span class="fas fa-check"></span>CHECKOUT</div>
        <div class="px-sm-5 px-2">FINISH</div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</header>



<div class="container">
    <section style="padding-bottom: 50px; padding-top: 50px;">
        <div class="row">
            <!-- start -->
            <!-- USER PROFILE ROW STARTS-->
            <div class="row">
                <div class="col-md-3 col-sm-3">

                    <div class="user-wrapper">
                        <img src='https://cdn.shopify.com/s/files/1/0255/9148/0416/products/20200901_075002_0000_1024x1024.png?v=1598971994'class="img-responsive" />

                    </div>
                </div>

                <div class="col-md-9 col-sm-9  user-wrapper">
                    <div class="description">


                        <div class="panel panel-default">
                            <div class="panel-body">


                                <form class="formBook" action="" role="form" method="POST" accept-charset="UTF-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h4>   <b> Customer Info  </b></h4></div>
                                        <div class="panel-body">

                                            <b> Customer Name: </b>	 <?php echo $userRow[2] ?> <?php echo $userRow[3] ?><br>
                                            <b> Contact Number:  </b> <?php echo $userRow[4] ?><br>
                                            <b> Customer Email: </b> <?php echo $userRow[5] ?><br>
                                            <b> Address:  </b> <?php echo $userRow[6] ?>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h4> <b> Consultation Info </b> </h4></div>
                                        <div class="panel-body">
                                            <b>Day:    </b><?php echo $schRow[2] ?><br>
                                            <b>Date:   </b> <?php echo $schRow[1] ?><br>
                                            <b>Time:   </b> <?php echo $schRow[3] ?> --- <?php echo $schRow[4] ?><br>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label >Type of Service </label>
                                        <select class="form-control" name="servicetype" style="height: 2.2em">
                                            <option value="Facial">Facial</option>
                                            <option value="Hair">Hair</option>
                                            <option value="Skin">Skin</option>
                                            <option value="Cosmetics">Cosmetics</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label  class="control-label">Please type in details/reason for the consultation:</label>
                                        <input type="text" class="form-control" name="details" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Comments ( Anything you would like to let us know ?)</label>
                                        <textarea class="form-control" id="comment" name="comment" required ></textarea>
                                    </div>



                                    <div class="form-group">
                                        <!--<input type="submit" name="confirmbook" id="submit" class="btn btn-primary" value="Confirm Booking" > -->
                                        <button type="submit" class="btn btn-primary" name="confirmbook"   style="outline: none">  Confirm Book </button>
                                        <br> <i>  *Once clicked you will be directed to make payment </i>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                </div>


                <div class="container">

                </div>

            </div>
            <!-- USER PROFILE ROW END-->





</body>
</html>
