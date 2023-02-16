<?php include ('connect.php');

// REGISTER USER
if (isset($_POST['reg_user']))
{

  // receive all input values from the form
  $Username = $_POST["Username"];
  $Email = $_POST["Email"];
  $Password1 = $_POST["Password1"];

  $Username = mysqli_real_escape_string($connect, $Username);
  $Email = mysqli_real_escape_string($connect, $Email);
  $Password1 = mysqli_real_escape_string($connect, $Password1);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Username)) { array_push($errors, "Username is required"); }
  if (empty($Password1)) { array_push($errors, "Password is required"); }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $sql = "SELECT CUSTOMER_Username from customer where CUSTOMER_Username = '$Username' ";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //$user = $_POST['Username'];
  //$usernamecheck=mysqli_query("select * from customer where Username = '$Username'");
if(mysqli_num_rows($result)==1){
    echo "<script>alert('Username is taken!') ;
    window.location='register.php'</script>";
 }else{

  // Finally, register user if there are no errors in the form


  	$query = "INSERT INTO customer (CUSTOMER_Username, CUSTOMER_Email, CUSTOMER_Password)
  			  VALUES('$Username', '$Email', '$Password1')";
  	mysqli_query($connect, $query);
  	$_SESSION['Username'] = $Username;
  	$_SESSION['success'] = "You are now logged in";
  	print '<script>alert("You are successfully registered!");</script>';
	print '<script>window.location.assign("Login.php");</script>';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>REGISTRATION PAGE</title>
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


	.RegLeft{
		float:left;
		width:40%;
		text-align: center;
		font-size:180%;
	}

	.RegRight{
		float:left;
		width:40%;
		text-align: center;
	}

	.RegBorder{
		border: 10px solid white;
		border-radius: 50px;
		width:450px;
		height:500px;
		padding: 5px;
        margin: 2% 5px 5px 10%;
        background-color:#F1F1F1;
	}

	.Welcome{
		font-size:110%;
	}

	.RegUsername{
		font-size:145%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
	}

    .RegEmail{
		font-size:145%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
	}

	.RegPwd{
		font-size:145%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
	}

    .confirmpwd{
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


	.RegBtn{
		font-weight:bolder;
		font-size: 250%;
		background-color:#4F3A83;
		color:#F3BF3F;
		border-radius: 30px;
		width:300px;
		height:70px;
	}

	.LoginBtn{
		padding: 0;
		border: none;
		background: none;
		font-size:110%;
	}

	.RegBtn:hover{
		background-color:#8A68DF;
		cursor:pointer;
	}

	.LoginBtn:hover{
		color:#626160;
		cursor:pointer;
	}

</style>
</head>

<body>
<div class="Register">
<div class="TitleHeader">
	<h1>CantikkAtHome</h1>
</div>

<div class="RegBody">
	<div class="RegLeft">
	<h1>You're just one step<br> away to your<br>Beauty world!<br></h1>
	</div>
	<div class="RegRight">
	<div class="RegBorder">
		<div class="Welcome">
		<h1>CREATE YOUR ACCOUNT!!</h1>
		</div>
		<form action="Register.php" method="POST">
			<div class="RegUsername">
				<p>
				<i class="fa fa-user icon"></i>
                    <label>
                        <input type="text" name="Username" size="15" maxlength="15" placeholder="Username" required autofocus class="RegUsername"/>
                    </label>
                </p>
            </div>
            <div class="RegEmail">
				<p>
				<i class="fa fa-envelope icon"></i>
                    <label>
                        <input type="text" name="Email" size="15" maxlength="15" placeholder="Email" required autofocus class="RegEmail"/>
                    </label>
                </p>
			</div>
			<div class="RegPwd">
				<p>
				<i class="fa fa-key icon" style="font-size: 180%; color:black"></i>
                    <label>
                        <input type="password" name="Password1" size="15" maxlength="15" placeholder="Password" required class="RegPwd" />
                    </label>
                </p>
            </div>
			<br>
            <input class="RegBtn" type="submit" value="REGISTER" name="reg_user"><br><br>
            <a href = "Login.php" class="LoginBtn" type="submit" >Already a member? Click Here</a>

		</form>
	</div>
	</div>

</div>
</div>
</body>

</html>
