<?php
    session_start();

   include 'connect.php';

   
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<!--Bootsrap 4 CDN-->
	<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url(image1.jpg);
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 470px;
margin-top: auto;
margin-bottom: auto;
width: 600px;
background-color: rgba(0,0,0,1) !important;
padding-top:50px;
border-radius:40px;
  border-bottom: 10px solid #9F6899FF;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #7f5feb;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h2{
    text-align:center;
color: white;

}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}



input[type = "text"],input[type = "password"] {
  display: block;
  margin: 20px auto;
  background: #262e49;
  border: 0;
  border-radius: 5px;
  padding: 14px 10px;
  width: 320px;
  outline: none;
  color: #d6d6d6;
  text-align:center;

}

input[type=text]:focus, input[type=password]:focus {
  width: 350px;
  border: 2px solid;
  background:black;
}


.card-header h2 span {
  color: #7f5feb;
  font-weight:bolder;
}

.btn1 {
  border:0;
  background: #7f5feb;
  color: #dfdeee;
  border-radius: 100px;
  width: 140px;
  height: 49px;
  font-size: 16px;
  position: absolute;
  top: 65%;
  left: 35%;
  transition: 0.3s;
  cursor: pointer;
}

.btn1:hover {
  background: #5d33e6;
}

.links{
color: white;
}

 a{
    text-decoration:none;
margin-left: 4px;
color: white;
}
    </style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h2>WELCOME BACK, <span>ADMIN</span> !</h2>
				<div class="d-flex justify-content-end social_icon">
                <a href="#"><span><i class="fab fa-facebook-square"></i></span></a>
                <a href="https://www.google.com/gmail/"><span><i class="fab fa-google-plus-square"></i></span></a>
                <a href="https://trytestcubakl.000webhostapp.com/admin/index.php"><span><i class="fa fa-globe" aria-hidden="true"></i></span></a>
				</div>
			</div>
			<div class="card-body">
				<form action="Admin_Login.php" method="post">
						<input type="text" name="ADMIN_Username" class="form-control" placeholder="username" required>
						
						<input type="password" name="ADMIN_Password" class="form-control" placeholder="password" required>
                    
                        <input type="submit" name="LoginBtn" value="Login" class="btn1">
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php


    if(isset($_POST['LoginBtn']) ){

        $ADMIN_Username = $_POST['ADMIN_Username'];
        $ADMIN_Password= $_POST['ADMIN_Password'];

        //Query the database to use
    //    $sql =;
        $results = mysqli_query($connect,  "SELECT * FROM admin WHERE ADMIN_Username = '$ADMIN_Username' AND ADMIN_Password = '$ADMIN_Password'");
        $row = mysqli_fetch_array($results);

              //check username and password validation
        if( $row == null ) {
             echo "<script>Swal.fire(
                      'Invalid Username/Password entered!',
                      'Please check your credentials again !',
                      'error')
                   </script>"
                   ;

        } else {  $_SESSION['ADMIN_Username']=$ADMIN_Username;
                echo "<script>
  Swal.fire({
    icon: 'success',
  title: 'CantikkAtHome Welcomes You !',
  html: 'Welcome back Admin !',
  timer: 3000,
  timerProgressBar: true,
    showConfirmButton: false,
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
        }
    }
    ?>