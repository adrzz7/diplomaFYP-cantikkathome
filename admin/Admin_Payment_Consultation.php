<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Consultation Payment</title>
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
  <h1><i class="fas fa-credit-card"></i></h1>
  </div>
  <div class="box">
  <h1>CONSULTATION PAYMENT</h1>
  </div>
</div>
    		<div class="row justify-content-center">
    <div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
			<thead class="thead-dark">
					<tr class="text-center">
							<th> No</th>
							<th> Payment ID</th>
              <th> Consultation ID</th>
							<th> Payment Date </th>
							<th> Status </th>
							<th> Total Amount</th>

					</tr>
			</thead>

			<?php
$count =0;
				$res = mysqli_query($connect,"SELECT * FROM payment_consultation ");


						$ability="";  	$state="";
						 while ($row = mysqli_fetch_assoc($res) )
						 {
								$payconsid =$row['PAYMENT_CONSULTATION_ID'];

							 if (  $row['PAYMENT_CONSULTATION_Status']== "Unapproved")
							 {  $rowcolour ="table-danger";  }

						else {
									$rowcolour ="table-success";
							}



              if (  $row['PAYMENT_CONSULTATION_Status']== "Unapproved")
									{		$ability = "";
											$state = "";
										}

              else if (  $row['PAYMENT_CONSULTATION_Status']== "Approved")
                   {
										 $ability = "disabled";
 										$state = "checked";

									 }




			?>

			<tr class="<?php echo $rowcolour ; ?> " >
        <td class="text-center"><?php $count++ ; echo $count ?>  </td>
        <td class="text-center">PY<?php echo $row['PAYMENT_CONSULTATION_ID']; ?>  </td>
					<td class="text-center">OD<?php echo $row['PAYMENT_CONSULTATIONID'];  ?>  </td>
					<td class="text-center"> <?php echo  $row['PAYMENT_CONSULTATION_Date'];?>  </td>
					<td > <?php echo $row['PAYMENT_CONSULTATION_Status'];   ?>  </td>
					<td > RM <?php echo $row['PAYMENT_CONSULTATION_Amount'];  ?>  </td>
      



			</tr>

<?php  }

?>

	  </table>

	</form>


			<script type="text/javascript">

						function UpdatePaymentStatus(uid, chk) {
				 chk = (chk==true ? "1" : "0");
				 var url = "AdminPayment_Action.php?payconsid="+uid+"&chkYesNo="+chk;
				 if(window.XMLHttpRequest) {
						req = new XMLHttpRequest();
				 } else if(window.ActiveXObject) {
						req = new ActiveXObject("Microsoft.XMLHTTP");
				 }
				 // Use get instead of post.
				 req.open("GET", url, true);
				 req.send(null);
			}
			</script>


<?php include 'script.php'; ?>


<script> $(document).ready(function() {
            $('#table').DataTable();
        } );

</script>
	</div>
		</div>

		</div>
</body>
</html>
