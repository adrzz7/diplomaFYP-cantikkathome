<?php

	include 'connect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Icon-->
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style> <!-- Tables and overall-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script> <!--Modal-->


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js"></script>


  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.3/dist/sweetalert2.all.min.js" charset="utf-8"></script>



<?php include 'navbarcss.php'; ?>
<style>.swal2-title {
    position: relative;
    max-width: 100%;
    margin: 0 0 .4em;
    padding: 0;
    color: #fffffff;
    font-size: 1.875em;
    font-weight: 600;
    text-align: center;
    text-transform: none;
    word-wrap: break-word;
}

h2 {
    background: #ffffff;
    padding: 20px 35px;
    margin: -10px -50px;
    text-align: center;
    border-radius: 10px 10px 0 0;
}</style>
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
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fas fa-clipboard-list"></i></h1>
  </div>
  <div class="box">
  <h1>PRODUCT</h1>
  </div>
</div>
<p><button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button></p>
<?php
			$sql = "SELECT * FROM product INNER JOIN categories ON product.PRODUCT_CategoryID=categories.CATEGORIES_ID WHERE  PRODUCT_Status ='Available' ORDER BY product.PRODUCT_ID";
			$data = mysqli_query($connect, $sql);
      $result = mysqli_num_rows($data);

    ?>
        <div class="table">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">Product ID</th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
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
					  <td> <button type="button"  class=" btn btn-info EDIT" name="button" data-toggle="modal" data-target="#editModal<?php echo $result['PRODUCT_ID']; ?>" > <i class="far fa-edit"></i> </button></td>
 <td> 
                <button type="button"  id="deletebutton" class=" btn btn-danger delete"  value="<?php echo $result['PRODUCT_ID'] ; ?>" name="dltbtn"><i class="fas fa-trash"></i></button>   </td>
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
 
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    
           $.ajax({
        type: "POST",
        url: "AdminProduct_Action.php",
        data: info,
        success: function(){
            
            
        }
        });
        $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
  }
})
       
        return false;
        });
        });

    $(document).ready(function() {
            $('#table').DataTable();
        } );

</script>



<?php include 'script.php'; ?>


</div>

</body>
</html>
