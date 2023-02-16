<?php
session_start();
include 'connect.php';
$result = mysqli_query($connect,"SELECT * FROM product");
//if(isset($_SESSION["CUSTOMER_Username"])){
    //echo $_SESSION["UserName"];


    ?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>TUTORIAL PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <style>
        /* Style tab links */
        .tab {
            width: 100%;
            overflow: auto;
            margin-top: -3.7%;
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
            color: rgb(154, 56, 155);
            font-size: 2.2vw;
            font-weight: bold;
            margin-top: -1%;
            margin-bottom: 2%;
            text-align: center;
        }
        .Desc{
            color: rgb(171, 70, 172);
            font-size: 1.5vw;
            font-weight: lighter;
            margin-top: -1%;
            margin-bottom: 2%;
            text-align: center;
        }
        .Price{
            color: rgb(171, 70, 172);
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
            width: 40%;
        }

        .HeadTuto{
            text-align: center;
            margin-top: -20px;
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
            <h1 class="HeadTuto">PRODUCT</h1>
            <img src="picture/zzz.png" class="imageTuto" alt="">
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
            $PRODUCT_CategoryID=$result['CATEGORIES_ID'];
            $sql1 = "SELECT * FROM product WHERE PRODUCT_CategoryID='$PRODUCT_CategoryID'";
            $data1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_num_rows($data1);

            ?>

            <div class="card">
                <?php
                while($result1 = mysqli_fetch_assoc($data1)){
                    $prodid =$result1['PRODUCT_ID'];
                    ?>
                    <div>
                        <div class="video-container">

                            <img src=data:image;base64,<?php echo $result1['PRODUCT_Images']; ?> width="100px" value="<?php echo $prodid ?>" onclick="window.location.href='product_view.php?prodid=<?php echo "$prodid"  ?>'"/>
                        </div>
                        <h1 class="Caption"><?php echo $result1['PRODUCT_Name'];?></h1>
                        <h1 class="Price"> RM <?php echo $result1['PRODUCT_Price'];?></h1>
                        <h1 class="Desc"><?php echo $result1['PRODUCT_Descriptions'];?></h1>
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

    <section class="primary" id="contact">
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
                        <h1 class="pink">NEED HELP CHOOSING THE RIGHT PRODUCT?</h1>
                        <hr class="star-primary">
                        <h1 class="purple">Whatever your skin types are, CantikkAtHome has products designed to treat and protect your skin.</h1>
                        <p class="orange">Start your skincare journey with a consultation with a highly trained beautician at home. </p>
                        <div class="container1">
                            <div class="center">
                                <button onclick="location.href = 'consultation.php';" id="myButton" class="consultBTN" > Book Online Consultation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="footer">
        <?php include 'footer.php';?>
    </div>
</div>
</body>
</html>
