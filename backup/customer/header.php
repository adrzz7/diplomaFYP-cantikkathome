<!DOCTYPE html>
<html lang="">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - CantikkAtHome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
        /* HERE STARTS THE MAGIC */
        header {
            text-align: center;
            color: #fff;
            background: #D999EB;
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
            top: 85%;
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
            o-repeat center center fixed;
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



    </style>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php" ><img src="../assets/logo.png" alt="UEL" name="UEL" height='34px'></a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href="tutorial.php"><button class="bt">Tutorial</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href="product.php"<button class="bt">Product</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href="feedback.php"><button class="bt">Feedback</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href="consultation.php"><button class="bt">Consultation</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href="cart.php"><button style="border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="../assets/cart.png" style="width:40px;"></button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <div class="dropdown" style="margin-top: 2px;"><img src="../assets\profile.png" style="width:40px;">
                            <div class="dropdown-content" >
                                <a href="userprofile.php">Profile</a>
                                <a href="LogOut.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
