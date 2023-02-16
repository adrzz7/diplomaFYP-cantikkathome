<?php
include 'connect.php';
session_start();


if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

$userid=$_SESSION['CUSTOMER_ID'];

  $ressS = mysqli_query( $connect,"SELECT * from customer where CUSTOMER_ID=$userid" );
  $custrow=mysqli_fetch_assoc($ressS);


  $schid = $_GET['schid'];

  $res = mysqli_query($connect,"SELECT *  FROM  consultation_schedule WHERE SCHEDULE_ID ='$schid' ");
  $consultationRow=mysqli_fetch_assoc($res);

  $comment = $_GET['comment'];
  $details = $_GET['details'];
  $service = $_GET['servicetype'];
  $schid = $_GET['schid'];



 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
  <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
 <script src="https://kit.fontawesome.com/1815c61c19.js" crossorigin="anonymous"></script>
     <title>Consultation Payment </title>
     <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">



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

     </style>
   </head>
   <body>

     <nav class="bg-white">
         <div class="d-flex align-items-center">
       <div class="logo"> <a href="index.php"> <img src="picture/logo.png"  height="34"> </a>
</div>
<div class="ml-auto"> <a href="Consultation.php" class="text-uppercase" style="font-family: Arial,serif;font-weight:bold; font-size: 1em; color: #4F3A83">Back to Consultation</a> </div>
         </div>
     </nav>
     <header>
         <div class="d-flex justify-content-center align-items-center pb-3">
             <div class="px-sm-5 px-2 active">CONSULTATION DETAILS  <span class="fas fa-check"></span> </div>
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
             <h2>Payment Summary</h2>
                     <div class='line'></div>

             <table class='order-table'>
               <tbody>
                 <tr>
                   <td><img src='https://cdn.shopify.com/s/files/1/0255/9148/0416/products/20200901_075002_0000_1024x1024.png?v=1598971994' class='full-width'></img>
                   </td>
                   <td>
                     <br>
                     <span class='thin'>Virtual Beauty Consultation</span>
                     <br> 1 hour <br>
                     <span class='thin small'> Time : <?php echo $consultationRow['SCHEDULE_Start']; ?> --- <?php echo $consultationRow['SCHEDULE_End']; ?>
                     </span><br>
                      <span class='thin small'> Date : <?php echo $consultationRow['SCHEDULE_Date']; ?>
                     </span><br>
                      <span class='thin small'> Day : <?php echo $consultationRow['SCHEDULE_Day']; ?> <br><br>
                     </span>
                   </td>

                 </tr>

               </tbody>

             </table>


             <div class='line'></div>
             <div class='total'>
               <span style='float:left;'>
                 TOTAL
               </span>
               <span style='float:right; text-align:right;'>
                 RM 50.00
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
                   <form action="charge-consultation.php" method="post" id="payment-form">
                     <div class="form-row">
<input type="hidden" name="comment" value="<?php  echo $comment ?>">
<input type="hidden" name="details" value="<?php  echo $details ?>">
<input type="hidden" name="service" value="<?php  echo $service ?>">
<input type="hidden" name="schid" value="<?php  echo $schid ?>">

                      <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php  echo $custrow['CUSTOMER_FirstName']; ?>"   placeholder="First Name">
                      <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo  $custrow['CUSTOMER_LastName']; ?>"    placeholder="Last Name">
                      <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php  echo $custrow['CUSTOMER_Email']; ?>"    placeholder="Email Address">
                       <div id="card-element" class="form-control">
                         <!-- a Stripe Element will be inserted here. -->
                       </div>
                       <!-- Used to display form errors -->
                       <div id="card-errors" role="alert"></div>
                     </div>
                     <button >Submit Payment</button>
                   </form>
                 </div>
               </div>

             </div>
           </div>
         </div>





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




     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="charge.js"></script>

     <!-- Start of LiveChat (www.livechatinc.com) code -->
     <script>
         window._lc = window._lc || {};
         window.__lc.license = 12604245;
         ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
     </script>
     <noscript><a href="https://www.livechatinc.com/chat-with/12604245/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
     <!-- End of LiveChat code -->
   </body>
