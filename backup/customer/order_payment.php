<?php
session_start();
  include '../connect.php';
  if(!isset($_SESSION["CUSTOMER_Username"]) ) {
  header("Location:MainPage.php");
}

$userid=$_SESSION['CUSTOMER_ID'];



$cartid = $_GET['CARTID'];
$totalpay = $_GET['total'];



  $res = mysqli_query( $connect,"SELECT * from customer where CUSTOMER_ID=$userid" );
  $custrow=mysqli_fetch_assoc($res);

  $resu = mysqli_query( $connect,"SELECT *  FROM product,cart  WHERE product.PRODUCT_ID =cart.CART_ProductID  AND cart.CART_CartID='$cartid' AND CART_Buying_Status ='Unbought'" );





  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
   <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src="https://kit.fontawesome.com/1815c61c19.js" crossorigin="anonymous"></script>
      <title>Order Payment </title>



      <style media="screen">
      .StripeElement {
background-color: white;
height: 40px;
padding: 10px 12px;
border-radius: 4px;
border: 1px solid transparent;
box-shadow: 0 1px 3px 0 #e6ebf1;
-webkit-transition: box-shadow 150ms ease;
transition: box-shadow 150ms ease;
}

.StripeElement--focus {
box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
border-color: #fa755a;
}

.StripeElement--webkit-autofill {
background-color: #fefde5 !important;
}



@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);
body,html {
  height:100%;
  margin:0;
  font-family:lato;
}

h2 {
  margin-bottom:0px;
  margin-top:25px;
  text-align:center;
  font-weight:200;
  font-size:19px;
  font-size:1.2rem;

}
.container {
  height:100%;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  -webkit-box-align:center;
  -webkit-align-items:center;
      -ms-flex-align:center;
          align-items:center;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;

}
.dropdown-select.visible {
  display:block;
}
.dropdown {
  position:relative;
}
ul {
  margin:0;
  padding:0;
}
ul li {
  list-style:none;
  padding-left:10px;
  cursor:pointer;
}
ul li:hover {
  background:rgba(255,255,255,0.1);
}
.dropdown-select {
  position:absolute;
  background:#77aaee;
  text-align:left;
  box-shadow:0px 3px 5px 0px rgba(0,0,0,0.1);
  border-bottom-right-radius:5px;
  border-bottom-left-radius:5px;
  width:90%;
  left:2px;
  line-height:2em;
  margin-top:2px;
  box-sizing:border-box;
}
.thin {
  font-weight:400;
}
.small {
  font-size:12px;
  font-size:.8rem;
}
.half-input-table {
  border-collapse:collapse;
  width:100%;
}
.half-input-table td:first-of-type {
  border-right:10px solid #4488dd;
  width:50%;
}
.window {
  height:540px;
  width:800px;
  background:#fff;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
  border-radius:30px;
  z-index:10;
}
.order-info {
  height:100%;
  width:50%;
  padding-left:25px;
  padding-right:25px;
  box-sizing:border-box;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  position:relative;
}
.price {
  bottom:0px;
  position:absolute;
  right:0px;
  color:#4488dd;
}
.order-table td:first-of-type {
  width:25%;
}
.order-table {
    position:relative;
}
.line {
  height:1px;
  width:100%;
  margin-top:10px;
  margin-bottom:10px;
  background:#ddd;
}
.order-table td:last-of-type {
  vertical-align:top;
  padding-left:25px;
}
.order-info-content {
  table-layout:fixed;

}

.full-width {
  width:100%;
}
.pay-btn {
  border:none;
  background:#22b877;
  line-height:2em;
  border-radius:10px;
  font-size:19px;
  font-size:1.2rem;
  color:#fff;
  cursor:pointer;
  position:absolute;
  bottom:25px;
  width:calc(100% - 50px);
  -webkit-transition:all .2s ease;
          transition:all .2s ease;
}
.pay-btn:hover {
  background:#22a877;
    color:#eee;
  -webkit-transition:all .2s ease;
          transition:all .2s ease;
}

.total {
  margin-top:25px;
  font-size:20px;
  font-size:1.3rem;
  position:absolute;
  bottom:30px;
  right:27px;
  left:35px;
}
.dense {
  line-height:1.2em;
  font-size:16px;
  font-size:1rem;
}
.input-field {
  background:rgba(255,255,255,0.1);
  margin-bottom:10px;
  margin-top:3px;
  line-height:1.5em;
  font-size:20px;
  font-size:1.3rem;
  border:none;
  padding:5px 10px 5px 10px;
  color:#fff;
  box-sizing:border-box;
  width:100%;
  margin-left:auto;
  margin-right:auto;
}
.credit-info {
  background:#4488dd;
  height:100%;
  width:50%;
  color:#eee;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  font-size:14px;
  font-size:.9rem;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  box-sizing:border-box;
  padding-left:25px;
  padding-right:25px;
  border-top-right-radius:30px;
  border-bottom-right-radius:30px;
  position:relative;
}
.dropdown-btn {
  background:rgba(255,255,255,0.1);
  width:100%;
  border-radius:5px;
  text-align:center;
  line-height:1.5em;
  cursor:pointer;
  position:relative;
  -webkit-transition:background .2s ease;
          transition:background .2s ease;
}
.dropdown-btn:after {
  content: '\25BE';
  right:8px;
  position:absolute;
}
.dropdown-btn:hover {
  background:rgba(255,255,255,0.2);
  -webkit-transition:background .2s ease;
          transition:background .2s ease;
}
.dropdown-select {
  display:none;
}
.credit-card-image {
  display:block;
  max-height:80px;
  margin-left:auto;
  margin-right:auto;
  margin-top:35px;
  margin-bottom:15px;
}
.credit-info-content {
  margin-top:25px;
  -webkit-flex-flow:column;
      -ms-flex-flow:column;
          flex-flow:column;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  width:100%;
}
@media (max-width: 600px) {
  .window {
    width: 100%;
    height: 100%;
    display:block;
    border-radius:0px;
  }
  .order-info {
    width:100%;
    height:auto;
    padding-bottom:100px;
    border-radius:0px;
  }
  .credit-info {
    width:100%;
    height:auto;
    padding-bottom:100px;
    border-radius:0px;
  }
  .pay-btn {
    border-radius:0px;
  }
}


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
      width: 58%
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
        <div class="ml-auto"> <a href="#" class="text-uppercase">Back to shopping</a> </div>
    </div>
