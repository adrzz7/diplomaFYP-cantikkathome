
<?php
	session_start();


		include '../connect.php';

		if(isset($_POST['Username']) && isset($_POST['Password'])){

			$Username = $_POST['Username'];
			$Password= $_POST['Password'];

			//Query the database to use
			$sql = "SELECT * from customer where CUSTOMER_Username = '$Username' AND CUSTOMER_Password = '$Password'";
			$result = mysqli_query($connect, $sql);
			$row = mysqli_fetch_array($result);
			$count = mysqli_num_rows($result);

                //check username and password validation
                if ($count == 1) {
                    //echo "Login Successful!! Welcome ".$row['Username'];
                    $_SESSION['CUSTOMER_Username']=$Username;
										$_SESSION['CUSTOMER_ID']= $row['CUSTOMER_ID'];
										header('Location:MainPage.php');


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
	.TitleHeader{
		font-family: "Times New Roman", Times, serif;
		font-size:120%;
		padding-left:20px;
		padding-right:20px;
	}

	body{
		background-color:#FEFEE8;
		padding:20px;
		font-family: "Times New Roman", Times, serif;
	}


	.LoginLeft{
		float:left;
		width:40%;
		text-align: center;
		font-size:180%;
	}

	.LoginRight{
		float:left;
		width:40%;
		text-align: center;
	}

	.LoginBorder{
		border: 10px solid white;
		border-radius: 50px;
		width:450px;
		height:460px;
		padding: 5px;
        margin: 2% 5px 5px 10%;
        background-color:#F1F1F1;
	}

	.Welcome{
		font-size:155%;
	}

	.LoginUsername{
		font-size:145%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
	}

	.LoginPwd{
		font-size:145%;
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
		font-size: 250%;
		background-color:#4F3A83;
		color:#F3BF3F;
		border-radius: 30px;
		width:200px;
		height:70px;
	}

	.RegBtn{
		padding: 0;
		border: none;
		background: none;
        color:black;
		font-size:140%;
	}

	.LoginBtn:hover{
		background-color:#8A68DF;
		cursor:pointer;
	}

	.RegBtn:hover{
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
	<div class="LoginLeft">
	<h1>You're just one step<br> away to your<br>Beauty world!<br></h1>
	</div>
	<div class="LoginRight">
	<div class="LoginBorder">
		<div class="Welcome">
		<h1>Hi, Welcome Back!</h1>
		</div>
		<form action="" method="POST">
			<div class="LoginUsername">
				<i class="fa fa-user icon" style="font-size: 180%; color:black"></i>
                    <label>
                        <input type="text" name="Username" size="15" maxlength="25" placeholder="Username" required class="LoginUsername"/>
                    </label>
			</div>
			<div class="LoginPwd">
				<br><i class="fa fa-key icon" style="font-size: 180%; color:black"></i>
                    <label>
                        <input type="password" name="Password" size="15" maxlength="25" placeholder="Password" required class="LoginPwd" />
                    </label>
			</div>
            <br>
			<input class="LoginBtn" type="submit" value="LOGIN"><br><br>
		</form>

        <form action = "ForgotPassword.php">
            <input class="FrgtPwdBtn" type="submit" value="Forgot Password?"><br><br>
        </form>
        <a href = "register.php"  class="RegBtn" type="submit" >Not a member? Click Here</a>
	</div>
	</div>

</div>
</div>
</body>

</html>
