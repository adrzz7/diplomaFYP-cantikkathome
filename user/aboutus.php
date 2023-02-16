<?php
$connect = mysqli_connect("localhost","id16059992_cantikkathomee","z1WSoBoe6#zI[H5Q","id16059992_cantikkathome");
if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:landing-page.php");
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About Us</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
 @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
/* HERE STARTS THE MAGIC */
header {
    text-align: center;
    color: #fff;
    background-image: linear-gradient(to right top, #bc49bc, #a338b0, #7a208d, #670885, #8e11bb);
    background-repeat: repeat-y;
    position: fixed;
    width:100%;
    z-index: 1;
    height: 60%;
    overflow: hidden;
    padding-top: 100px;
    left: 0;
}

.content-wrapper{
    background-color: white;
    top: 80%;
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

header h2{
    margin-top: 100px;
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


</style>

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
            <a class="navbar-brand" href="index.php" ><img src="picture/logo.png" alt="UEL" name="UEL" height='34px'></a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
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
                        <a href=Product.php><button class="bt">Product</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=Feedback.php><button class="bt">Feedback</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=Consultation.php><button class="bt">Consultation</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=cart.php><button style="outline:none; border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/cart.png" style="width:40px;"></button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=profile-user.php><button style="outline:none; border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/profile.png" style="width:40px;"></button></a>
                        </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap" >
                        <a href=logout-user.php><button style="outline:none; color: #2c3e50; font-weight: bold; font-size: 1.3em;  border: none;background-color: transparent;  margin-right: auto; margin-top: 12px;">Log Out</button></a>
                    </div>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
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
                    <a href=Product.php><button class="bt">Product</button></a>
                </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=Feedback.php><button class="bt">Feedback</button></a>
                    </div>
                </li>
                <li class="page-scroll">
                <div class="wrap">
                    <a href=Consultation.php><button class="bt">Consultation</button></a>
                </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=cart.php><button style="border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/cart.png" style="width:40px;"></button></a>
                    </div>
                </li>
                <li class="page-scroll">
                    <div class="wrap">
                        <a href=profile-user.php><button style="border: none;background-color: transparent; margin-left: 2px;margin-top: 4px;"><img src="picture/profile.png" style="width:40px;"></button></a>
                    </div>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="page-top">
    <div class="col-lg-12 text-center">
                    <h1><b>ABOUT US</b></h1>
                    <hr class="star-primary">
                    <h4>Beauty comes from the inside, inside your sweet home too.</h4>
                    <p>Your one stop beauty platform</p>
                </div>
</header>
<div class="content-wrapper">
    <section class="primary" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><b>MEET THE TEAM</b></h2>
                    <hr class="star-primary">
                </div>
            </div>
           <?php
$bil=1;
        $count =0;
        $res = mysqli_query($connect,"SELECT * from beautician WHERE BEAUTICIAN_Status='Available'");
        while ($row = mysqli_fetch_assoc($res) ) :  ?>
          
                <div class="col-sm-4">
                <div class="image-hover img-zoom-in ">
                    <a href=Consultation.php><img src=data:image;base64,<?php echo $row['BEAUTICIAN_Image']; ?>  style=" object-fit: cover; width:340px ;max-height:240px ;margin: 0; padding:1em ; border-radius: 8px" ></div></a>
                    <div class="card-block">
                        <h3 class="card-body text-center" style="text-transform: uppercase"></b><?php echo $row['BEAUTICIAN_Name']; ?></h3><br>
                        <h4 class="card-body text-center">Specialized in <b><?php echo $row['BEAUTICIAN_Specialization'];   ?></h4>
                        <h5 class="card-body text-center"><?php echo $row['BEAUTICIAN_Description'];   ?></h5>
                    </div>   
                </div>   <?php
    $bil++;
    
  endwhile;
    ?>
             
        </div>
    </section>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><b><span>&#39;</span><span>&#39;</span>OUR OBJECTIVE<span>&#39;</span><span>&#39;</span></b></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <p style="text-align:center; font-size:20px"><b>CantikkAtHome</b> is web-based Beauty Salon Management System that strive to provide an easy shift to the beauticians and salon business. This one-stop beauty platform offers beauty products, tutorials, online consultation booking. This system specializes in managing the spa or beauty service management which helps the business to manage their day-to-day business efficiently without any hassle
</p>
        </div>
        </div>
    </section>
    <section class="primary" id="contact">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
            <div class="testimonial p-3 bg-dark text-center rounded"><img src="picture/s.png" width="150">
            <h2 class="font-weight-light">Look like a Goddess Everyday</h2>
            <p class="font-italic text-muted mb-4">Embark the beauty journey with us<br> 
            </div>
        </div>
    </section>

<!--  FOOTER -->

<footer class="container" style="min-height:200px; width:100%; background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);color:#fff;text-align:left;padding-top:40px; margin-top:70px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>FIND US AT</h4>
            <hr class="star-light">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-2">
            <h5 class="headin5_amrc col_white_amrc pt2">STAY CONNECTED</h5>
            <!--headin5_amrc-->
            <a href="aboutus.php" style="color:white"><i class='fas fa-user-alt'> About Us</i></a><p><a href="#"></a></p>
            <p><i class="fa fa-envelope"></i> cantikkathome@gmail.com  </p>

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
<!--   FOOTER END -->
</div>

</html>