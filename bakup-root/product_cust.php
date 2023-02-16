<?php include ('connect.php');?>
<!DOCTYPE html>
<html>
<head>
      <title>Products</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- icon stylesheet -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
html {
    background-color: rgb(253, 252, 238); no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Makeup {background-color: rgb(253, 252, 238);}
#oilyskin {background-color: rgb(253, 252, 238);}
#dryskin {background-color: #fdfcee;}
#sensitiveskin {background-color: #fdfcee;}

.headers {
  padding: 300px;
  padding-left:0;
  padding-top:30px;
  background: #ebdaae;
  color: black;
  font-size: 30px;
}

.FeedbackBody{
            background-color:#fdfcee;
            font-family: Helvetica,Arial,sans-serif;
        }


        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        .FeedbackHead{
            float:left;
            border: 6px solid black;
            border-left-style: none;
            width:55%;
            padding:5%;
            font-size: 70px;
            line-height: 1;
            text-transform: none;
            color: rgb(154, 56, 155);
        }

        .productimg{
  width: 300px;
  float:right;
        }

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

/* Navigation Bar*/
.header {
	height:50px;
	background: #ebdaae;
	width:100%;
}

.header a{
	float : left;
	display:block;
	color : black;
	text-align:center;
	font-size:20px;
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
	background-color: #E11584;
	min-width: 150px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	right:0;
}

.dropdown-content a {
	float: none;
	color: white;
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
/* end of Navigation Bar*/

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
<!--Navigation Bar -->

<div class="headers">

<div class="column">
        <h1 class="FeedbackHead">PRODUCT</h1>
    </div>

    <div class="column">
        <img src="product.png" class="productimg">
    </div>
</div>

<button class="tablink" onclick="openPage('Makeup', this, 'red')"id="defaultOpen">Makeup</button>
<button class="tablink" onclick="openPage('oilyskin', this, 'green')" >OILY SKIN</button>
<button class="tablink" onclick="openPage('dryskin', this, 'blue')">DRY SKIN</button>
<button class="tablink" onclick="openPage('sensitiveskin', this, 'orange')">SENSITIVE SKIN</button>

<div id="Makeup" class="tabcontent">
  <?php
			$sql = "SELECT * FROM product WHERE PRODUCT_CategoryID  ='1'";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);


    ?>

  <div class="card">
  <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
  <a href="product_view.php?id=<?php echo $result['PRODUCT_ID'];?>">   <img src=data:image;base64,<?php echo $result['PRODUCT_Images']; ?> width="150px" >   </a>
  <h1><?php echo $result['PRODUCT_Name'];?></h1>
      <p class="price">RM <?php echo $result['PRODUCT_Price'];?></p>
  <p><?php echo $result['PRODUCT_Descriptions'];?></p>

  <?php
					$bil++;
					}
				?>
</div>
</div>

<div id="oilyskin" class="tabcontent">
  <?php
			$sql = "SELECT * FROM product WHERE PRODUCT_CategoryID  ='2'";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>

  <div class="card">
  <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
  <a href="product_view.php?id=<?php echo $result['PRODUCT_ID'];?>">   <img src="data:image;base64,<?php echo $result['PRODUCT_Images']; ?>" width="150px" />   </a>
  <h1><?php echo $result['PRODUCT_Name'];?></h1>

      <p class="price">RM <?php echo $result['PRODUCT_Price'];?></p>
  <p><?php echo $result['PRODUCT_Descriptions'];?></p>

  <?php
					$bil++;
					}
				?>
</div>
</div>

<div id="dryskin" class="tabcontent">
  <?php
			$sql = "SELECT * FROM product WHERE PRODUCT_CategoryID  ='3'";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>

  <div class="card">
  <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
   <a href="product_view.php?id=<?php echo $row['PRODUCT_ID'];?>">   <img src=data:image;base64,<?php echo $row['PRODUCT_Images']; ?> width="150px" >   </a>
  <h1><?php echo $result['PRODUCT_Name'];?></h1>
      <p class="price">RM <?php echo $result['PRODUCT_Price'];?></p>
  <p><?php echo $result['PRODUCT_Descriptions'];?></p>

  <?php
					$bil++;
					}
				?>
</div>
</div>

<div id="sensitiveskin" class="tabcontent">
  <?php
			$sql = "SELECT * FROM product WHERE PRODUCT_CategoryID  ='4'";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>

  <div class="card">
  <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
  <a href="product_view.php?id=<?php echo $row['PRODUCT_ID'];?>">   <img src=data:image;base64,<?php echo $row['PRODUCT_Images']; ?> width="150px" />   </a>
  <h1><?php echo $result['PRODUCT_Name'];?></h1>
      <p class="price">RM <?php echo $result['PRODUCT_Price'];?></p>
  <p><?php echo $result['PRODUCT_Descriptions'];?></p>

  <?php
					$bil++;
					}
				?>
</div>
</div>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script src="cart.js"></script>
</body>
</html>
