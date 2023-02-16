<?php include ('connect.php');



?>

<!DOCTYPE html>
<html>

<head>
<title>Registration</title>
<link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    body{
        background-image: linear-gradient(to right top, #fff, #ba63c3, #a122b5, #571d9d, #30144C);
        padding:20px;
        font-family: "Times New Roman", Times, serif;
    }

	.TitleHeader{
		font-family: "Times New Roman", Times, serif;
		font-size:120%;
		padding-left:20px;
		padding-right:20px;
	}

	
	.RegLeft{
		float:left;
		width:40%;
		text-align: center;
		font-size:160%;
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
		font-size:125%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
        outline:none;
	}

    .RegEmail{
		font-size:125%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
        outline:none;
	}
	
	.RegPwd{
		font-size:125%;
		border-radius: 20px;
		text-align: center;
		font-weight:bolder;
        outline:none;
	}

    .confirmpwd{
		font-size:125%;
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
        font-size: 200%;
        background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
        color: #fff;
        border-radius: 30px;
        width:200px;
        height:60px;
        outline:none;
	}
	
	.LoginBtn{
        padding: 0;
        border: none;
        background: none;
        color:black;
        font-size:140%;
        outline:none;
	}
	
	.RegBtn:hover{
        color:#bc49bc ;
        border: solid 2px #bc49bc;
        background-image: linear-gradient(to right top, white, white);
        cursor:pointer;
	}
	
	.LoginBtn:hover{
        color: #585656;
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
		<form action="register.php" method="POST">
			<div class="RegUsername">
				<p>
				<i class="fa fa-user icon"></i>
                    <label>
                        <input type="text" name="CUSTOMER_Username" size="15" maxlength="25" placeholder="Username" required autofocus class="RegUsername"/>
                    </label>
                </p>
            </div>
            <div class="RegEmail">
				<p>
				<i class="fa fa-envelope icon"></i>
                    <label>
                        <input type="email" name="CUSTOMER_Email" size="15" maxlength="35" placeholder="Email" required autofocus class="RegEmail"/>
                    </label>
                </p>
			</div>
			<div class="RegPwd">
				<p>
				<i class="fa fa-key icon" style="font-size: 180%; color:black"></i>
                    <label>
                        <input type="password" name="CUSTOMER_Password" size="15" maxlength="15" placeholder="Password" required class="RegPwd" />
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
<?php include ('connect.php');

// REGISTER USER
if (isset($_POST['reg_user'])) 
{

  // receive all input values from the form
  $CUSTOMER_Username = $_POST["CUSTOMER_Username"];
  $CUSTOMER_Email = $_POST["CUSTOMER_Email"];
  $CUSTOMER_Password = $_POST["CUSTOMER_Password"];

  $CUSTOMER_Username = mysqli_real_escape_string($connect, $CUSTOMER_Username);
  $CUSTOMER_Email = mysqli_real_escape_string($connect, $CUSTOMER_Email);
  $CUSTOMER_Password = mysqli_real_escape_string($connect, $CUSTOMER_Password);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($CUSTOMER_Username)) { array_push($errors, "Username is required"); }
  if (empty($CUSTOMER_Password1)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $sql = "SELECT CUSTOMER_Username from customer where CUSTOMER_Username = '$CUSTOMER_Username' ";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //$user = $_POST['Username'];
  //$usernamecheck=mysqli_query("select * from customer where Username = '$Username'");
if(mysqli_num_rows($result)==1){
 echo "<script>Swal.fire(
                      'Username is taken!',
                      'Please type new username !',
                      'error')
                      
                   </script>";
 }else{

  // Finally, register user if there are no errors in the form
  

  	$query = "INSERT INTO customer (CUSTOMER_Username, CUSTOMER_Email, CUSTOMER_Password) 
  			  VALUES('$CUSTOMER_Username', '$CUSTOMER_Email', '$CUSTOMER_Password')";
  	mysqli_query($connect, $query);
  	$_SESSION['CUSTOMER_Username'] = $CUSTOMER_Username;
      echo "<script>
  Swal.fire({
    icon: 'success',
  title: 'CantikkAtHome Welcomes You !',
  html: 'You are succesfully registered ! We will now take you to Login page !',
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
          window.location.href='Login.php';               
  }

})
           
                     </script>";
  }
}

?>

