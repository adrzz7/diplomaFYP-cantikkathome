<?php


include_once 'connect.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://s.pageclip.co/v1/pageclip.css" media="screen">


<?php include 'navbarcss.php'; ?>


</head>
<body>
  <?php include 'navbar.php'; ?>



<!-- Modal -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body">
          <form action="AdminProduct_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>

            <input type="hidden" name="id" value="<?php echo $n[0]; ?>">

                                         <div class="form-group">
                                           <label for="pname">Product Name</label>
                                           <input class="form-control"  required  type="text" name="productname" placeholder ="Product Name" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label for="price">Category</label>
                                           <select name="product_cat" class="form-control"  required   placeholder = >
                                                 <option >  Select a Category </option>
                                                   <?php
                                                   $res = mysqli_query($connect, "SELECT * FROM categories WHERE CATEGORIES_Status ='Available'");
                                                   while($displaycat = mysqli_fetch_assoc($res)) :
                                                   ?>
                                                     <option value="<?php echo $displaycat['CATEGORIES_ID']; ?> "><?php echo $displaycat['CATEGORIES_Name']; ?></option>
                                                   <?php
                                                   endwhile;
                                                   ?>
                                           </select>
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label> Price</label>
                                           <input class="form-control"  required  type="text" name="price"  placeholder ="Product Price" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label>Description</label>
                                           <input class="form-control"  required  type="text" name="description"  placeholder ="Product Description" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label >Product Image</label>
                                           <input class="form-control"  required  type="file"  name="productimage" accept="image/*" >
                                            <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <button  class="btn btn-primary" type="submit" name="addproduct" >ADD</button>
                                       </form>
                                     </div>

                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                     </div>
</div>

</div>
</div>







<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h1>PRODUCT</h1>
  </div>
  <div class="pad"></div>
  <div class="remove">
  <button id="popup" type="button"  data-toggle="modal" data-target="#addModal" >Add</button>
    </div>

</div>
        </div>
<br>
<?php
			$sql = "SELECT * FROM product INNER JOIN categories ON product.PRODUCT_CategoryID=categories.CATEGORIES_ID WHERE  PRODUCT_Status ='Available' ORDER BY product.PRODUCT_ID";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
        <div class="table">
<table class="table table-bordered table-responsive table-hover table-sortable">
          <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">  Product ID </th>
          <th scope="col">  Name </th>
          <th scope="col">  Category </th>
          <th scope="col">  Price </th>
          <th scope="col">   Description  </th>
          <th scope="col">  Image </th>
          <th scope="col">  Action </th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <th scope="row"><?php echo $bil;?></th>
					  <td >P<?php echo $result['PRODUCT_ID'];?></td>
					  <td ><?php echo $result['PRODUCT_Name'];?></td>
					  <td ><?php echo $result['CATEGORIES_Name'];?></td>
					  <td ><?php echo $result['PRODUCT_Price'];?></td>
					  <td ><?php echo $result['PRODUCT_Descriptions'];?></td>
					  <td ><img src=data:image;base64,<?php echo $result['PRODUCT_Images']; ?> width="100px" /> </td>
					  <td> <button type="button"  class=" btn btn-info EDIT" name="button" data-toggle="modal" data-target="#editModal<?php echo $result['PRODUCT_ID']; ?>" > EDIT </button>
                <button type="button"  id="deletebutton" class=" btn btn-danger delete"  value="<?php echo $result['PRODUCT_ID'] ; ?>" name="dltbtn">DELETE</button>   </td>

          </tr>

          <?php
          $bil++;

          include 'modaledit.php';
					}
				?>

        </tbody>
      </table>


</div>


<script type="text/javascript">


$(function() {
$(".delete").click(function(){
var element = $(this);
var prodid = element.attr("value");
var info = 'delete=' + prodid;
if(confirm("Are you sure you want to delete this?"))
{
$.ajax({
type: "POST",
url: "AdminProduct_Action.php",
data: info,
success: function(){
}
});
$(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
}
return false;
});
});



</script>

<?php include 'script.php'; ?>


</div>
</body>
</html>
