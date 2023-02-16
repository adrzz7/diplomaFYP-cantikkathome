<?php
session_start();
    include 'connect.php';


    if(isset($_POST['loginbtn']) ){

        $CUSTOMER_Username = $_POST['CUSTOMER_Username'];
        $CUSTOMER_Password= $_POST['CUSTOMER_Password'];

        //Query the database to use
        $sql = "SELECT * from customer where CUSTOMER_Username = '$CUSTOMER_Username' AND CUSTOMER_Password = '$CUSTOMER_Password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        //check username and password validation
        if ($count == 1) {
            echo "<script>alert('Login Successful!') </script>";
            $_SESSION['CUSTOMER_Username']=$CUSTOMER_Username;
            $_SESSION['CUSTOMER_ID']= $row['CUSTOMER_ID'];
            echo "<script>location.replace('index.php')</script>";
        } else {
            echo "<script>alert('Check your credentials!') </script>";
            echo "<script>location.replace('Login.php')</script>";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="">

    <head>
        <title>LOGIN PAGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .column{
                float:left;
                width:50%;
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

            .TitleHeader{
                font-family: "Times New Roman", Times, serif;
                font-size:120%;
                padding-left:20px;
                padding-right:20px;
            }

            body{
                background-image: linear-gradient(to right top, #fff, #ba63c3, #a122b5, #571d9d, #30144C);
                padding:20px;
                font-family: "Times New Roman", Times, serif;
            }


            .LoginLeft{
                text-align: center;
                font-size:180%;
                margin-left: -15%;
                padding-right: 10%;
            }

            .LoginRight{
                text-align: center;
            }

            .container{
                border: 10px solid white;
                border-radius: 50px;
                width:100%;
                height:100%;
                padding: 2%;
                margin-left: -8%;
                margin-top: -2%;
                background-color:#F1F1F1;
                box-shadow: 0 6px 15px 0 rgba(0, 0,
                0, 0.2), 0 6px 15px 0 rgba(0, 0, 0, 0.19);
            }

            .Welcome{
                font-size:155%;
            }

            * {
                box-sizing: border-box;
            }

            input[type=text], input[type=password], select, textarea {
                resize: vertical;width: 80%;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            * {box-sizing: border-box;}

            .input-container {
                display: -ms-flexbox; /* IE10 */
                display: flex;
            }

            .icon {
                color: black;
                min-width: 50px;
            }

            .LoginInput{
                font-size:3vw;
                border-radius: 20px;
                text-align: center;
                font-weight:bolder;
            }

            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: #DEDEDE;
                opacity: 1; /* Firefox */
            }

            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                color: #DEDEDE;
            }

            ::-ms-input-placeholder { /* Microsoft Edge */
                color: #DEDEDE;
            }

            .LoginBtn{
                font-weight:bolder;
                font-size: 240%;
                background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
                color: #fff;
                border-radius: 30px;
                width:170px;
                height:60px;
                outline:none;
            }

            .RegBtn{
                padding: 0;
                border: none;
                background: none;
                color:black;
                font-size:140%;
                outline:none;
            }

            .BeautBtn{
                padding: 0;
                border: none;
                background: none;
                color:black;
                font-size:140%;
                outline:none;
            }

            .LoginBtn:hover{
                color:#bc49bc ;
                border: solid 2px #bc49bc;
                background-image: linear-gradient(to right top, white, white);
                cursor:pointer;
            }

            .RegBtn:hover{
                color:lightgrey;
                cursor:pointer;
            }

            .BeautBtn:hover{
                color:lightgrey;
                cursor:pointer;
            }

            .FrgtPwdBtn{
                padding: 0;
                border: none;
                background: none;
                font-size:150%;
            }
            .FrgtPwdBtn:hover{
                color:lightgrey;
                cursor:pointer;
            }

        </style>
    </head>

    <body>
    <div class="Login">
        <div class="TitleHeader">
            <h1>CantikkAtHome</h1>
        </div>

        <div class="LoginBody">
            <div class="row">
                <div class="column">
                    <div class="LoginLeft">
                        <h1>You're just one step<br> away to your<br>Beauty world!<br></h1>
                    </div>
                </div>

                <div class="column">
                    <div class="LoginRight">

                        <div class="container">
                            <div class="Welcome">
                                <h1>Hi, Welcome Back!</h1>
                            </div>
                            <form action="Login.php" method="post">
                                <div class="input-container">
                                    <label><i class="fa fa-user icon" style="font-size: 180%; color:black"></i>
                                        <input type="text" style="outline:none;" name="CUSTOMER_Username" maxlength="30" placeholder="Username" required class="LoginInput"/>
                                    </label>
                                </div>


                                <br>
                                <label><i class="fa fa-key icon" style="font-size: 150%; color:black"></i>
                                    <input type="password" style="outline:none;" name="CUSTOMER_Password" maxlength="15" placeholder="Password" required class="LoginInput" />
                                </label>

                                <br>
                                <input class="LoginBtn" type="submit" name ="loginbtn" value="LOGIN">

                                <br><br>

                            </form>
                            <form action = "ForgotPassword.php">
                                <input class="FrgtPwdBtn" type="submit" value="Forgot Password?" >
                            </form>

                            <br><br>
                            <a href = "register.php"  class="RegBtn" type="submit" >Not a member? Click Here</a>

                            <br><br>
                            <a href = "../admin/Admin_Login.php"  class="BeautBtn" type="submit" >Are you an Admin? Click Here</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    </body>

    </html>
