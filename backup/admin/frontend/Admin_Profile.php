<?php

session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }



if (isset($_POST['update']))
{
$id                       = $_POST['id'];
$first_name            = mysqli_real_escape_string($connect, $_POST['firstname']);
$last_name         = mysqli_real_escape_string($connect,$_POST['lastname']);
$username            = mysqli_real_escape_string($connect,$_POST['username']);
$email      = mysqli_real_escape_string($connect, $_POST['email']);
$password      = mysqli_real_escape_string($connect, $_POST['password']);

   mysqli_query($connect, "UPDATE admin SET ADMIN_Fname='$first_name', ADMIN_Lname='$last_name', ADMIN_Username='$username', ADMIN_Email='$email', ADMIN_Password='$password' WHERE ADMIN_ID='$id'");

   header('location:Admin_Profile.php');

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Beauticians</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(155, 99, 228, 0.8), 0 6px 20px 0 rgba(155, 99, 228, 0.8);
  background-color:white;
  max-width: 600px;
  height: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
  padding-top:10px;
  margin-top:30px;
  margin-bottom:30px;
}

. p{
  font-size: 15px;
  color: black;
}

.title {
  color: grey;
  font-size: 25px;
  font-weight:900;
}

button {
  border: none;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  font-size: 18px;
}

button:hover, a:hover {
  opacity: 0.7;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: white;
}

</style>
</head>
<body>




<?php include 'navbar.php';
 ?>




<!-- main -->
<?php
			$sql = "SELECT * FROM admin WHERE ADMIN_Username ='$_SESSION[ADMIN_Username]'  ";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);
      $result = mysqli_fetch_assoc($data);

    ?>
<div class="card">
  <h1><?php echo $result['ADMIN_FName'];?> <?php echo $result['ADMIN_LName'];?></h1>
  <br>
  <p class="title">ADMIN</p>

            <p><?php echo $result['ADMIN_Username'];?></p>
            <p><?php echo $result['ADMIN_Email'];?></p>
            <p><?php echo $result['ADMIN_Password'];?></p>
  <button ><a data-toggle="modal" type="button" data-target="#editModal" >UPDATE</a></button>
</div>


<!-- Modal -->
  <div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body">
          <form action=""  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>

            <input type="hidden" id="id" name="id" value="<?php echo $result['ADMIN_ID'];?>">

                                         <div class="form-group">
                                           <label for="fname">First Name</label>
                                           <input  class="form-control"  required type="text" id="fname" name="firstname"  value="<?php echo $result['ADMIN_FName'];?>" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>


                                           <div class="form-group">
                                             <label for="lname">Last Name</label>
                                             <input  class="form-control" type="text" required id="lname" name="lastname" value="<?php echo $result['ADMIN_LName'];?>" >
                                             <div class="valid-feedback">Valid.</div>
                                             <div class="invalid-feedback">Please fill out this field.</div>
                                             </div>


                                             <div class="form-group">
                                               <label for="username">Username</label>
                                               <input class="form-control" type="text" required id="username" value="<?php echo $result['ADMIN_Username'];?>" name="username"  >

                                               <div class="valid-feedback">Valid.</div>
                                               <div class="invalid-feedback">Please fill out this field.</div>
                                               </div>

                                               <div class="form-group">
                                                 <label for="email">Email</label>
                                                 <input class="form-control" type="text" id="email" name="email" required value="<?php echo $result['ADMIN_Email'];?>" >
                                                 <div class="valid-feedback">Valid.</div>
                                                 <div class="invalid-feedback">Please fill out this field.</div>
                                                 </div>

                                                 <div class="form-group">
                                                   <label for="pass">Password</label>
                                                   <input class="form-control" type="text" required id="password" name="password" value="<?php echo $result['ADMIN_Password'];?>"  >
                                                   <div class="valid-feedback">Valid.</div>
                                                   <div class="invalid-feedback">Please fill out this field.</div>
                                                   </div>

                                           <button  class="btn btn-primary" type="submit" name="update" >UPDATE</button>
                                       </form>
                                     </div>

                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                     </div>
</div>

</div>
</div>






<?php include 'script.php'; ?>



    <script type="text/javascript">

     $('.editbtn').on('click' , function(){

            $('#editModal').modal('show');

     });





    </script>




</div>

</body>
</html>
