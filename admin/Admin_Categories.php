<?php

session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }



?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Category</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="admin.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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





<!-- Popup Div Ends Here -->
<div class="container">
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fas fa-list-alt"></i></h1>
  </div>
  <div class="box">
  <h1>CATEGORY</h1>
  </div>
</div>
<p><button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button></p>

<?php
			$sql = "SELECT * FROM categories WHERE CATEGORIES_Status ='Available'";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
        <div class="row justify-content-center">
            <div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
            
          <th scope="col">No.</th>
          <th scope="col">Category ID</th>
          <th scope="col"> Category Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <td scope="row"><?php echo $bil;?></td>
					  <td >C<?php echo $result['CATEGORIES_ID'];?></td>
					  <td ><?php echo $result['CATEGORIES_Name'];?></td>
            <td>
                 <button type="button" class="btn btn-info editbtn"  data-toggle="modal" data-target="#editModal<?php echo $result['CATEGORIES_ID']; ?>" name='editbtn' ><i class="far fa-edit"></button></td>
            <td>
                 <button type="button" class="btn btn-danger delete"   value="<?php echo $result['CATEGORIES_ID']; ?>" name='delbtn' ><i class="fas fa-trash"></i>  </button></td>

          </tr>

          <?php
          $bil++;


          include 'modaledit.php';
					}
				?>

        </tbody>
      </table>
</div>







<!-- Modal -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body">
          <form action="AdminCategories_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>


                                         <div class="form-group">
                                           <label for="pname">Category Name</label>
                                           <input class="form-control" required type="text" name="categoryname">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>
                                           <button  class="btn btn-primary" type="submit" name="add" >ADD</button>
                                       </form>
                                     </div>

                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                     </div>
</div>

</div>
</div>









<script type="text/javascript">



    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var catid = element.attr("value");
    var info = 'delete=' + catid;
    
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
        url: "AdminCategories_Action.php",
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
