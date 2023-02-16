
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:AdminLogin.php"); }


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


<?php include 'navbarcss.php'; ?>

</head>
<body>
  <?php include 'navbar.php'; ?>



<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h2>CONSULTATION PAYMENT</h2>
  </div>

  </div>
        </div>
    		<div class="row justify-content-center">
    <div class="col-auto">
		<table class="table table-bordered table-responsive table-hover table-sortable">
			<thead class="thead-dark">
					<tr class="text-center">
							<th> No</th>
							<th> Payment ID</th>
              <th> Consultation ID</th>
							<th> Payment Date </th>
							<th> Status </th>
							<th> Total Amount</th>
							<th> Receipt</th>
              <tH > ACTION  </tH>

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
          <td > <img src=data:image;base64,<?php echo $row['PAYMENT_CONSULTATION_Receipt']; ?> width="100px" />  </td>
<img src="" alt="">

				<td>
					<form class="" action="" method="post">


						<label class="marked" >
							<?php  	echo "<input  type=checkbox  value=".$row['PAYMENT_CONSULTATION_ID']. " ".$ability." ".$state."  onclick=UpdatePaymentStatus(".$payconsid.",this.checked)   onchange=window.location.href='Admin_Payment_Consulltation.php';>    ";    ?>
								<span   class="checkmark"></span>
					 </label>

				</td>



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
	</div>
		</div>

		</div>
</body>
</html>
