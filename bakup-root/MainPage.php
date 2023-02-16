<?php
	session_start();
  include 'connect.php';
	if(!isset($_SESSION["CUSTOMER_Username"])){
    header("Location:MainPage.php");
  }

?>

<!DOCTYPE html>
<head>
  <!-- Site made with Mobirise Website Builder v4.8.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="Latest HTML Bootstrap Layout Templates - Download Now">
  <title>HTML Bootstrap Layout Templates</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<title>HomePage</title>
	<title>Consultation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
<style media="screen">
	 body { background-color: #fdfcee;}

	 	/* Some custom styles to beautify this example */
	     .demo-content{
	         padding: 15px;
	         font-size: 18px;
	         min-height: 50px;
	         background: #dbdfe5;
	         margin-bottom: 15px;
	     }
	     .demo-content.bg-alt{
	         background: #abb1b8;
	     }
	 </style>

</head>





        <body>
					<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
					  <a class="navbar-brand" href="#">Navbar</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="collapsibleNavbar">
					    <ul class="navbar-nav">
					      <li class="nav-item">
					        <a class="nav-link" href="consultation.php">Consultation</a>
					      </li>
                <li class="nav-item">
                 <a class="nav-link" href="product_cust.php">PRODUCT</a>
               </li>
					      <li class="nav-item">
					        <a class="nav-link" href="LogOut.php">LOG OUT</a>
					      </li>

								<li class="nav-item">
					        <a class="nav-link" href="userprofile.php">Profile</a>
					      </li>

					    </ul>
					  </div>
					</nav>



					<div class="jumbotron text-center" style="margin:0px;  background: #fdfcee">

						<div class="row">
					 	 <div class="media">
					 	 <div class="media-left" >
					 		 <img src="user/homepagemodel.png" class="img-responsive"style="width:540px"  >
					 	 </div>

					 	 <div class="media-body" style="padding-left:50px; font-size:20px">

					 		 <p>Cantik at Home</p>
					 			<p>Beauty comes from the inside,
					 			 inside your sweet home too.</p>
					 	 </div>

					  </div>


					  </div>


					</div>






	<div class="container" style="padding-left:200px">
							<div class="row text-center">

							      <div class="col-lg-3 col-md-6 mb-4">
							        <div class="card h-100">
							          <img class="card-img-top" src="user/service1.png" alt="">
							          <div class="card-body">
							            <h4 class="card-title">Card title</h4>
							            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
							          </div>
							          <div class="card-footer">
							            <a href="#" class="btn btn-primary">Find Out More!</a>
							          </div>
							        </div>
							      </div>

							      <div class="col-lg-3 col-md-6 mb-4">
							        <div class="card h-100">
							          <img class="card-img-top" src="user/service2.png" alt="">
							          <div class="card-body">
							            <h4 class="card-title">Card title</h4>
							            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
							          </div>
							          <div class="card-footer">
							            <a href="#" class="btn btn-primary">Find Out More!</a>
							          </div>
							        </div>
							      </div>

							      <div class="col-lg-3 col-md-6 mb-4">
							        <div class="card h-100">
							          <img class="card-img-top" src="user/service2.png" alt="">
							          <div class="card-body">
							            <h4 class="card-title">Card title</h4>
							            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
							          </div>
							          <div class="card-footer">
							            <a href="#" class="btn btn-primary">Find Out More!</a>
							          </div>
							        </div>
							      </div>



							    </div>
							    <!-- /.row -->

							  </div>
							  <!-- /.container -->

								<div class="container mt-3">
								        <div class="row">
								            <div class="col-4">
								                <div class="demo-content">.col-4
																				<img class="card-img-top" src="user/service1.png" alt="">
																				   <p>lorem</p>
																</div>
								            </div>

														<div class="col-4">
 															 <div class="demo-content">.col-4
 																			 <img class="card-img-top" src="user/service1.png" alt="">
 																					<p>lorem</p>
 															 </div>
 													 </div>

													 <div class="col-4">
															 <div class="demo-content">.col-4
																			 <img class="card-img-top" src="user/service1.png" alt="">
																					<p>lorem</p>
															 </div>
													 </div>
								        </div>
								    </div>



										<div class="container mt-3">
										  <h1>Grid</h1>
										  <p>This example demonstrates a 50%/50% split on small, medium and large devices. On extra small devices, it will stack (100% width).</p>
										  <p>Resize the browser window to see the effect.</p>
										  <div class="row">
										    <div class="col-sm-6" style="background-color:yellow; margin:50px">
										      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
										      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										    </div>
										    <div class="col-sm-6" style="background-color:pink;  margin:50px">
										      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
										    </div>
										  </div>
										</div>
        </body>

        <?php
	//}else{
		//header("Location:Login.php");
	//}
?>
