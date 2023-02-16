<?php
    session_start();

   include 'connect.php';

    if(isset($_POST['LoginBtn']) ){

        $ADMIN_Username = $_POST['ADMIN_Username'];
        $ADMIN_Password= $_POST['ADMIN_Password'];

        //Query the database to use
    //    $sql =;
        $results = mysqli_query($connect,  "SELECT * FROM admin WHERE ADMIN_Username = '$ADMIN_Username' AND ADMIN_Password = '$ADMIN_Password'");
        $row = mysqli_fetch_array($results);

              //check username and password validation
        if( $row == null ) {
          echo "<script>alert('Check your credentials!') </script>";
        echo "<script>location.replace('Admin_Login.php'); </script>";

        } else {

              echo "<script>alert('Login Successful!') </script>";
                    $_SESSION['ADMIN_Username']=$ADMIN_Username;
                  echo "<script>location.replace('Admin_Dashboard.php')</script>";

        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="">

    <head>
        <title>BEAUTICIAN LOGIN PAGE</title>
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

            .TitleHeader{
                font-family: Helvetica,Arial,sans-serif;
                font-size:120%;
                padding-left:20px;
                padding-right:20px;
            }

            .LoginBody{
                background-color:#FEFEE8;
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
                background-color:#4F3A83;
                color:#F3BF3F;
                border-radius: 30px;
                width:170px;
                height:60px;
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
                background-color:#8A68DF;
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
                outline:none;
            }
            .FrgtPwdBtn:hover{
                color:lightgrey;
                cursor:pointer;
            }
        </style>
    </head>

    <body class="LoginBody">
        <div class="TitleHeader">
        <h1>CantikkAtHome</h1>
        </div>
        <div class="row">
            <div class="Login">
                <div class="LoginInside">
                    <div class="column">
                        <div class="LoginLeft">
                            <h1>You're just one step<br> away to your<br>Beauty world!<br></h1>
                        </div>
                    </div>

                    <div class="column">
                        <div class="LoginRight">
                            <div class="container">
                                <div class="Welcome">
                                    <h1>Hi, Welcome Back Admin!</h1>
                                </div>
                                <form action="" method="post">
                                    <div class="input-container">
                                        <label><i class="fa fa-user icon" style="font-size: 180%; color:black"></i>
                                            <input type="text" style="outline:none;" name="ADMIN_Username" maxlength="30" placeholder="Username" required class="LoginInput"/>
                                        </label>
                                    </div>


                                    <br>
                                    <label><i class="fa fa-key icon" style="font-size: 150%; color:black"></i>
                                        <input type="password" style="outline:none;" name="ADMIN_Password" maxlength="30"  placeholder="Password" required class="LoginInput" />
                                    </label>

                                    <br><br>
                                    <input class="LoginBtn" type="submit" name="LoginBtn" ><br><br>
                                  </form>

                                    <br><br>
                                    <form action = "ForgotPassword.php">
                                        <input class="FrgtPwdBtn" type="submit" value="Forgot Password?" >
                                    </form>

                                    <br><br>
                                   <a href = "Login.php"  class="BeautBtn" type="submit" >Not Admin? Click Here</a></form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </body>

    </html>
