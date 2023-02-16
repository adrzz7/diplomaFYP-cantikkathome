<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }



 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Beauticians</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="sweetalert2.all.min.js"></script>
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



 <!--main board-->
 <div class="container" style="max-width:1400px;">

        <div class="clearfix">
   <div class="box" style="width:150px;">
  <h1><i class="fa fa-fw fa-user"></i></h1>
  </div>
  <div class="box">
  <h1>BEAUTICIAN</h1>
  </div>
  
  
</div><p><button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button></p>

		<div class="row justify-content-center">
<div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
      <thead class="thead-dark">
          <tr class="text-center">
          <th scope="col">No.</th>
              <th> Beauticians ID</th>
              <th> Beauticians Name</th>
          <th>Image</th>
              <th> Beauticians Description</th>
              <th> Beauticians Specialization</th>
              <th> Email</th>
              <th> Contact Number </th>
              <th> Address </th>
              <tH > Edit </tH>
              <tH > Delete </tH>


          </tr>
      </thead>

      <?php
$bil=1;
        $count =0;
        $res = mysqli_query($connect,"SELECT * from beautician WHERE BEAUTICIAN_Status='Available'");
        while ($row = mysqli_fetch_assoc($res) ) :  ?>

      <tr >
          <th scope="row"><?php echo $bil;?></th>
        <td class="text-center">B<?php echo $row['BEAUTICIAN_ID']; ?>  </td>
          <td class="text-center"><?php echo $row['BEAUTICIAN_Name']; ?>  </td>
          <td ><img src=data:image;base64,<?php echo $row['BEAUTICIAN_Image']; ?> width="100px" /> </td>
          <td ><?php echo $row['BEAUTICIAN_Description'];   ?>  </td>
          <td ><?php echo $row['BEAUTICIAN_Specialization'];   ?>  </td>
          <td ><?php echo $row['BEAUTICIAN_Email'];   ?>  </td>
          <td ><?php echo $row['BEAUTICIAN_Contact'];   ?>  </td>
          <td style="width:200px;"><?php echo $row['BEAUTICIAN_Address'];?></td>
          <td >
                 <button type="button" class="btn btn-info editbtn"  data-toggle="modal" data-target="#editModal<?php echo $row['BEAUTICIAN_ID']; ?>" name='updtbtn' ><i class="far fa-edit"></button></td>
          
          <td style="width:151px;">
                 <button type="button" class="btn btn-danger delete"   value="<?php echo $row['BEAUTICIAN_ID']; ?>" name='delbtn' ><i class="fas fa-trash"></i> </button>
          </td>

      </tr>

    <?php
    $bil++;
    
  endwhile;
    ?>
    </table>
</div>
    </div>

    <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Beauticians</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <form action="AdminBeautician_Action.php" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-group">
          <label for="uname">Beautician name :</label>
          <input type="text"  class="form-control"  required name="beautname" placeholder="Enter Beautician Name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        
        <div class="form-group">
         <label >Beautician Image</label>
        <input class="form-control"  required  type="file"  name="beautimage" accept="image/*" >
           <div class="valid-feedback">Valid.</div>
           <div class="invalid-feedback">Please fill out this field.</div>
       </div>
        
        <div class="form-group">
          <label  >Email :</label>
          <input type="email" class="form-control"  name="email" placeholder="Enter Email"    required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label  >Address :</label>
          <input type="text" class="form-control"  name="add" placeholder="Enter Address"    required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label  >Contact Number :</label>
          <input type="text" class="form-control" name="num"  placeholder="Enter Contact Number"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label  >Description :</label>
          <input type="text" class="form-control"  name="desc" placeholder="Enter Description"    required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label  >Specialization :</label>
          <input type="text" class="form-control"  name="spec" placeholder="Enter Specialization"    required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>


        <button type="submit" name="addbtnn" class="btn btn-primary">Submit</button>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
    </div>


<!--#############################################################################################################################################-->

<div id="editmodal" class="modal fade" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Update Beauticians</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body">
      <form action="AdminBeautician_Action.php" method="post" class="needs-validation" novalidate>
        <input type="hidden" id="beautid" name="id">
    <div class="form-group">
      <label for="uname">Beautician name :</label>
      <input type="text" id="name" class="form-control" name="beautname"  placeholder="Enter Beautician Name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    
    <div class="form-group">
                                           <label >Beautician Image</label>
                                           <input class="form-control"  required  type="file"  name="beautimage" accept="image/*" >
                                            <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>
    
    <div class="form-group">
      <label  >Email :</label>
      <input type="text" class="form-control" id="email"  name="email" placeholder="Enter text"    required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label  >Contact Number :</label>
      <input type="text" class="form-control" id="num"  name="num"  placeholder="Enter text"    required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label  >Address :</label>
      <input type="text" class="form-control" id="add"  name="add"  placeholder="Enter text"    required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label  >Description :</label>
      <input type="text" class="form-control" id="desc" name="desc"   placeholder="Enter text"    required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label  >Specialization :</label>
      <input type="text" class="form-control" id="spec"  name="spec"  placeholder="Enter text"    required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>


    <button type="submit" name="updtbtn" class="btn btn-primary">Update</button>
  </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
</div>
</div>



<script type="text/javascript">

$(document).ready( function () {

 $('.editbtn').on('click' , function(){

        $('#editmodal').modal('show');


            $tr =  $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                          return $(this).text();

            }).get();

            console.log(data);
            $('#name').val(data[1]);
            $('#desc').val(data[2]);
            $('#spec').val(data[3]);
            $('#email').val(data[4]);
            $('#num').val(data[5]);
            $('#add').val(data[6]);
            $('#beautid').val(data[0]);



 });



});




        $(function() {
        $(".delete").click(function(){
        var element = $(this);
        var beautid = element.attr("value");
        var info = 'beautid=' + beautid;
        
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
        url: "AdminBeautician_Action.php",
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
