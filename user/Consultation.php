<?php
	session_start();
    include 'connect.php';

		if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consultation</title>
  <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <style>
        @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
        /* HERE STARTS THE MAGIC */
        header {
            text-align: center;
            color: #fff;
            background: #D999EB;
            background-image: url("pic1.png");
            background-repeat: repeat-y;
            position: fixed;
            width:100%;
            z-index: 1;
            height: 78%;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        .content-wrapper{
            background-color: white;
            top: 87%;
            min-height: 12%;
            position:absolute;
            z-index: 2;
            width: 100%;
        }
        /* HERE ENDS THE MAGIC */
        header .container {
            padding-top: 150px;
            padding-bottom: 50px;
        }

        header img {
            display: block;
            margin: 0 auto 20px;
        }

        header .intro-text .name {
            display: block;
            text-transform: uppercase;
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 2em;
            font-weight: 700;
        }

        header .intro-text .skills {
            font-size: 1.25em;
            font-weight: 300;
        }

        section {
            padding: 100px 0;
            width: 100%;
        }

        section h2 {
            margin: 0;
            font-size: 3em;
        }
        hr.star-light,
        hr.star-primary {
            margin: 25px auto 30px;
            padding: 0;
            max-width: 250px;
            border: 0;
            border-top: solid 5px;
            text-align: center;
        }

        hr.star-light:after,
        hr.star-primary:after {
            content: "\f005";
            display: inline-block;
            position: relative;
            top: -.8em;
            padding: 0 .25em;
            font-family: FontAwesome;
            font-size: 2em;
        }

        hr.star-light {
            border-color: #fff;
        }

        hr.star-light:after {
            color: #fff;
            background-color: #18bc9c;
        }

        hr.star-primary {
            border-color: #2c3e50;
        }

        hr.star-primary:after {
            color: #2c3e50;
            background-color: #fff;
        }

        section.primary h2{
            color: #2c3e50;
        }

        section.success{
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            color: #fff;
        }

        html {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, serif;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        /*eND OF NAVIGATION BAR CSS*/


    </style>

</head>

<div class="nav">
    <?php include 'header.php';?>
</div>

<body>
<header id="page-top">
    <div class="container">
        <div style="margin-bottom:0;">
            <h1 style="margin-top: -50px;">CONSULTATION</h1>
            <img src="picture/consultation model.png" class="img-fluid"  style="margin-top: -50px; width: 60%; min-width: 400px;"alt="">
        </div>
    </div>
</header>
<div class="content-wrapper">

<br>
<br>
<h2 style="text-align:center" ><b>DIGITAL CONSULTATION</b> </h2>
    <hr class="star-primary">

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="media">
    <div class="media-left">
      <img src="picture/CONSULTATION MODELL.png" class="media-object" style="width: 35%; height: auto; max-width: 500px; min-width: 100px">
    </div>

        <div class="column" style="float: right; width: 65%; margin-top: -340px;">
            <div class="media-body" style="padding-left:50px; font-size:20px">
                <br>
                <p>Due to the unprecedented crisis , we are forced to live in " New Normal". But fret not ,no one can stop you from shining beautifully.</p>
                <p>I am utilizing the digital platform to reach you at your own comfort. Several tools will be used to ease the process. Below are the instructions for you to follow to get connected with me lively.</p>
            </div>
        </div>


  </div>
</div>

<br>
<br>
<section class="success" id="about">
    <div class="container">
        <h2 style="text-align:center" ><b>FOLLOW THESE STEPS</b> </h2>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="media">

                    <div class="media-body" style="font-size:30px">
                        <br>
                        <ol type="1">
                            <li>Consultation is based on cart system.</li>
                            <li> Below this section you will find the item to be added.</li>
                            <li>Click the  " + "   button to adjust the duration of the hours.</li>
                            <li>Then select the date of your choice</li>
                            <li>Click  " Book Now"  button.</li>
                            <li>You will be directed to the cart page to view the fees of charge. Then proceed to make payment</li>
                            <li>In the shipping options , please tick the checkbox" For Consultation" .</li>
                            <li>Upload the payment receipt and click  " Pay Now "</li>
                        </ol>
                    </div>

                </div>


            </div>
        </div>
</section>







<div class="container" style="margin-top:5%">
  <div class="row">
    <div class="FullContainer">
        <div class="column">
            <div class="media-left">
                <img src="picture/CONPAGE.jpg" class="container__image" align="left" style="width: 35%; height: auto; max-width: 500px; min-width: 100px">
            </div>
        </div>
        <div class="column" style="float: right; width: 60%">
            <div class="media-body" style=";font-size:30px">
                <div class="container__image">
                <h1 style=""><b>BOOK YOUR SLOT HERE</b></h1>
                <div  class="form-group">
                    <h2><b><u>ONLINE CONSULTATION</u></b></h2>
                    <label for="consultdate">Choose a date to see our beautician's schedule</label>
                    <input class="form-control"   id="chosendate" name="chosendate" type="date"  value="" min="<?php echo date("Y-m-d")?>" onchange=" showUser(this.value)" />
                    <!--		<input type="date" name="consultdate" class="form-control" min="<?php// echo date("Y-m-d")?>"  > -->



                </div>


                <script>
                    function showUser(str) {

                        if (str == "") {

                            document.getElementById("txtHint").innerHTML = "No data to be shown ";

                            return;
                        } else {
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                }
                            };
                            xmlhttp.open("GET","get-schedule.php?consultdate="+str,true);
                            console.log(str);
                            xmlhttp.send();
                        }
                    }
                </script>


                <div id="txtHint">

                </div>

            </div>  <!--Container fluid -->
        </div><!-- column -->


</div><!--Media body -->

  </div><!--Media  -->


</div><!--ROw-->
</div><!--Container -->







</div>
    <!--  FOOTER START -->
    <div class="footer">
        <?php include 'footer.php';?>
    </div>

    <!--   FOOTER END -->
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
