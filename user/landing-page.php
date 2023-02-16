
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="icon" href="picture/logos.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

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
    height: 78%;
    overflow: hidden;
    top: 0;
    left: 0;
}

.content-wrapper{
    background-color: white;
    top: 87%;
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
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="page-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="http://ironsummitmedia.github.io/startbootstrap-freelancer/img/profile.png" alt="">
                <div class="intro-text">                
                    <span class="name">Cantikk At Home</span>
                    <hr class="star-light">
                    <p class="skills">Beauty comes from the inside, inside your sweet home too.</p>
                    <p class="skills">Scroll to see the effect</p>
                    <a href=register.php><button class="btn btn-6 btn-6c" style="outline:none;">Sign Up</button> <span></span></a>
                    <a href=Login.php><button class="btn btn-6 btn-6c" style="outline:none;">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">
    <section class="primary" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>WHAT WE OFFER</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                <div class="image-hover img-zoom-in">
                    <a href=Tutorial.php><img src="picture/set.png" style=" width:360px ;height:240px ;margin: 0; padding:1em "> </div></a>
                    <div class="card-block">
                        <h5 class="text-bold">Tutorials</h5>
                        <div class="card-text">
                        Everything you need to know from head to toe!
                        </div>
                    </div>
                    
                   
                </div>
                <div class="col-sm-4">
                <div class="image-hover img-zoom-in">
                    <a href=Product.php><img src="picture/set.jpg" style="width:360px; height:240px; margin:0; padding: 1em;"> </div></a>
                    <div class="card-block">
                        <h5 class="text-bold">Product</h5>
                        <div class="card-text">
                        Get your favourite delivered to you!
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4">
                <div class="image-hover img-zoom-in">
                    <a href=Consultation.php><img src="picture/set4.jpg" style="width:360px; height:240px; margin:0; padding: 1em;"> </div></a>
                    <div class="card-block">
                        <h5 class="text-bold">Online Consultation</h5>
                        <div class="card-text">
                        Make your beauty routine as possible
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>WHAT DO PEOPLE SAY?</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
        <div class= bg-review>
            <div class="testimonial p-3 bg-dark  text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/4DEiXLa.jpg" width="50">
                <h5>John Doe</h5>
            </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class= bg-review>
            <div class="testimonial p-3 bg-dark text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/nbO4gwx.jpg" width="50">
                <h5>Tony Sam</h5>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class= bg-review>
            <div class="testimonial p-3 bg-dark text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/xbWPOrc.jpg" width="50">
                <h5>Marry Doe</h5>
            </div>
            </div>
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