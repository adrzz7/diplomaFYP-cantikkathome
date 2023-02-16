<?php
	session_start();
    include 'connect.php';

		if(!isset($_SESSION["CUSTOMER_Username"]) ){
            header("Location:Login.php");
	}


	$userid=$_SESSION["CUSTOMER_ID"];
	$query = "SELECT * FROM customer WHERE CUSTOMER_ID =$userid";
	$result =mysqli_query($connect,$query);

	$row = mysqli_fetch_assoc($result);





   $ress = mysqli_query($connect,"SELECT 	CART_CartID FROM cart WHERE CART_CustID  ='$userid' ");
   $cartRow=mysqli_fetch_array($ress,MYSQLI_NUM);
   $cartid=$cartRow[0];
//POP UP "NOTHING TO SHOW BROWSE AND ADD ITEMS TO YOUR CART" & redirect them to product page
    $query = "SELECT *
    FROM product,cart
    WHERE product.PRODUCT_ID =cart.CART_ProductID  AND cart.CART_CartID='$cartid' AND CART_Buying_Status ='Unbought'";

$result1 = mysqli_query($connect, $query);
$total=0;
if(($row = mysqli_fetch_assoc($result1))){




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
		<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src="https://kit.fontawesome.com/1815c61c19.js" crossorigin="anonymous"></script>

<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<style media="screen">

		@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

		* {
		    margin: 0;
		    padding: 0;
		    box-sizing: border-box
		}

			body {
			    background-color: #eee
			}

			nav,
			.wrapper {
			    padding: 10px 50px
			}

			nav .logo a {
			    color: #000;
			    font-size: 1.2rem;
			    font-weight: bold;
			    text-decoration: none
			}

			nav div.ml-auto a {
			    text-decoration: none;
			    font-weight: 600;
			    font-size: 0.8rem
			}

			header {
			    padding: 20px 0px
			}

			header .active {
			    font-weight: 700;
			    position: relative
			}

			header .active .fa-check {
			    position: absolute;
			    left: 50%;
			    bottom: -27px;
			    background-color: #fff;
			    font-size: 0.7rem;
			    padding: 5px;
			    border: 1px solid #008000;
			    border-radius: 50%;
			    color: #008000
			}

			.progress {
			    height: 2px;
			    background-color: #ccc
			}

			.progress div {
			    display: flex;
			    align-items: center;
			    justify-content: center
			}

			.progress .progress-bar {
			    width: 40%
			}

			#details {
			    padding: 30px 50px;
			    min-height: 300px
			}

			input {
			    border: none;
			    outline: none
			}

			.form-group .d-flex {
			    border: 1px solid #ddd
			}

			.form-group .d-flex input {
			    width: 95%
			}

			.form-group .d-flex:hover {
			    color: #000;
			    cursor: pointer;
			    border: 1px solid #008000
			}

			select {
			    width: 100%;
			    padding: 8px 5px;
			    border: 1px solid #ddd;
			    border-radius: 5px
			}

			input[type="checkbox"]+label {
			    font-size: 0.85rem;
			    font-weight: 600
			}

			#address,
			#cart,
			#summary {
			    padding: 20px 50px
			}

			#address .d-md-flex p.text-justify,
			#register p.text-muted {
			    margin: 0
			}

			#register {
			    background-color: #d9ecf2
			}

			#register a {
			    text-decoration: none;
			    color: #333
			}

			#cart,
			#summary {
			    max-width: 500px
			}

			.h6 {
			    font-size: 1.2rem;
			    font-weight: 700
			}

			.h6 a {
			    text-decoration: none;
			    font-size: 1rem
			}

			.item img {
			    object-fit: cover;
			    border-radius: 5px
			}

			.item {
			    position: relative
			}

			.number {
			    position: absolute;
			    font-weight: 800;
			    color: #fff;
			    background-color: #0033ff;
			    padding-left: 7px;
			    border-radius: 50%;
			    border: 1px solid #fff;
			    width: 25px;
			    height: 25px;
			    top: -5px;
			    right: -5px
			}

			.display-5 {
			    font-size: 1.2rem
			}

			#cart~p.text-muted {
			    margin: 0;
			    font-size: 0.9rem
			}

			tr.text-muted td {
			    border: none
			}

			.fa-minus,
			.fa-plus {
			    font-size: 0.7rem
			}

			.table td {
			    padding: 0.3rem
			}

			.btn.text-uppercase {
			    border: 1px solid #333;
			    font-weight: 600;
			    border-radius: 0px
			}

			.btn.text-uppercase:hover {
			    background-color: #333;
			    color: #eee
			}

			.btn.text-white {
			    background-color: #66cdaa;
			    border-radius: 0px
			}

			.btn.text-white:hover {
			    background-color: #3cb371
			}

			.wrapper .row+div.text-muted {
			    font-size: 0.9rem
			}

			.mobile,
			#mobile {
			    display: none
			}

			.buttons {
			    vertical-align: text-bottom
			}

			#register {
			    width: 50%
			}

			@media(min-width:768px) and (max-width: 991px) {
			    .progress .progress-bar {
			        width: 33%
			    }

			    #cart,
			    #summary {
			        max-width: 100%
			    }

			    .wrapper div.h5.large,
			    .wrapper .row+div.text-muted {
			        display: none
			    }

			    .mobile.h5,
			    #mobile {
			        display: block
			    }
			}

			@media(min-width: 576px) and (max-width: 767px) {
			    .progress .progress-bar {
			        width: 29%
			    }

			    #cart,
			    #summary {
			        max-width: 100%
			    }

			    .wrapper div.h5.large,
			    .wrapper .row+div.text-muted {
			        display: none
			    }

			    .mobile.h5,
			    #mobile {
			        display: block
			    }

			    .buttons {
			        width: 100%
			    }
			}

			@media(max-width: 575px) {
			    .progress .progress-bar {
			        width: 38%
			    }

			    #cart,
			    #summary {
			        max-width: 100%
			    }

			    nav,
			    .wrapper {
			        padding: 10px 30px
			    }

			    #register {
			        width: 100%
			    }
			}

			@media(max-width: 424px) {
			    body {
			        width: fit-content
			    }
			}

			@media(max-width: 375px) {
			    .progress .progress-bar {
			        width: 35%
			    }

			    body {
			        width: fit-content
			    }
			}


			</style>
  </head>

  <body>
		<nav class="bg-white">
		    <div class="d-flex align-items-center">
		        <div class="logo"> <a href="#" class="text-uppercase">shop</a> </div>
		        <div class="ml-auto"> <a href="Product.php" class="text-uppercase">Back to shopping</a> </div>
		    </div>
		</nav>
		<header>
		    <div class="d-flex justify-content-center align-items-center pb-3">
		        <div class="px-sm-5 px-2 active">SHOPPING CART <span class="fas fa-check"></span> </div>
		        <div class="px-sm-5 px-2">CHECKOUT</div>
		        <div class="px-sm-5 px-2">FINISH</div>
		    </div>
		    <div class="progress">
		        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
		    </div>
		</header>
		<div class="wrapper">
		    <div class="h5 large">Billing Address</div>
		    <div class="row">
		        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
		            <div class="mobile h5">Billing Address</div>
		            <div id="details" class="bg-white rounded pb-5">
		                <form>
		                    <div class="form-group"> <label class="text-muted">Name</label> <input type="text" value="<?php echo $row['CUSTOMER_FirstName'];  echo $row['CUSTOMER_LastName'];?>" class="form-control"> </div>
		                    <div class="form-group"> <label class="text-muted">Email</label>
		                        <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="email" value="<?php echo $row['CUSTOMER_Email']; ?>"> <span class="fas fa-check text-success pr-sm-2 pr-0"></span> </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-lg-6">
		                            <div class="form-group"> <label>City</label>
		                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="Houston"> <span class="fas fa-check text-success pr-2"></span> </div>
		                            </div>
		                        </div>
		                        <div class="col-lg-6">
		                            <div class="form-group"> <label>Zip code</label>
		                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="77001"> <span class="fas fa-check text-success pr-2"></span> </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-lg-6">
		                            <div class="form-group"> <label>Address</label>
		                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="<?php echo $row['CUSTOMER_Address']; ?>"> <span class="fas fa-check text-success pr-2"></span> </div>
		                            </div>
		                        </div>
		                        <div class="col-lg-6">
		                            <div class="form-group"> <label>State</label>
		                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="NY"> <span class="fas fa-check text-success pr-2"></span> </div>
		                            </div>
		                        </div>
		                    </div>
		                </form>
		            </div> <input type="checkbox" checked> <label>Shipping address is same as billing</label>
		            <div id="address" class="bg-light rounded mt-3">
		                <div class="h5 font-weight-bold text-primary"> Shopping Address </div>
		                <div class="d-md-flex justify-content-md-start align-items-md-center pt-3">
		                    <div class="mr-auto"> <b>Home Address</b>
		                        <p class="text-justify text-muted">542 W.14th Street</p>
		                        <p class="text-uppercase text-muted">NY</p>
		                    </div>
		                    <div class="rounded py-2 px-3" id="register"> <a href="#"> <b>Register Now</b> </a>
		                        <p class="text-muted">Create account to have multiple address saved</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
		            <div id="cart" class="bg-white rounded">
		                <div class="d-flex justify-content-between align-items-center">
		                    <div class="h6">Cart Summary</div>
		                </div>

                        <?php while($row = mysqli_fetch_assoc($result1)):;

                                echo"<div class='d-flex jusitfy-content-between align-items-center pt-6 pb-100 border-bottom'>";
                                    echo"     <div class='item pr-2'> <img src='data:image;base64,".$row["PRODUCT_Images"]."'width='70' height='70'>";
                                        echo"   <div class='number' style='font-size: 0.8em'>".$row["CART_Qty"]."</div>";
                                    echo"     </div>";
                                    echo"     <div class='d-flex flex-column px-3'> <b class='h5' style='font-size: 1em;width: 210px'>".$row['PRODUCT_Name']." </b>";
                                    echo"     <a  class='h5 text-primary' style='font-size: 1em;'>P-".$row['PRODUCT_ID'] ." </a> </div>";
                                    echo"     <div class='ml-auto'> <b class='h5' style='margin-right: 5px; font-size: 1em'>RM ".$row["PRODUCT_Price"]."</b> </div>";
                                    echo"<div class='deleteButton'>";
                                        echo"     <button type='button' class='btn btn-danger delete' value=".$row['CART_DETAIL_ID'] ."> <i class='fas fa-trash'></i></button>";
                                    echo"</div>";
                                echo"</div>";
                            $total = $total +($row["PRODUCT_Price"] *$row["CART_Qty"]  );

                        endwhile; ?>



		                <div class="d-flex align-items-center">
		                    <div class="display-5">Subtotal</div>
		                    <div class="ml-auto font-weight-bold"> RM <?php echo $total ?> </div>
		                </div>
		                <div class="d-flex align-items-center py-2 border-bottom">
		                    <div class="display-5">Shipping</div>
		                    <div class="ml-auto font-weight-bold">RM 10.00 </div>
		                </div>
		                <div class="d-flex align-items-center py-2">
		                    <div class="display-5">Total</div>
		                    <div class="ml-auto d-flex">
		                        <div class="text-primary text-uppercase px-3">MYR</div>
														<?php  $total=$total+10; ?>
		                        <div class="font-weight-bold">RM <?php echo $total ?> </div>
		                    </div>
		                </div>
		            </div>
		            <p class="text-muted">Need help with an order?</p>
		            <p class="text-muted"><a href="tel:0377855470" class="text-danger">Hotline: +60377855470</a> </p>
		            <div class="h4 pt-3"> <span class="fas fa-shield-alt text-primary pr-2"></span> Security of your shopping</div>

		            <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
		                <div class="col-md-6">
		                    <div class="btn text-uppercase"><a href="Product.php" class="text-uppercase">Back to shopping</a></div>
		                </div>
		                <div class="col-md-6 pt-md-0 pt-3">
		                    <div class="btn text-white ml-auto"> <span class="fas fa-lock"></span> <a  style="color:white;" href="order-payment.php?CARTID=<?php echo "$cartid"; ?>&total=<?php echo "$total";?>">  CHECKOUT NOW </a> </div>
		                </div>
		            </div>
		            <div class="text-muted pt-3" id="mobile"> <span class="fas fa-lock"></span> Your information is save </div>
		        </div>
		    </div>
		    <div class="text-muted"> <span class="fas fa-lock"></span> Your information is safe </div>
		</div>











