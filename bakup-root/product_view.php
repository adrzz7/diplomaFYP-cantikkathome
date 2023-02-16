<?php
	session_start();
    include 'connect.php';
		if(!isset($_SESSION["CUSTOMER_Username"]) ) {
    header("Location:Login.php");
	}

$prodid = $_GET['prodid'];
$userid=$_SESSION['CUSTOMER_ID'];


$result= mysqli_query($connect,"SELECT * FROM product WHERE PRODUCT_ID  ='$prodid'" );
$prodRow= mysqli_fetch_assoc($result);


 $ress = mysqli_query($connect,"SELECT 	CART_CartID FROM cart WHERE CART_CustID ='$userid'" );
 $cartRow=mysqli_fetch_assoc($ress);

$prefix="CART";
         if (mysqli_num_rows($ress)==0 )
         {
            $cartid =uniqid($prefix);
						$resu = mysqli_query($connect,"SELECT CART_CartID FROM cart  " );

             while( $row2=mysqli_fetch_assoc($resu) ){
                  if ( $cartid == $row2['CART_CartID'] )
									{  $cartid =uniqid($prefix);     }
						 }
         }
				 else {
				 	 $cartid=$cartRow['CART_CartID'];
				 }

echo $cartid;


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Manage Product</title>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/inter-ui@3.11.0/inter.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style media="screen">
 <?php include 'style.scss'; ?>
</style>
 	</head>
   <body>

		 <nav class="navbar navbar-default navbar-fixed-top">
		     <div class="container">
		         <!-- Brand and toggle get grouped for better mobile display -->
		         <div class="navbar-header page-scroll">
		             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                 <span class="sr-only">Toggle navigation</span>
		                 <span class="icon-bar"></span>
		                 <span class="icon-bar"></span>
		                 <span class="icon-bar"></span>
		             </button>
		             <a class="navbar-brand" href="home.php" ><img src="picture/logo.png" alt="UEL" name="UEL" height='34px'></a>

		         </div>
		         <!-- Collect the nav links, forms, and other content for toggling -->
		         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		             <ul class="nav navbar-nav navbar-right">
		                 <li class="hidden">
		                     <a href="#page-top"></a>
		                 </li>
		                 <li class="page-scroll">
		                   <div class="wrap">
		                       <a href=Tutorial.php><button class="bt">Tutorial</button></a>
		                 </div>
		                 </li>
		                 <li class="page-scroll">
		                 <div class="wrap">
		                     <a href=product_cust.php><button class="bt">Product</button></a>
		                 </div>
		                 </li>
		                 <li class="page-scroll">
		                     <div class="wrap">
		                         <a href=Feedback.php><button class="bt">Feedback</button></a>
		                     </div>
		                 </li>
		                 <li class="page-scroll">
		                 <div class="wrap">
		                     <a href=consultation.php><button class="bt">Consultation</button></a>
		                 </div>
		                 </li>
		                 <li class="page-scroll">
		                     <div class="wrap">
		                         <a href=cart.php><button style="border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/cart.png" style="width:40px;"></button></a>
		                     </div>
		                 </li>
		                 <li class="page-scroll">
		                     <div class="wrap">
		                         <a href=userprofile.php><button style="border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/profile.png" style="width:40px;"></button></a>
		                     </div>
		                 </li>

		             </ul>
		         </div>
		         <!-- /.navbar-collapse -->
		     </div>
		     <!-- /.container-fluid -->
		 </nav>







		  <div class="wrapper">
		  	<div class="product-info">
		  		<div class="ls-preview">
		 <img src="rex.png" alt="" style="width:280px">
		  		</div>
		  		<div class="ls-details">
		  			<h2 style="font-weight: 500">Bite Beauty</h2>
		 			<br><br>

		  			<h1>Amuse Bouche</h1>
		 			<br><br>

		  			<h2 style="opacity: 0.5">$26.00 USD</h2>
		 			<br><br>

		  			<p>High-impact, handcrafted lipsticks in dimensional shades.</p>
		 			<br><br>


<form class="" action="cart_action.php" method="post">

	<input type="hidden" name="prodid" value="<?php echo $prodRow['PRODUCT_ID']; ?>">
	<input type="hidden" name="cartid" value="<?php echo $cartid; ?>">

	<span class="dec">
	<i class="fa fa-minus-square" aria-hidden="true" onclick="mySubmit(this.form)"></i>
	</span>
									<input class="num" type="text" name="qtyy" value="1"  >
	<span class="inc">
<i class="fa fa-plus-square" aria-hidden="true" onclick="mySubmit(this.form)" > </i>
</span>


									<button class="button" onclick="mySubmit(this.form)" >
									<span>Add to cart</span>
									<div class="cart">
											<svg viewBox="0 0 36 26">
													<polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
													<polyline points="15 13.5 17 15.5 22 10.5"></polyline>
											</svg>
									</div>
								</button>
			</form>

		  		</div>
		  	</div>

		  </div>


		  		<script>
		 			$(document).ready(function() {
		 			    $('#btn').click(function() {
		 			        $('#btn').toggleClass("cart_clk");

		 			    });
		 			    $("#btn").one("click", function() {
		 			        $('.cart .fa').attr('data-before', '1');
		 			    });

		 			    var prnum = $("[name='qtyy']").text();
		 			    $('.inc').click(function() {
		 			        //if (prnum > 0) {
		 			            prnum++;
		 			            $("[name='qtyy']").val(prnum);
		 			            $('.cart .fa').attr('data-before', prnum);
		 			        //}

		 			    });
		 			    $('.dec').click(function() {
		 			        if (prnum > 1) {
		 			            prnum--;
		 			            $("[name='qtyy']").val(prnum);
		 			            $('.cart .fa').attr('data-before', prnum);
		 			        }

		 			    });

		 			});



					function mySubmit(theForm) {
					    $.ajax({ // create an AJAX call...
					        data: $(theForm).serialize(), // get the form data
					        type: $(theForm).attr('method'), // GET or POST
					        url: $(theForm).attr('action') // the file to call

					    });
					}






					document.querySelectorAll('.button').forEach(button => button.addEventListener('click', e => {
				      if(!button.classList.contains('loading')) {

				          button.classList.add('loading');

				          setTimeout(() => button.classList.remove('loading'), 3700);

				      }
				      e.preventDefault();
				  }));


		  		</script>
		  	</div>
 	</div>

	<footer class="container" style="min-height:200px; background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);color:#fff;text-align:left;padding-top:50px;">
    <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>FIND US AT</h4>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                <h5 class="headin5_amrc col_white_amrc pt2">STAY CONNECT</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                    <p><i class="fa fa-phone"></i>  +6013 0909093  </p>
                    <p><i class="fa fa fa-envelope"></i> cantikkathome@gmail.com  </p>

                </div>
                <div class="col-lg-4">
                <div class=" col-sm-4 col-md  col-12 col">
                <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
                 <ul class="footer_ul2_amrc">
                <li><a href="#"><img src="picture/facebook.png" ></i> </a><p><a href="#"></a></p></li>
                <li><a href="#"><img src="picture/twitter.png" ></i> </a><p><a href="#"></a></p></li>
                <li><a href="#"><img src="picture/instagram.png"></i> </a><p><a href="#"></a></p></li>
                </ul>

                </div>
                                </div>
            </div>



    </footer>
  </body>
</html>
