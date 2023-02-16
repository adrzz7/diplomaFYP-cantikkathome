<?php
session_start();
	include 'connect.php';
if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
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
window.location.href='profile-user.php';
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
				        <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">

                        <style>

                            .profileHeading{
                                padding: 10px;
                            }
                            .panel-title{
                                font-size: 22px;
                                font-weight: bold;
                            }
                            .details{
                                font-size: 14px;
                                color: #59595d;
                                margin-top: 1px;
                            }

                            .container-fluid{
                                width: 80%;
                                margin-top: 5%;
                            }

                            .buttonProf button{
                                background-image: linear-gradient(to right top, #d47ed4, #c051ca, #a730bb, #ab0ccf, #8e11bb);
                                border-radius: 40px;
                                color: white;
                                padding: 3%;
                                font-size: 100%;
                                margin: 0;
                                position: absolute;
                                top: 100%;
                                left: 30%;
                                outline: none;
                                -ms-transform: translate(-50%, -50%);
                                transform: translate(-50%, -50%);
                            }
                            .buttonProf button:hover{
                                color:#bc49bc ;
                                border: solid 2px #bc49bc;
                                background-image: linear-gradient(to right top, white, white);
                                cursor: pointer;
                            }
                            .user-wrapper2{
                                background-color: #ffffff;
                                border: 1px solid white;
                                border-radius: 40px;
                            }

                            /* On screens that are 600px wide or less*/
                            @media screen and (max-width: 774px) {
                                .user-wrapper2 {
                                    margin-top: 30%;
                                    background-color: #ffffff;
                                    border: 1px solid white;
                                }
                                .buttonProf {
                                    position: relative;
                                    margin-top: 5%;
                                }
                                .user-wrapper2 hr {
                                    width: 110%;
                                }
                            }
                            @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
                            /* HERE STARTS THE MAGIC */
                            header {
                                text-align: center;
                                color: #fff;
                                background: #D999EB;
                                background-repeat: repeat-y;
                                position: fixed;
                                width:100%;
                                z-index: 1;
                                height: 78%;
                                overflow: hidden;
                                top: 0;
                                left: 0;
                            }

                            .content-wrapper{
                                background-color: white;
                                top: 85%;
                                min-height: 12%;
                                position:absolute;
                                z-index: 2;
                                width: 100%;
                            }
                            /* HERE ENDS THE MAGIC */
                            header .container {
                                padding-top: 150px;
                                padding-bottom: 50px;
                            }

                            header img {
                                display: block;
                                margin: 0 auto 20px;
                            }

                            header .intro-text .name {
                                display: block;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-size: 2em;
                                font-weight: 700;
                            }

                            header .intro-text .skills {
                                font-size: 1.25em;
                                font-weight: 300;
                            }

                            section {
                                padding: 100px 0;
                                width: 100%;
                            }

                            section h2 {
                                margin: 0;
                                font-size: 3em;
                            }
                            hr.star-light,
                            hr.star-primary {
                                margin: 25px auto 30px;
                                padding: 0;
                                max-width: 250px;
                                border: 0;
                                border-top: solid 5px;
                                text-align: center;
                            }

                            hr.star-light:after,
                            hr.star-primary:after {
                                content: "\f005";
                                display: inline-block;
                                position: relative;
                                top: -.8em;
                                padding: 0 .25em;
                                font-family: FontAwesome;
                                font-size: 2em;
                            }

                            hr.star-light {
                                border-color: #fff;
                            }

                            hr.star-light:after {
                                color: #fff;
                                background-color: #18bc9c;
                            }

                            hr.star-primary {
                                border-color: #2c3e50;
                            }

                            hr.star-primary:after {
                                color: #2c3e50;
                                background-color: #fff;
                            }

                            section.primary h2{
                                color: #2c3e50;
                            }

                            section.success{
                                background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
                                color: #fff;
                            }
                            .card-block {
                                color:#fff;
                                font-size: 1em;
                                position: relative;
                                margin: 0;
                                padding: 1em;
                                border: none;
                                background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
                                border-top: 1px solid rgba(34, 36, 38, .1);
                                box-shadow: none;
                                box-shadow: 0px 15px 20px rgba(0, 0, 255, .2);


                            }
                            .text-bold {
                                font-weight: 700;
                            }
                            .card-text {
                                clear: both;
                                margin-top: .5em;
                                color:#fff;
                            }
                            .img-zoom-in img
                            {
                                transition:all .2s ease-in-out;
                                -webkit-transition:all .2s ease-in-out;
                                -moz-transition:all .2s ease-in-out;
                                -ms-transition:all .2s ease-in-out;
                                -o-transition:all .2s ease-in-out;
                            }

                            .img-zoom-in:hover img
                            {
                                transform:scale(1.1);
                                -webkit-transform:scale(1.1);
                                -moz-transform:scale(1.1);
                                -ms-transform:scale(1.1);
                                -o-transform:scale(1.1)
                            }

                            /* General button style (reset) */
                            .btn {
                                border: none;
                                font-family: inherit;
                                font-size: inherit;
                                color: inherit;
                                background: none;
                                cursor: pointer;
                                padding: 15px 30px;
                                display: inline-block;
                                margin: 15px 30px;
                                text-transform: uppercase;
                                letter-spacing: 1px;
                                font-weight: 700;
                                outline: none;
                                position: relative;
                                -webkit-transition: all 0.3s;
                                -moz-transition: all 0.3s;
                                transition: all 0.3s;
                            }

                            .btn:after {
                                content: '';
                                position: absolute;
                                z-index: -1;
                                -webkit-transition: all 0.3s;
                                -moz-transition: all 0.3s;
                                transition: all 0.3s;
                            }
                            /* Pseudo elements for icons */
                            .btn:before {
                                speak: none;
                                font-style: normal;
                                font-weight: normal;
                                font-variant: normal;
                                text-transform: none;
                                line-height: 1;
                                position: relative;
                                -webkit-font-smoothing: antialiased;
                            }
                            /* Button 6 */
                            .btn-6 {
                                color: #964CAA;
                                background: #fff;
                                -webkit-transition: none;
                                -moz-transition: none;
                                transition: none;
                            }

                            .btn-6:active {
                                top: 2px;
                            }

                            /* Button 6c */
                            .btn-6c {
                                border: 4px solid #fff;
                                border-radius: 60px;
                            }

                            .btn-6c:hover {
                                background: transparent;
                                color: #fff;
                                box-shadow: 0px 15px 20px rgba(0, 0, 255, .2);
                                transform: translateY(-7px);
                            }
                            .wrap {
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .bt {
                                width: 140px;
                                height: 45px;
                                font-family: 'Roboto', sans-serif;
                                font-size: 11px;
                                text-transform: uppercase;
                                letter-spacing: 2.5px;
                                font-weight: 500;
                                color: #000;
                                background-color: #fff;
                                border: none;
                                border-radius: 45px;
                                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                                transition: all 0.3s ease 0s;
                                cursor: pointer;
                                outline: none;
                            }

                            .bt:hover {
                                background-color: #d05bde;
                                box-shadow: 0px 15px 20px rgba(175, 60, 189, 0.4);
                                color: #fff;
                                transform: translateY(-7px);
                            }

                            html {
                                o-repeat center center fixed;
                                -webkit-background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                background-size: cover;
                            }
                            body, html {
                                height: 100%;
                                margin: 0;
                                font-family: Arial, serif;
                            }
                            /* Navigation Bar*/

                            .header a{
                                float : right;
                                display:block;
                                color : black;
                                text-align:center;
                                font-size:26px;
                                padding: 14px 16px;
                                text-decoration:none;
                            }

                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }

                            .dropdown .dropbtn {
                                font-size: 15px;
                                border: none;
                                outline: none;
                                color: white;
                                padding: 14px 16px;
                                background-color: inherit;
                                font-family: inherit;
                                margin: 0;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: white;
                                color: black;
                                min-width: 150px;
                                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                                z-index: 1;
                                right:0;
                            }

                            .dropdown-content a {
                                float: none;
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                text-align: left;
                            }

                            .dropdown-content a:hover {
                                background-color: #ddd;
                            }

                            .dropdown:hover .dropdown-content {
                                display: block;
                            }
                            /*eND OF NAVIGATION BAR CSS*/


                        </style>


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

                    <div class="nav">
                        <?php include 'header.php';?>
                    </div>


				    <body style="background-color: #f5f5f5">
				        <div id="wrapper">

				            <div id="page-wrapper" style="background-color: #f5f5f5">

				                <div class="container-fluid">

				                    <!-- Page Heading -->
				                    <div class="row">
				                        <div class="col-lg-15">
				                        </div>
				                    </div>
				                    <!-- Page Heading end-->

				                    <!-- panel start -->
				                    <div class="">

				                        <!-- panel heading starat -->
				                        <div class="profileHeading">
				                            <h3 class="panel-title">My Profile</h3>
                                            <h1 class="details">Manage your profile details</h1>
                                            <hr>
				                        </div>
				                        <!-- panel heading end -->

				                        <div class="panel-body" >
				                        <!-- panel content start -->
				                          <div class="container">
				                            <section style="padding-bottom: 50px; padding-top: 50px; margin-top: -50px">
                                                <div class="row">
                                                    <!-- start -->
                                                    <!-- USER PROFILE ROW STARTS-->
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-3" >

                                                            <div class="user-wrapper">
                                                                                            <img src=data:image;base64,<?php echo $row['CUSTOMER_ImageName']; ?> width="100px" />
                                                                <div class="description">
                                                                    <h4><?php echo $row['CUSTOMER_FirstName']; ?> <?php echo $row['CUSTOMER_LastName']; ?></h4>
                                                                    <h5 style="margin-bottom: -10px;"> <strong> User </strong></h5>

                                                                    <hr />
                                                                    <div class="buttonProf">
                                                                        <button type="button" style="outline: none;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
                                                                        <a href=order-history.php><button class="btn btn-primary" style="margin-top: 55px;outline: none;">Order History</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-9 col-sm-9  user-wrapper2" style="">
                                                            <div class="description" >
                                                                <h3 > <?php echo $row['CUSTOMER_FirstName']; ?> <?php echo $row['CUSTOMER_LastName']; ?> </h3>


                                                                <div class="">
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
                                                                                        <td> <input type="submit"  name="updateinfo" class="btn-6" value="Update Info"> </td>

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
                                <!--  FOOTER -->
                                <div class="footer">
                                    <?php include 'footer.php';?>
                                </div>
                                <!--   FOOTER END -->
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



                                <!-- Start of LiveChat (www.livechatinc.com) code -->
                                <script>
                                    window._lc = window._lc || {};
                                    window.__lc.license = 12604245;
                                    ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
                                </script>
                                <noscript><a href="https://www.livechatinc.com/chat-with/12604245/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
                                <!-- End of LiveChat code -->
	</body>


</html>
