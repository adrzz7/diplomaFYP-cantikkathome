
<?php include ('connect.php');	//connection to database

$msg = "";

//add product
if (isset($_POST['addproduct']))
{
   $product_name             = mysqli_real_escape_string($connect, $_POST['productname']);
   $product_category         = mysqli_real_escape_string($connect,$_POST['product_cat']);
   $product_price            = mysqli_real_escape_string($connect,$_POST['price']);
   $product_description      = mysqli_real_escape_string($connect, $_POST['description']);
   $product_img              = $_FILES['file']['name'];

  	// image file directory
    $target = "images/".basename($product_img);

   $sql = "INSERT INTO product (ProdName, CATEGORY_ID , ProdPrice, 	Product_Details, Images) VALUES ('$product_name','$product_category', '$product_price', '$product_description','$product_img')";
   mysqli_query($connect, $sql);
   header('location: addproduct.php');

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <style>
html {
	height: 100%;
}

body{
  margin: 0;
  padding: 0;
  font-family: "Roboto", sans-serif;
  height: 100%;
}

/* navigation bar and header */
header{
  z-index: 1;
  position: fixed;
  background: #22242A;
  padding: 20px;
  width: calc(100% - 0%);
  top: 0;
  height: 30px;
}

.left_area h3{
  color: #fff;
  margin: 0;
  text-transform: uppercase;
  font-size: 22px;
  font-weight: 900;
}

.left_area span{
  color: #9b63e4;
}

.logout_btn{
  padding: 5px;
  background: #9b63e4;
  text-decoration: none;
  float: right;
  margin-top: -30px;
  margin-right: 40px;
  border-radius: 2px;
  font-size: 15px;
  font-weight: 600;
  color: #fff;
  transition: 0.5s;
  transition-property: background;
}

.logout_btn:hover{
  background: #0B87A6;
}

.sidebar{
  z-index: 1;
  top: 0;
  background: #2f323a;
  margin-top: 70px;
  padding-top: 30px;
  position: fixed;
  left: 0;
  width: 250px;
  height: 100%;
  transition: 0.5s;
  transition-property: left;
  overflow: auto;
}

.profile_info{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.sidebar .profile_info .profile_image{
  width: 50px;
  height: 50px;
  border-radius: 100px;
  margin-bottom: 10px;
}

.sidebar .profile_info h4{
  color: #ccc;
  margin-top: 0;
  margin-bottom: 20px;
}

.sidebar a{
  color: #fff;
  display: inline-block;
  width: 100%;
  line-height: 55px;
  text-decoration: none;
  padding-left: 40px;
  box-sizing: border-box;
  transition: 0.5s;
  transition-property: background;
  overflow: auto;
}

.sidebar a:hover{
  background: #19B3D3;
}

.sidebar i{
  padding-right: 10px;
}

label #sidebar_btn{
  z-index: 1;
  color: #fff;
  position: fixed;
  cursor: pointer;
  left: 300px;
  font-size: 20px;
  margin: 5px 0;
  transition: 0.5s;
  transition-property: color;
}

label #sidebar_btn:hover{
  color: #19B3D3;
}

#check:checked ~ .sidebar{
  left: -185px;
}

#check:checked ~ .sidebar a span{
  display: none;
}

#check:checked ~ .sidebar a{
  font-size: 20px;
  margin-left: 165px;
  width: 100%;
}

.content{
  margin: auto;
  padding-top: 150px;
  padding-left: 300px;
  height: 100vh;
  transition: 0.5s;
  box-sizing:border-box;
}

#check:checked ~ .content{
  margin-left: 60px;
}

#check:checked ~ .sidebar .profile_info{
  display: none;
}

#check{
  display: none;
}

.mobile_nav{
  display: none;
}



/* Responsive CSS */

@media screen and (max-width: 780px){
  .sidebar{
    display: none;
  }

  #sidebar_btn{
    display: none;
  }

  .content{
    margin-left: 0;
    margin-top: 0;
    transition: 0s;
    padding:20px;
  }

  #check:checked ~ .content{
    margin-left: 0;
  }

  .mobile_nav{
    display: block;
    width: calc(100% - 0%);
  }

  .nav_bar{
    background: #222;
    width: (100% - 0px);
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }

  .nav_bar .mobile_profile_image{
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .nav_bar .nav_btn{
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    transition: 0.5s;
    transition-property: color;
  }

  .nav_bar .nav_btn:hover{
    color: #19B3D3;
  }

  .mobile_nav_items{
    background: #2F323A;
    display: none;
  }

  .mobile_nav_items a{
    color: #fff;
    display: block;
    text-align: center;
    letter-spacing: 1px;
    line-height: 60px;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
  }

  .mobile_nav_items a:hover{
    background: #19B3D3;
  }

  .mobile_nav_items i{
    padding-right: 10px;
  }

  .active{
    display: block;
  }
}

/* end of navigation bar and header */

/* add product form */
#abc {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
#close {
position:absolute;
right:-14px;
top:-20px;
cursor:pointer;
background:transparent;
font-size:48px;
}
div#popupContact {
position:absolute;
left:50%;
top:17%;
margin-left:-202px;
}