<script type="text/javascript">


    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var cart_product = element.attr("value");
    var info = 'cart_detail_id=' + cart_product;
         Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

           $.ajax({
        type: "POST",
        url: "deletecartitem.php",
        data: info,
        success: function(){


        }
        });
        $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
				window.location.href="cart.php"
  }
})
        return false;
        });
        });

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
<?php
}else{
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title></title>
    <style>
        .imgCartOops{
            height: 200px;
            position: relative;
        }
        .imgCartOops img {
            margin: 8% 0 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .CartEmp{
            height: 130px;
            position: relative;
        }
        .CartEmp .oops {
            margin: 8% 0 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bolder;
            color: #c10707;
            font-size: 4em;
        }
        .CartEmp .UrCart {
            margin: 4% 0 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bold;
        }
        .CartEmp .mesej {
            margin:1% 0 0;
            position: absolute;
            width: 80%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

    </style>
</head>
<div class="nav">
    <?php include 'header.php';?>
</div>
<body>
<div class="center">
    <div class="imgCartOops">
        <img src="picture/oopsCart.png" class="oopCart" alt="">
    </div>
    <div class="CartEmp">
        <h1 class="oops">oops!</h1>
    </div>
    <div class="CartEmp">
        <h1 class="UrCart">Your Cart  is Empty...</h1>
    </div>
    <div class="CartEmp">
        <h2 class="mesej">You have no items in your shopping cart. Start shopping by going to the Product page or click on the logo to return to our home page.</h2>
    </div>
</div>


<!--  FOOTER START -->
<div class="footer">
    <?php include 'footer.php';?>
</div>

<!--   FOOTER END -->
</body>
</html>
<?php
}?>