</nav>
<header>
    <div class="d-flex justify-content-center align-items-center pb-3">
        <div class="px-sm-5 px-2 active">SHOPPING CART <span class="fas fa-check"></span> </div>
        <div class="px-sm-5 px-2 active"><span class="fas fa-check"></span>CHECKOUT</div>
        <div class="px-sm-5 px-2">FINISH</div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</header>

      <div class='container'>
        <div class='window'>
          <div class='order-info'>
            <div class='order-info-content'>
              <h2>Order Summary</h2>

              <div class='line'></div>

<?php


while($prodrow = mysqli_fetch_assoc($resu)):;

echo" <table class='order-table'>";
echo"   <tbody>";
  echo"   <tr>";
    echo"   <td><img src='data:image;base64,".$prodrow["PRODUCT_Images"]."'class='full-width'></img>";
    echo"   </td>";
    echo"   <td>";
      echo"   <br> <span class='thin'>".$prodrow['PRODUCT_Name']."</span>";
      echo"   <br>Qty :".$prodrow['CART_Qty']."<br> <span class='thin small'> <br><br></span>";
    echo"   </td>";

  echo"   </tr>";
  echo"   <tr>";
    echo"   <td>";
    echo"     <div class='price'>RM ".$prodrow['PRODUCT_Price']."</div>";
    echo"   </td>";
  echo"   </tr>";
  echo" </tbody>";

echo" </table> ";


echo" <div class='line'></div> ";


endwhile;







 ?>



              <div class='total'>
                <span style='float:left;'>
                  <div class='thin dense'>Delivery</div>
                  TOTAL
                </span>
                <span style='float:right; text-align:right;'>
                  <div class='thin dense'>RM 10.00 </div>
                  RM <?php echo $totalpay; ?>
                </span>
              </div>
      </div>
      </div>
              <div class='credit-info'>
                <div class='credit-info-content'>
                  <table class='half-input-table'>
                    <tr><td>Please select your card: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                      <div class='dropdown-select'>
                      <ul>
                        <li>Master Card</li>
                        <li>American Express</li>
                        </ul></div>
                      </div>
                     </td></tr>
                  </table>
                  <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                  <div >
                    <form action="charge-product.php" method="post" id="payment-form">
                      <div class="form-row">
                        <input type="hidden" name="cartid" value="<?php echo $cartid; ?>">
                        <input type="hidden" name="tot" value="<?php echo $totalpay; ?>">

                       <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php  echo $custrow['CUSTOMER_FirstName']; ?>"   placeholder="First Name">
                       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo  $custrow['CUSTOMER_LastName']; ?>"    placeholder="Last Name">
                       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php  echo $custrow['CUSTOMER_Email']; ?>"    placeholder="Email Address">
                        <div id="card-element" class="form-control">
                          <!-- a Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <button>Submit Payment</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>






      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://js.stripe.com/v3/"></script>
 <script src="../scripts/charge.js"></script>
 <script type="text/javascript">
 var cardDrop = document.getElementById('card-dropdown');
var activeDropdown;
cardDrop.addEventListener('click',function(){
var node;
for (var i = 0; i < this.childNodes.length-1; i++)
  node = this.childNodes[i];
  if (node.className === 'dropdown-select') {
    node.classList.add('visible');
     activeDropdown = node;
  };
})

window.onclick = function(e) {
console.log(e.target.tagName)
console.log('dropdown');
console.log(activeDropdown)
if (e.target.tagName === 'LI' && activeDropdown){
  if (e.target.innerHTML === 'Master Card') {
    document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/2vbqk5lcpi7hjoc/MasterCard_Logo.svg.png';
        activeDropdown.classList.remove('visible');
    activeDropdown = null;
    e.target.innerHTML = document.getElementById('current-card').innerHTML;
    document.getElementById('current-card').innerHTML = 'Master Card';
  }
  else if (e.target.innerHTML === 'American Express') {
       document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/f5hyn6u05ktql8d/amex-icon-6902.png';
        activeDropdown.classList.remove('visible');
    activeDropdown = null;
    e.target.innerHTML = document.getElementById('current-card').innerHTML;
    document.getElementById('current-card').innerHTML = 'American Express';
  }
  else if (e.target.innerHTML === 'Visa') {
       document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png';
        activeDropdown.classList.remove('visible');
    activeDropdown = null;
    e.target.innerHTML = document.getElementById('current-card').innerHTML;
    document.getElementById('current-card').innerHTML = 'Visa';
  }
}
else if (e.target.className !== 'dropdown-btn' && activeDropdown) {
  activeDropdown.classList.remove('visible');
  activeDropdown = null;
}
}

 </script>
    </body>
  </html>