form {
max-width:400px;
min-width:250px;
padding:10px 50px ;
border:2px solid gray;
border-radius:10px;
font-family:raleway;
background-color:#fff
}

h2 {
background: rgb(0, 0, 0, 0.5);;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}
input[type=text],[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

#submit {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
  text-decoration: none;
}

#submit:hover {
  background-color: #45a049;
}

#popup {
width:10%;
height:45px;
border-radius:5px;
background-color:#9b63e4;
color:#fff;
font-size:18px;
cursor:pointer;
margin-left:700px;
}

.action {
width:80px;
height:45px;
border-radius:5px;
background-color:#9b63e4;
color:#fff;
cursor:pointer;
}

.wrapper{
padding-left:300px;
padding-right:50px;
margin-top:-450px;
max-width:400px;
}

.table{
}


</style>

  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="left_area">
        <h3>CANTIKK<span>ATHOME</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="user.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-cogs"></i><span>Product</span></a>
        <a href="#"><i class="fas fa-table"></i><span>Consultation</span></a>
        <a href="#"><i class="fas fa-th"></i><span>Order</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>Payment</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Customer</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Feedback</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="user.png" class="profile_image" alt="">
        <h4>ADMIN</h4>
      </div>
      <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="#"><i class="fas fa-cogs"></i><span>Product</span></a>
      <a href="#"><i class="fas fa-table"></i><span>Consultation</span></a>
      <a href="#"><i class="fas fa-th"></i><span>Order</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>Payment</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Customer</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Feedback</span></a>
    </div>

    <!--sidebar end-->

  <div class="content">
  <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="main">
    <div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="addproduct.php" id="form" method="post" name="form" enctype="multipart/form-data">
<i id="close" class="fa fa-times " onclick ="div_hide()"></i>
<h2>ADD PRODUCT</h2>
<hr>
    <label for="pname">Product Name</label>
    <input type="text" id="pname" name="productname">

    <label for="price">Price</label>
    <input type="text" id="price" name="price" >

    <label for="price">Category</label>
    <select name="product_cat" class="form-control"><!-- form-control Begin -->

                              <option> Select a Category Product </option>

                              <?php

                              $get_cats = "select * from category";
                              $run_cats = mysqli_query($connect,$get_cats);

                              while ($row_cats=mysqli_fetch_array($run_cats)){

                                  $cat_id = $row_cats['CATEGORY_ID'];
                                  $cat_title = $row_cats['categoryName'];

                                  echo "

                                  <option value='$cat_id'> $cat_title </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

    <label for="description">Description</label>
    <textarea rows="6" cols="50" name="description"></textarea>

    <label for="pname">Product Image</label><br><br>
    <input type="file" id="img" name="file" accept="image/*">
<br><br><br>
<button id="submit" type="submit" name="addproduct">ADD</button>
  <br><br>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->

<button id="popup" onclick="div_show()">Add</button>
      </div>
</div>

<div class="wrapper" id = "data">
<?php
			$sql = "SELECT * FROM product";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>

    <div class="table">
			<table border="1" border-collapse="collapse" cellspacing="0" cellpadding="2" max-width="400px">
				<h1>PRODUCT LIST </h1>
				<tr>
          <th width="5" bgcolor="#F08080">No.</th>
					<th width="5" bgcolor="#F08080">Product ID</th>
					<th width="5" bgcolor="#F08080">Name</th>
					<th width="5" bgcolor="#F08080">Category</th>
					<th width="5" bgcolor="#F08080">Price</th>
          <th width="5" bgcolor="#F08080">Descriptions</th>
          <th width="5" bgcolor="#F08080">Image</th>
          <th width="5" bgcolor="#F08080">Action</th>


				</tr>
				<?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
				<tr>
					<td align="center" bgcolor="#FADBD8"><?php echo $bil;?></td>
					<td align="center" bgcolor="#FADBD8"><?php echo $result['ProductID'];?></td>
					<td bgcolor="#FADBD8"><?php echo $result['ProdName'];?></td>
					<td bgcolor="#FADBD8"><?php echo $result['CATEGORY_ID'];?></td>
					<td align="center" bgcolor="#FADBD8"><?php echo $result['ProdPrice'];?></td>
					<td align="center" bgcolor="#FADBD8"><?php echo $result['Product_Details'];?></td>
					<td align="center" bgcolor="#FADBD8" ><img width="100px"src='<?php echo $result['Images']; ?>' ></td>
					<td  bgcolor="#FADBD8"><a href="test.php?edit=<?php echo $result['ProductID']; ?>" class="edit_btn" >Edit</a><br><a href="test.php?del=<?php echo $result['ProductID']; ?>" class="del_btn">Delete</a></td>

				</tr>

				<?php
					$bil++;
					}
				?>
      </table>
				<center>
					<h3>
					<?php echo "Total Records : " . $row;?>
					</h3>
        </center>
        <br><br>
		</div>
        </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>


  <script>
  // Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
  </script>
</html>
