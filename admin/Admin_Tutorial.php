<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION["ADMIN_Username"])){
    header("Location:Admin_Login.php");
}




    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Tutorial</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php include 'navbarcss.php'; ?>

    </head>
    <body>
      <?php include 'navbar.php'; ?>





<!-- Popup Div Ends Here -->
<div class="container">
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fa fa-fw fa-user"></i></h1>
  </div>
  <div class="box">
  <h1>TUTORIAL</h1>
  </div>
</div>
<p><button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button></p>
<?php
			$sql = "SELECT * FROM tutorial INNER JOIN categories ON tutorial.TUTORIAL_CategoryID=categories.CATEGORIES_ID WHERE TUTORIAL_Status ='Available';";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
		<div class="row justify-content-center">
<div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">Tutorial ID</th>
          <th scope="col">Video</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Created at </th>
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
					  <td >T<?php echo $result['TUTORIAL_ID'];?></td>
					  <td ><iframe src="<?php echo $result["TUTORIAL_VidLink"]; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width:210px;height: 125px;padding: 3px" allowfullscreen></iframe></td>
            <td ><?php echo $result['TUTORIAL_Name'];?></td>
            <td ><?php echo $result['CATEGORIES_Name'];?></td>
					  <td ><?php echo $result['TUTORIAL_Description'];?></td>
					  <td style="width:115px;"><?php echo $result['TUTORIAL_Time']; echo '<br>'; echo $result['TUTORIAL_Date'];?></td>
            <td style="width:165px; text-align:center;">
              <button type="button"  class=" btn btn-info EDIT" name="button"  data-toggle="modal" data-target="#editModal<?php echo $result['TUTORIAL_ID']; ?>" ><i class="far fa-edit"></i>  </button>
            </td>
             <td style="width:165px; text-align:center;">
                <button type="button"  id="deletebutton" class=" btn btn-danger delete"  value="<?php echo $result['TUTORIAL_ID'] ; ?>" name="delete"><i class="fas fa-trash"></i></button>
            </td>

          </tr>

          <?php
          $bil++;

          include 'modaledit.php';
					}
				?>

        </tbody>
      </table>
</div>
</div>


<!-- Modal -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Tutorial</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body">
          <form action="AdminTutorial_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>


                                         <div class="form-group">
                                             <label for="TutoName" >Tutorial Title   </label>
                                             <input type="text" class="form-control"  name="TUTORIAL_Name" required placeholder ="Tutorial Title">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                             <label for="TutoVid" >Tutorial Video Description </label>
                                                 <input type="text" class="form-control" name="TUTORIAL_Description" required placeholder ="Tutorial Description">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>


                                           <div class="form-group">
                                           <label for="price">Category</label>
                                           <select name="product_cat" class="form-control"  required    >
                                                 <option selected="selected" >  Select a Category </option>
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
                                          <label for="TutoVid" >Tutorial Video Link </label>
                                          <input type="text" class="form-control"  name="TUTORIAL_VidLink" required placeholder ="Tutorial Video Link" >
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
    var tutid = element.attr("value");
    var info = 'delete=' + tutid;
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
        url: "AdminTutorial_Action.php",
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
