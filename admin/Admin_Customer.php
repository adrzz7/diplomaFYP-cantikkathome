<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Customer</title>
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

<div class="container">
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fa fa-fw fa-user"></i></h1>
  </div>
  <div class="box">
  <h1>CUSTOMER</h1>
  </div>
</div>
<br>
<?php
			$sql = "SELECT * FROM customer";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
		<div class="row justify-content-center">
<div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Username</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Email</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <th scope="row"><?php echo $bil;?></th>
					  <td >CU<?php echo $result['CUSTOMER_ID'];?></td>
					  <td ><?php echo $result['CUSTOMER_Username'];?></td>
            <td ><?php echo $result['CUSTOMER_FirstName'];?></td>
            <td ><?php echo $result['CUSTOMER_LastName'];?></td>
					  <td ><?php echo $result['CUSTOMER_ContactNum'];?></td>
					  <td ><?php echo $result['CUSTOMER_Email'];?></td>
          </tr>

          <?php
          $bil++;
					}
				?>

        </tbody>
      </table>
</div>
</div>

<!-- main -->
<?php include 'script.php'; ?>

<script> $(document).ready(function() {
            $('#table').DataTable();
        } );

</script>
</div>

</body>
</html>
