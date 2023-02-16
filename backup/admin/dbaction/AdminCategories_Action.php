                               <?php
include 'connect.php';

//add product
if (isset($_POST['add']))
{

   $category_name= mysqli_real_escape_string($connect, $_POST['categoryname']);
   mysqli_query($connect, "INSERT INTO categories (CATEGORIES_Name , CATEGORIES_Status) VALUES ('$category_name' ,'Available') ");

}




if (isset($_POST['update']))
{
  $catid = $_POST['cid'];
  $categories= mysqli_real_escape_string($connect, $_POST['categoryname']);
   mysqli_query($connect, "UPDATE categories SET CATEGORIES_Name='$categories' WHERE CATEGORIES_ID='$catid'");


}




if (isset($_POST['delete'])) {

  $catid = $_POST['delete'];
   mysqli_query($connect, "UPDATE categories set  CATEGORIES_Status ='Unavailable' WHERE CATEGORIES_ID=$catid");
   mysqli_query($connect,"UPDATE product set  PRODUCT_Status ='Unavailable' WHERE PRODUCT_CategoryID=$catid");
   mysqli_query($connect,"UPDATE tutorial set  TUTORIAL_Status ='Unavailable' WHERE TUTORIAL_CategoryID =$catid");

}



 ?>


 <script type="text/javascript">
 window.location.href="Admin_Categories.php";
 </script>
