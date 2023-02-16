<?php
session_start();
include 'connect.php';


?>

<!DOCTYPE html>
<html lang="">

<head>
    <title>Login</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
            padding: 2%;
            margin-left: -7%;
            margin-top: -2%;
            background-color: #f1f1f1;
            box-shadow: 0 6px 15px 0 rgba(0, 0,
            0, 0.2), 0 6px 15px 0 rgba(0, 0, 0, 0.19);
        }

        .Welcome{
            font-size:155%;
        }

        .block
        {
            margin: 0 auto;
            max-width: 900px;
            padding: 5px 3px;
        }

        .LoginInput{
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 2px solid black;
            font: 2em/1 'Open Sans', sans-serif;
            color: #333333;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 10px 11px 11px 11px;
            border-radius: 30px;
            box-shadow: none;
            outline: none;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
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
            font-size: 2em;
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            color: #fff;
            margin-top: 1em;
            border-radius: 30px;
            width:150px;
            height:50px;
            outline:none;
        }


        .LoginBtn:hover{
            color:#bc49bc ;
            border: solid 2px #bc49bc;
            background-image: linear-gradient(to right top, white, white);
            cursor:pointer;
        }



        .FrgtPwdBtn{
            padding: 0;
            border: none;
            background: none;
            font-size:1.5em;
            color: #1c1c29;
        }
        .FrgtPwdBtn:hover{
            color: #585656;
            cursor:pointer;
        }
        form { width: 80%; margin: 0 auto; }
        label, input { /* In order to define widths */ display: inline-block; }

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
                                <label class="block">
                                    <input type="text" style="outline:none;" name="CUSTOMER_Username" maxlength="30" placeholder="Username" required class="LoginInput"/>
                                </label>
                            </div>


                            <br>
                            <label class="block">
                                <input type="password" style="outline:none;" name="CUSTOMER_Password" maxlength="15" placeholder="Password" required class="LoginInput" />
                            </label>

                            <br>
                            <input class="LoginBtn" type="submit" value="LOGIN">

                            <br><br>

                        </form>
                        <form action = "reset-password.php">
                            <input class="FrgtPwdBtn" style="outline: none;" type="submit" value="Forgot Password?" >
                        </form>

                        <br>
                        <form action = "register.php">
                            <button onclick="window.location.href='register.php'" class="FrgtPwdBtn" style="outline: none;word-break: break-all;">Not a member? Click me!</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

</body>

</html>
<?php

if(isset($_POST['CUSTOMER_Username']) && isset($_POST['CUSTOMER_Password'])){

    $CUSTOMER_Username = $_POST['CUSTOMER_Username'];
    $CUSTOMER_Password= $_POST['CUSTOMER_Password'];

    //Query the database to use
    $sql = "select * from customer where CUSTOMER_Username = '$CUSTOMER_Username' and CUSTOMER_Password = '$CUSTOMER_Password'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    //check username and password validation
    if ($count == 1) {
        $_SESSION['CUSTOMER_Username']=$CUSTOMER_Username;
        $_SESSION['CUSTOMER_ID']= $row['CUSTOMER_ID'];
        echo "<script>
  Swal.fire({
    icon: 'success',
  title: 'CantikkAtHome Welcomes You !',
  html: 'Welcome back !',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
          window.location.href='index.php';               
  }

})
           
                     </script>";
    } else {
       echo "<script>Swal.fire(
                      'Invalid Username/Password entered!',
                      'Please check your credentials again !',
                      'error')
                      
                   </script>";
        //echo "<script>location.replace('Login.php')</script>";
    }
}
?>

