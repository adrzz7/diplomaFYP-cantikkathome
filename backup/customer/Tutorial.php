<?php
session_start();
include 'connect.php';
if(isset($_SESSION["CUSTOMER_Username"])){
    //echo $_SESSION["UserName"];
    $result = mysqli_query($connect,"SELECT * FROM tutorial");

    ?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>TUTORIAL PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
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
            background: #D999EB repeat-y;
            position: fixed;
            width:100%;
            z-index: 1;
            height: 90%;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        .content-wrapper{
            background-color: white;
            top: 88%;
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
            font-family: FontAwesome, serif;
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
            letter-spacing: 3px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        .bt:hover {
            background-color: #d05bde;
            box-shadow: 0 15px 20px rgba(175, 60, 189, 0.4);
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

        /* Style tab links */
        .tab {
            width: 100%;
            overflow: auto;
        }
        .tablink {
            background-color: #bc49bc;
            float: left;
            outline: none;
            width: 25%;
            cursor: pointer;
            border: none;
            padding: 0.5% 0.8%;
            font-size: 26px;
            font-weight: bolder;
            color: white;
            text-align: center;
        }

        @media screen and (max-width: 500px) {
            .tablink {
                float: none;
                display: block;
                width: 100%;
                text-align: left;
            }
        }

        .tablink:hover {
            background-color: #D999EB;
            background-image: linear-gradient(to right top, #df70e7, #d34fea, #da2ce7, #ec13ec, #D999EB);
            color: white;
            cursor: pointer;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent{
            color: black;
            display: none;
            padding: 100px 20px;
            margin-top: -4%;
            margin-bottom: 2%;
        }

        .card{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .card > div{
            margin: 7px;
            padding: 7px;
        }

        .column{
            float:left;
            width:50%;
        }

        /* Remove extra left and right margins, due to padding */
        .row {margin: 0 -5px;}


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
                display: block;
                margin-bottom: 20px;
            }
        }

        .Caption{
            color: #2c3e50;
            font-size: 2.2vw;
            font-weight: bold;
            margin-top: -1%;
            margin-bottom: 2%;
            text-align: center;
        }
        .Desc{
            color: #2c3e50;
            font-size: 1.5vw;
            font-weight: lighter;
            margin-top: -1%;
            margin-bottom: 2%;
            text-align: center;
        }

        .pink{
            font-weight: bolder;
            color: #2c3e50;
            text-decoration: none;
            line-height: 1.3;
            font-size: 40px;
            text-transform: none;
            text-align: center;
        }
        .purple{
            font-weight: bolder;
            color: rgb(150, 41, 150);
            text-decoration: none;
            line-height: 1.3;
            font-size: 32px;
            text-transform: none;
            text-align: center;
            letter-spacing: 1px;
        }
        .orange{
            font-weight: lighter;
            text-decoration: none;
            line-height: 1.3;
            font-size: 28px;
            text-transform: none;
            text-align: center;
            color: #b773c8;
        }

        .consultBTN{
            border-radius: 50px;
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            color: #fff;
            font-weight: bolder;
            border: none;
            padding: 15px;
            font-size: 200%;
            margin-bottom: 5%;
            margin-top: 15%;
            outline:none;
        }
        .container1 {
            position: relative;
            height: 100px;
        }

        .center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .consultBTN:hover{
            cursor: pointer;
            color:#bc49bc ;
            border: solid 2px #bc49bc;
            background-image: linear-gradient(to right top, white, white);
        }

        .imageTuto{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
        }

        .HeadTuto{
            margin-top: -20px;
            text-align: center;
        }


    </style>
</head>

<div class="nav">
    <?php include 'header.php';?>
</div>

<body class="TutoBody">

<header id="page-top">
    <div class="container">
        <div style="margin-bottom:0;">
            <h1 class="HeadTuto">TUTORIALS</h1>
            <img src="picture/yyyy.png" style="min-width: 280px;" class="imageTuto" alt="">
        </div>
    </div>
</header>

<div class="content-wrapper">
    <!--Tab links-->
    <div class="tab">
        <?php
        $sql = "SELECT * FROM categories";
        $data = mysqli_query($connect, $sql);
        $row = mysqli_num_rows($data);
        while($result = mysqli_fetch_assoc($data)){
            $CATEGORIES_Name=$result['CATEGORIES_Name'];
            ?>
            <button class="tablink" onclick="openPage('<?php echo $CATEGORIES_Name; ?>', this, '#9c30b3')" id="defaultOpen"><?php echo $CATEGORIES_Name; ?></button>
            <?php
        }
        ?>
    </div>

<!--Content links-->
<div>
    <?php
    $sql = "SELECT * FROM categories";
    $data = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($data);
    while($result = mysqli_fetch_assoc($data)){
        $CATEGORIES_Name=$result['CATEGORIES_Name'];
        ?>
        <div id="<?php echo $CATEGORIES_Name;?>" class="tabcontent">
            <?php
            $TUTORIAL_CategoryID=$result['CATEGORIES_ID'];
            $sql1 = "SELECT * FROM tutorial WHERE TUTORIAL_CategoryID='$TUTORIAL_CategoryID'";
            $data1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_num_rows($data1);

            ?>

            <div class="card">
                <?php
                while($result1 = mysqli_fetch_assoc($data1)){
                    ?>
                    <div>
                        <div class="video-container">
                            <iframe class="responsive-iframe" src="<?php echo $result1["TUTORIAL_VidLink"]; ?>"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                                                gyroscope; picture-in-picture" style="border: solid 2px black;"
                                    allowfullscreen ></iframe>
                        </div>
                        <h1 class="Caption"><?php echo $result1['TUTORIAL_Name'];?></h1>
                        <h1 class="Desc"><?php echo $result1['TUTORIAL_Description'];?></h1>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>

    <script>
        function openPage(pageName,elmnt,color) {
            let i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <section class="primary" id="contact" style="margin-bottom: -50px">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <div class="column">
                    <div>
                        <img src="tutoimg2.png" alt="Tutorial" class="tutoimg2">
                    </div>
                </div>
                <div class="column" style="margin-left:width: 55%;">
                    <div>
                        <h1 class="pink">NEED MORE THAN A TUTORIAL?</h1>
                        <hr class="star-primary">
                        <h1 class="purple">Whatever your doubts are, CantikkAtHome is always ready to feed you  with our priceless experience and knowledge.</h1>
                        <p class="orange">We do also live master class makeup session to help you shine at your comfort. </p>
                        <div class="container1">
                            <div class="center">
                                <button onclick="location.href = 'consultation.php';" id="myButton" class="consultBTN" > Book Online Consultation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>




<!--  FOOTER -->
    <div class="footer">
        <?php include 'footer.php';?>
    </div>
        <!--   FOOTER END -->
</div>
</body>
</html>
<?php
	}else{
		header("Location:Login.php");
	}
?>
