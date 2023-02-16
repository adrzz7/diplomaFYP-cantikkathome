<?php
	session_start();
    include '../connect.php';
		if(!isset($_SESSION["CUSTOMER_Username"]) ) {
    header("Location:Login.php");
	}

$prodid = $_GET['id'];
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
 <?php include '../styles/style.scss'; ?>
</style>
 	</head>
   <body>

	 <div class="nav">
     <?php include 'header.php';?>
 </div>




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


	<div class="footer">
	     <?php include 'footer.php';?>
	 </div>


  </body>
</html>
