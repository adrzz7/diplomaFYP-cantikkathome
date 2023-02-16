<?php
	session_start();
    include 'connect.php';
if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

$prodid = $_GET['prodid'];
$userid=$_SESSION['CUSTOMER_ID'];

$result= mysqli_query($connect,"SELECT * FROM product WHERE PRODUCT_ID  ='$prodid'" );
$prodRow= mysqli_fetch_assoc($result);

 $ress = mysqli_query($connect,"SELECT 	CART_CartID FROM cart WHERE CART_CustID ='$userid' LIMIT 1" );
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
 		<title><?php echo $prodRow['PRODUCT_Name'] ;  ?></title>
 		<link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
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


    <div class="nav">
        <?php include 'header.php';?>
    </div>


   <body>

   <div class="content-wrapper" style="margin-top: -35%">
		  <div class="wrapper">
		  	<div class="product-info">
		  		<div class="ls-preview">
                         <img src=data:image;base64,<?php echo $prodRow['PRODUCT_Images']; ?> alt="" style="width:280px">
                                </div>
                                <div class="ls-details">

                                    <h1 style="word-break: break-all"><?php echo $prodRow['PRODUCT_Name'];?></h1>
                                    <br><br>

                                    <h2 style="opacity: 0.5">RM <?php echo $prodRow['PRODUCT_Price'];?></h2>
                                    <br><br>

                                    <p style="word-break: break-all"><?php echo $prodRow['PRODUCT_Descriptions'];?></p>
                                    <br><br>

<form class="addMinus" action="cart-action.php" method="post">

	<input type="hidden" name="prodid" value="<?php echo $prodRow['PRODUCT_ID']; ?>">
	<input type="hidden" name="cartid" value="<?php echo $cartid; ?>">

	<span class="dec">
	<i class="fa fa-minus-square" aria-hidden="true"   ></i>
	</span>
                    <input class="num" type="text" name="qtyy" value="1" >

	<span class="inc">
<i class="fa fa-plus-square" aria-hidden="true"  > </i>
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
              <!--  FOOTER START -->
              <div class="footer">
                  <?php include 'footer.php';?>
              </div>

              <!--   FOOTER END -->
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
