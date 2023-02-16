<?php
session_start();
	include '../connect.php';
	if(!isset($_SESSION["CUSTOMER_Username"]) ){
	header("Location:MainPage.php");
}

$userid=$_SESSION['CUSTOMER_ID'];
					$view = mysqli_query($connect,"SELECT * FROM customer WHERE CUSTOMER_ID  = '$userid'");
					$row = mysqli_fetch_assoc($view);

				//	if($pic == " ")
				//		$path = 'pic/default.jpg';
				//	else
				//	$path = 'pic/'.$pic;



	if (isset($_POST['updateinfo'])) {
		//Convert Profile picture file
	  $image = addslashes($_FILES['profpic']['tmp_name']);
	  $image = file_get_contents($image);
	  $image = base64_encode($image);

	$FirstName =$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$ContactNum=$_POST['ContactNum'];
	$Email=$_POST['Email'];
	$Address=$_POST['Address'];
	$Password=$_POST['Password'];



$sql = "UPDATE customer SET CUSTOMER_FirstName='$FirstName'  , 	CUSTOMER_LastName	='$LastName'    , CUSTOMER_ContactNum	='$ContactNum'   ,CUSTOMER_Email	='$Email' ,CUSTOMER_Address	= '$Address' , CUSTOMER_Password	='$Password' , CUSTOMER_ImageName='$image' WHERE CUSTOMER_ID   ='$userid'" ;
$update = mysqli_query($connect,$sql);

if ($update) {
?>

<script type="text/javascript">
window.location.href='userprofile.php';
</script>
<?php
}



	}
				?>

				<!DOCTYPE html>
				<html lang="en">
				    <head>
				        <meta charset="utf-8">
				        <meta http-equiv="X-UA-Compatible" content="IE=edge">
				        <meta name="viewport" content="width=device-width, initial-scale=1">
				        <meta name="description" content="">
				        <meta name="author" content="">

				        <title>Welcome <?php echo $row['CUSTOMER_Username'];?> </title>

								<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 						   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 						   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 						   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 						 	<script src="js/jquery-3.5.1.min.js"></script>
 						  <script src="js/bootstrap.min.js"></script>
							<script type="text/javascript">

							function myFunction() {
						  var x = document.getElementById("myInput");
						  if (x.type === "password") {
						    x.type = "text";
						  } else {
						    x.type = "password";
						  }
						}

							</script>
				    </head>
				    <body>

							<div class="nav">
							 <?php include 'header.php';?>
					 </div>

				        <div id="wrapper">





				            <div id="page-wrapper">
				                <div class="container-fluid">

				                    <!-- Page Heading -->
				                    <div class="row">
				                        <div class="col-lg-12">
				                            <h2 class="page-header">
				                            </h2>
				                            <ol class="breadcrumb">
				                                <li class="active">
				                                    <i class="fa fa-calendar"></i> User Profile
				                                </li>
				                            </ol>
				                        </div>
				                    </div>
				                    <!-- Page Heading end-->

				                    <!-- panel start -->
				                    <div class="panel panel-primary">

				                        <!-- panel heading starat -->
				                        <div class="panel-heading">
				                            <h3 class="panel-title">User Details</h3>
				                        </div>
				                        <!-- panel heading end -->

				                        <div class="panel-body">
				                        <!-- panel content start -->
				                          <div class="container">
				            <section style="padding-bottom: 50px; padding-top: 50px;">
				                <div class="row">
				                    <!-- start -->
				                    <!-- USER PROFILE ROW STARTS-->
				                    <div class="row">
				                        <div class="col-md-3 col-sm-3">

				                            <div class="user-wrapper">
																			<img src=data:image;base64,<?php echo $row['CUSTOMER_ImageName']; ?> width="100px" />
				                                <div class="description">
				                                    <h4><?php echo $row['CUSTOMER_FirstName']; ?> <?php echo $row['CUSTOMER_LastName']; ?></h4>
				                                    <h5> <strong> User </strong></h5>

				                                    <hr />
				                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
				                                </div>
				                            </div>
				                        </div>

				                        <div class="col-md-9 col-sm-9  user-wrapper">
				                            <div class="description">
				                                <h3> <?php echo $row['CUSTOMER_FirstName']; ?> <?php echo $row['CUSTOMER_LastName']; ?> </h3>
				                                <hr />

				                                <div class="panel panel-default">
				                                    <div class="panel-body">


				                                        <table class="table table-user-information" align="center">
				                                            <tbody>


				                                                <tr>
				                                                    <td>User ID</td>
				                                                    <td><?php echo $row['CUSTOMER_ID']; ?></td>
				                                                </tr>
				                                                <tr>
				                                                    <td>Username</td>
				                                                    <td><?php echo $row['CUSTOMER_Username']; ?></td>
				                                                </tr>
				                                                <tr>
				                                                    <td>First Name</td>
				                                                    <td><?php echo $row['CUSTOMER_FirstName']; ?></td>
				                                                </tr>
				                                                <tr>
				                                                    <td> Last Name</td>
				                                                    <td><?php echo $row['CUSTOMER_LastName']; ?></td>
				                                                </tr>
				                                                <tr>
				                                                    <td>Contact Number</td>
				                                                    <td><?php echo $row['CUSTOMER_ContactNum']; ?>
				                                                    </td>
				                                                </tr>
				                                                <tr>
				                                                    <td>Email</td>
				                                                    <td><?php echo $row['CUSTOMER_Email']; ?>
				                                                    </td>
				                                                </tr>
				                                                <tr>
				                                                    <td>Address</td>
				                                                    <td><?php echo $row['CUSTOMER_Address']; ?>
				                                                    </td>
				                                                </tr>
				                                            </tbody>
				                                        </table>
				                                    </div>
				                                </div>

				                            </div>

				                        </div>
				                    </div>
				                    <!-- USER PROFILE ROW END-->


														<div class="col-md-4">

				                        <!-- Large modal -->

				                        <!-- Modal -->
				                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				                            <div class="modal-dialog" role="document">
				                                <div class="modal-content">
				                                    <div class="modal-header">
																							<h4 class="modal-title" id="myModalLabel" >Update Profile</h4>
				                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                                    </div>
				                                    <div class="modal-body">
				                                        <!-- form start -->
																								<form action="" id="form" method="post" name="form" enctype="multipart/form-data">
				                                            <table class="table table-user-information">
				                                                <tbody>
				                                                    <tr>
				                                                        <td>Username:</td>
				                                                        <td>

																																	<input type="text" class="form-control" name="Username" disabled value="<?php echo $row['CUSTOMER_Username']; ?>"  />  </td>
				                                                    </tr>
				                                                    <tr>
				                                                        <td>First Name:</td>
				                                                        <td><input type="text" class="form-control" name="FirstName" value="<?php echo $row['CUSTOMER_FirstName']; ?>"  /></td>
				                                                    </tr>
				                                                    <tr>
				                                                        <td>Last Name</td>
				                                                        <td><input type="text" class="form-control" name="LastName" value="<?php echo $row['CUSTOMER_LastName']; ?>"  /></td>
				                                                    </tr>


				                                                    <tr>
				                                                        <td>Phone number</td>
				                                                        <td><input type="text" class="form-control" name="ContactNum" value="<?php echo $row['CUSTOMER_ContactNum']; ?>"  /></td>
				                                                    </tr>
				                                                    <tr>
				                                                        <td>Email</td>
				                                                        <td><input type="text" class="form-control" name="Email" value="<?php echo $row['CUSTOMER_Email']; ?>"  /></td>
				                                                    </tr>
				                                                    <tr>
				                                                        <td>Address</td>
				                                                        <td><textarea class="form-control" name="Address"  ><?php echo $row['CUSTOMER_Address']; ?></textarea></td>
				                                                    </tr>
																														<tr>
																															 <td>Password</td>
																															 <td> <input type="password" id="myInput" class="form-control" name="Password" value="<?php echo $row['CUSTOMER_Password']; ?>"  />
																																		 <input type="checkbox" onclick="myFunction()"/> Show Password
																															   </td>


																													 </tr>
																													 <tr>
																															<td>Profile picture </td>
																														<td>	<input type="file" id="profpic" name="profpic"   accept="image/*">

																																</td>


																													</tr>
				                                                    <tr>
				                                                        <td> <input type="submit"  name="updateinfo" class="btn btn-info" value="Update Info"> </td>
				                                                   </tr>
				                                                    </tbody>

				                                                </table>



				                                            </form>
				                                            <!-- form end -->
				                                        </div>

				                                    </div>
				                                </div>
				                            </div>
				                            <br /><br/>
				                        </div>

				                    </div>
				                        <!-- panel content end -->
				                        <!-- panel end -->
				                        </div>
				                    </div>
				                    <!-- panel start -->

				                </div>
				            </div>
										<script>
										// Disable form submissions if there are invalid fields
										(function() {
											'use strict';
											window.addEventListener('load', function() {
												// Get the forms we want to add validation styles to
												var forms = document.getElementsByClassName('needs-validation');
												// Loop over them and prevent submission
												var validation = Array.prototype.filter.call(forms, function(form) {
													form.addEventListener('submit', function(event) {
														if (form.checkValidity() === false) {
															event.preventDefault();
															event.stopPropagation();
														}
														form.classList.add('was-validated');
													}, false);
												});
											}, false);
										})();
										</script>
										<div class="nav">
										 <?php include 'footer.php';?>
									</div>
	</body>
</html>
