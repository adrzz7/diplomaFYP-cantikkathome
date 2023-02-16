<?php
session_start();
include 'connect.php';
	if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

    $result = mysqli_query($connect,"SELECT * FROM customer");
    ?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Feedback</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
        .card-block {
            color:#fff;
            font-size: 1em;
            position: relative;
            margin: 0;
            padding: 1em;
            border: none;
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            border-top: 1px solid rgba(34, 36, 38, .1);
            box-shadow: none;
            box-shadow: 0px 15px 20px rgba(0, 0, 255, .2);


        }
        .text-bold {
            font-weight: 700;
        }
        .card-text {
            clear: both;
            margin-top: .5em;
            color:#fff;
        }
        .img-zoom-in img
        {
            transition:all .2s ease-in-out;
            -webkit-transition:all .2s ease-in-out;
            -moz-transition:all .2s ease-in-out;
            -ms-transition:all .2s ease-in-out;
            -o-transition:all .2s ease-in-out;
        }

        .img-zoom-in:hover img
        {
            transform:scale(1.1);
            -webkit-transform:scale(1.1);
            -moz-transform:scale(1.1);
            -ms-transform:scale(1.1);
            -o-transform:scale(1.1)
        }

        /* General button style (reset) */
        .btn {
            border: none;
            font-family: inherit;
            font-size: inherit;
            color: inherit;
            background: none;
            cursor: pointer;
            padding: 15px 30px;
            display: inline-block;
            margin: 15px 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            outline: none;
            position: relative;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        .btn:after {
            content: '';
            position: absolute;
            z-index: -1;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }
        /* Pseudo elements for icons */
        .btn:before {
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            position: relative;
            -webkit-font-smoothing: antialiased;
        }
        /* Button 6 */
        .btn-6 {
            color: #964CAA;
            background: #fff;
            -webkit-transition: none;
            -moz-transition: none;
            transition: none;
        }

        .btn-6:active {
            top: 2px;
        }

        /* Button 6c */
        .btn-6c {
            border: 4px solid #fff;
            border-radius: 60px;
        }

        .btn-6c:hover {
            background: transparent;
            color: #fff;
            box-shadow: 0px 15px 20px rgba(0, 0, 255, .2);
            transform: translateY(-7px);
        }
        .wrap {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bt {
            width: 140px;
            height: 45px;
            font-family: 'Roboto', sans-serif;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        .bt:hover {
            background-color: #d05bde;
            box-shadow: 0px 15px 20px rgba(175, 60, 189, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }

        html {
            no-repeat center center fixed;
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


        /* Navigation Bar*/
        .header {
            height:50px;
            width:100%;
            font-weight: bolder;
            background-color: rgb(253, 252, 238);
            margin-top: 2%;
        }

        .header a{
            float : right;
            display:block;
            color : black;
            text-align:center;
            font-size:26px;
            padding: 14px 16px;
            text-decoration:none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown .dropbtn {
            font-size: 15px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            color: black;
            min-width: 150px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            right:0;
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


        .column{
            float:left;
            width:50%;
        }

        .Center{
            float:right;
            width:55%;
        }
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        .FeedBackImg2{
            width:65%;
            margin: auto auto auto 10%;
            height: auto;
        }

        #FeedbackFrmTitle{
            font-size: 350%;
            font-weight: bolder;
            color: #38016F;
            text-align: center;
        }

        form.FeedbackForm {
            width: 75%;
            padding: 2% 8% 2.5% 8%;
            border-style: solid;
            border-radius: 65px;
            border-color: white;
            background-color: white;
            display: inline-block;
            margin: -40px auto 5% 15%;
            text-align: left;
            box-shadow: 0 6px 15px 0 rgba(0, 0,
            0, 0.2), 0 6px 15px 0 rgba(0, 0, 0, 0.19);
        }

        nobr.FormFill{
            font-size: 150%;
        }
        input.FormFill{
            font-size: 130%;
            padding: 2px;
            width: auto;
            resize: vertical;
        }
        textarea.FormFill{
            font-size: 130%;
            padding: 2px;
            width: auto;
            resize: vertical;
        }
        .Center{
            height: 100px;
            position: relative;
        }
        .FeedBackFrmBtn{
            background-image: linear-gradient(to right top, #d47ed4, #c051ca, #a730bb, #ab0ccf, #8e11bb);
            border-radius: 40px;
            color: white;
            padding: 2% 8% 2% 8%;
            font-size: 190%;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 12%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .FeedBackFrmBtn:hover{
            color:#bc49bc ;
            border: solid 2px #bc49bc;
            background-image: linear-gradient(to right top, white, white);
            cursor: pointer;
        }

        #FeedbackQuote{
            background: #FF8AA1 -webkit-gradient(linear, left top, left bottom, from(#d220cf), to(#ff8aa1)) no-repeat;
            color: white;
            font-size: 290%;
            padding: 7% 4%;
            float: left;
            margin-left: -12%;
            width: 100%;
            text-align: center;
            border-radius: 17px;
        }

        .emoji {
            display: none;
        }

        .emoji ~ span {
            font-size: 4rem;
            filter: grayscale(80);
            cursor: pointer;
            transition: 0.3s;
        }

        .emoji:checked ~ span {
            filter: grayscale(0);
            font-size: 3.5em;
        }

    </style>
</head>
<!-- Navigation Bar -->
<div class="nav">
    <?php include 'header.php';?>
</div>
<!-- end of Navigation Bar -->

<body class="FeedbackBody">
<body>
<header id="page-top">
    <div class="container">
        <div style="margin-bottom:0;">
            <h1 style="margin-top: -50px;">FEEDBACK</h1>
            <img src="picture/xxx.png" class="img-fluid"  style="margin-top: 10px; width: 33%; min-width: 300px" alt="" >
        </div>
    </div>
</header>
<div class="content-wrapper">


<section>
    <div class="FeedbackForm">
        <form action=" " method="POST" class="FeedbackForm">
            <p id="FeedbackFrmTitle">Share With Us What You Feel...</p>
            <hr class="star-light">
            <div class="row">
                <div class="column">

                    <label><nobr class="FormFill" style="padding-right: 1.5em;">Message</nobr>
                        <textarea class="FormFill" name="FEEDBACK_Message" rows="4"maxlength="300" required></textarea>
                    </label>

                </div>

                <div class="column">
                    <div class="row">
                        <div class="column">
                            <label ><nobr class="FormFill" style="padding: 2em;">Rate Us</nobr>
                        </div>
                        <div class="column" style="padding-left: 1em; margin-left: -5%">
                            <label>
                                <input type="radio" class="emoji" name="FEEDBACK_Rating" value="Happy">
                                <span>&#128516</span>
                            </label>
                            <label>
                                <input type="radio" class="emoji" name="FEEDBACK_Rating" value="Cool">
                                <span>&#128526</span>
                            </label>
                            <label>
                                <input type="radio" class="emoji" name="FEEDBACK_Rating" value="Dissapointed">
                                <span>&#128532</span>
                            </label>
                        </div>
                    </div>
                </div>

                    <div class="Center">
                        <input class="FeedBackFrmBtn" style="outline:none;" type="submit" name="AddFeedback" value="Submit">
                    </div>


            </div>

        </form>


    </div>
</section>

    <div class="row">
        <div class="column">
            <img src="picture/feed.png" alt="" class="FeedBackImg2" draggable="false" style="object-fit: fill;">
        </div>
        <div class="column">
            <h1 id="FeedbackQuote">"We will always be working to bring the beauty in you"</h1>
        </div>
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


<?php
if (isset($_SESSION["CUSTOMER_Username"])) {
    if (isset($_POST['AddFeedback']))
    {
        $CUSTOMER_Username = $_SESSION["CUSTOMER_Username"];
        $sql1 = "SELECT CUSTOMER_ID FROM customer WHERE CUSTOMER_Username ='$CUSTOMER_Username'";
        $result = mysqli_query($connect, $sql1);
        $row = mysqli_fetch_array($result);
        $FEEDBACK_CustID=$row['CUSTOMER_ID'];
        $FEEDBACK_Message = mysqli_real_escape_string($connect, $_POST['FEEDBACK_Message']);
        $FEEDBACK_Rating = mysqli_real_escape_string($connect, $_POST['FEEDBACK_Rating']);


        $sql = "INSERT INTO feedback (FEEDBACK_CustID , FEEDBACK_Message, FEEDBACK_Rating) 
        VALUES ('$FEEDBACK_CustID', '$FEEDBACK_Message', '$FEEDBACK_Rating')";
        mysqli_query($connect, $sql);
        echo "<script> 
Swal.fire(
  'Thanks for your feedback !',
  'We have received your feedback succesfully!',
  'success'
)</script>";
      //  echo "<script>location.replace('Feedback.php')</script>";

    }
}



?>
