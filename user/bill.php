<?php

//session_start();
include 'connect.php';

//if(!isset($_SESSION["CUSTOMER_Username"]) ){
//    header("Location:landing-page.php");
//	}


  //$userid=$_SESSION["CUSTOMER_ID"];


$orderid=$_GET['ORDERID'];

$res = mysqli_query($connect,"SELECT * FROM orders,product,cart,customer
WHERE  orders.ORDERS_CartID =cart.CART_CartID AND cart.CART_ProductID=product.PRODUCT_ID AND orders.ORDERS_ID =$orderid AND cart.CART_ORDER_ID =$orderid GROUP by product.PRODUCT_ID");
//

$total=0;

 ?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">

@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
*{
margin: 0;
box-sizing: border-box;

}
body{
background: #E0E0E0;
font-family: 'Roboto', sans-serif;
background-image: url('');
background-repeat: repeat-y;
background-size: 100%;
}
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
font-size: 1.5em;
color: #222;
}
h2{font-size: .9em;}
h3{
font-size: 1.2em;
font-weight: 300;
line-height: 2em;
}
p{
font-size: .7em;
color: #666;
line-height: 1.2em;
}

#invoiceholder{
width:100%;
hieght: 100%;
padding-top: 50px;
}
#headerimage{
z-index:-1;
position:relative;
top: -50px;
height: 350px;
background-image: url('http://michaeltruong.ca/images/invoicebg.jpg');

-webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
-moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
overflow:hidden;
background-attachment: fixed;
background-size: 1920px 80%;
background-position: 50% -90%;
}
#invoice{
position: relative;
top: -290px;
margin: 0 auto;
width: 700px;
background: #FFF;
}

[id*='invoice-']{ /* Targets all id with 'col-' */
border-bottom: 1px solid #EEE;
padding: 30px;
}

#invoice-top{min-height: 120px;}
#invoice-mid{min-height: 120px;}
#invoice-bot{ min-height: 250px;}

.logo{
float: left;
height: 60px;
width: 60px;
background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
background-size: 60px 60px;
}
.clientlogo{
float: left;
height: 60px;
width: 60px;
background-size: 60px 60px;
border-radius: 50px;
}
.info{
display: block;
float:left;
margin-left: 20px;
}
.title{
float: right;
}
.title p{text-align: right;}
#project{margin-left: 52%;}
table{
width: 100%;
border-collapse: collapse;
}
td{
padding: 5px 0 5px 15px;
border: 1px solid #EEE
}
.tabletitle{
padding: 5px;
background: #EEE;
}
.service{border: 1px solid #EEE;}
.item{width: 50%;}
.itemtext{font-size: .9em;}

#legalcopy{
margin-top: 30px;
}
form{
float:right;
margin-top: 30px;
text-align: right;
}


.effect2
{
position: relative;
}
.effect2:before, .effect2:after
{
z-index: -1;
position: absolute;
content: "";
bottom: 15px;
left: 10px;
width: 50%;
top: 80%;
max-width:300px;
background: #777;
-webkit-box-shadow: 0 15px 10px #777;
-moz-box-shadow: 0 15px 10px #777;
box-shadow: 0 15px 10px #777;
-webkit-transform: rotate(-3deg);
-moz-transform: rotate(-3deg);
-o-transform: rotate(-3deg);
-ms-transform: rotate(-3deg);
transform: rotate(-3deg);
}
.effect2:after
{
-webkit-transform: rotate(3deg);
-moz-transform: rotate(3deg);
-o-transform: rotate(3deg);
-ms-transform: rotate(3deg);
transform: rotate(3deg);
right: 10px;
left: auto;
}



.legal{
width:70%;
}
    </style>
  </head>
  <body>
    <div id="invoiceholder">

  <div id="headerimage"></div>
  <div id="invoice" class="effect2">

    <div id="invoice-top">
      <div class="logo"></div>
      <div class="info">
        <h2>Cantikk At Home</h2>
        <p>cantikkathome@gmail.com </br>
            +60377855470
        </p>
      </div><!--End Info-->
      <div class="title">
        <h1>Order No # <?php echo $orderid ?></h1>
        </p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->


    <?php while($prodrow = mysqli_fetch_assoc($res)):;

    if($prodrow['CUSTOMER_ImageName'] == null)
        $path = 'picture/default.png';
      else
           $path = 'data:image;base64,'.$prodrow['CUSTOMER_ImageName']; ?>

    <div id="invoice-mid">

      <div class="clientlogo"> <img src=<?php  echo  $path ;?> alt="" width="50px"> </div>
      <div class="info">

        <h2><?php echo $prodrow['CUSTOMER_FirstName'] ;echo " " ;echo $prodrow['CUSTOMER_LastName'] ; ?></h2>
        <p><?php  echo $prodrow['CUSTOMER_Email'] ;?></br>
           <?php  echo $prodrow['CUSTOMER_ContactNum'] ;?></br>
        </p>
      </div>


    </div><!--End Invoice Mid-->

    <div id="invoice-bot">

      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class="item"><h2>Product Name</h2></td>
            <td class="Hours"><h2>Quantity</h2></td>
            <td class="Rate"><h2>Price per item</h2></td>
            <td class="subtotal"><h2>Sub-total</h2></td>
          </tr>
          <tr class="service">
            <td class="tableitem"><p class="itemtext"> <?php  echo $prodrow['PRODUCT_Name'] ; ?></p></td>
            <td class="tableitem"><p class="itemtext"> <?php  echo $prodrow['CART_Qty'] ; ?></p></td>
            <td class="tableitem"><p class="itemtext"> rm <?php  echo $prodrow['PRODUCT_Price'] ; ?>.00</p></td>
            <td class="tableitem"><p class="itemtext"> <?php  echo $prodrow['CART_Qty']* $prodrow['PRODUCT_Price'] ; ?></p></td>
          </tr>

        <?php    $total = $total +($prodrow["PRODUCT_Price"] *$prodrow["CART_Qty"]  );
                endwhile;
         ?>

          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2>RM <?php echo $total ?>.00</h2></td>
          </tr>

        </table>
      </div><!--End Table-->



      <div id="legalcopy">
        <p class="legal"><strong>Thank you for your support !</strong>      </p>
      </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
  </body>
</html>
