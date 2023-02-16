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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


<?php include 'navbarcss.php'; ?>

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h1>CUSTOMER</h1>
  </div>

</div>
        </div>
<br>
<?php
			$sql = "SELECT * FROM customer";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
        <div class="table">
<table class="table table-bordered table-responsive table-hover table-sortable">
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


<!-- main -->
<?php include 'script.php'; ?>

</div>

</body>
</html>
