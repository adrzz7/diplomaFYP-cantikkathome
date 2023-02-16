<?php include 'connect.php';


//ADD PRODUCT
if (isset($_POST['addproduct']))
{
  // Get Values
   $product_name             = mysqli_real_escape_string($connect, $_POST['productname']);
   $product_category         = mysqli_real_escape_string($connect,$_POST['product_cat']);
   $product_price            = mysqli_real_escape_string($connect,$_POST['price']);
   $product_description      = mysqli_real_escape_string($connect, $_POST['description']);
   $image = addslashes($_FILES['productimage']['tmp_name']);
   $image = file_get_contents($image);
   $image = base64_encode($image);

  mysqli_query($connect, "INSERT INTO product (PRODUCT_Name , PRODUCT_CategoryID , PRODUCT_Price , PRODUCT_Descriptions , PRODUCT_Images, PRODUCT_Status  ) VALUES ('$product_name','$product_category', '$product_price', '$product_description','$image' ,'Available')");

   header('location: Admin_Product.php');

}




// UPDATE PRODUCT


if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($connect, "SELECT * FROM product,categories  WHERE PRODUCT_ID=$id AND PRODUCT_CategoryID =CATEGORIES_ID");
  $prodrow=mysqli_fetch_assoc($record);


}

//update data
if (isset($_POST['update']))
{

$id=$_POST['id'];
$product_name             = mysqli_real_escape_string($connect, $_POST['productname']);
$product_category         = mysqli_real_escape_string($connect, $_POST['product_cat']);
$product_price            = mysqli_real_escape_string($connect,$_POST['price']);
$product_description      = mysqli_real_escape_string($connect, $_POST['description']);
$image = addslashes($_FILES['productimage']['tmp_name']);
$image = file_get_contents($image);
$image = base64_encode($image);

mysqli_query($connect, "UPDATE product SET PRODUCT_Name='$product_name', PRODUCT_CategoryID='$product_category ', PRODUCT_Price='$product_price', PRODUCT_Descriptions='$product_description', PRODUCT_Images='$image',PRODUCT_Status='Available'	 WHERE PRODUCT_ID='$id'");

header('location:Admin_Product.php');

}



//DELETE PRODUCT

if (isset($_POST['delete']))
{
$prodid = $_POST['delete'];

 mysqli_query($connect,"UPDATE product set  PRODUCT_Status ='Unavailable' WHERE PRODUCT_ID =$prodid");

}

?>
