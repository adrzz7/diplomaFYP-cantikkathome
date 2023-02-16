<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Consultation</title>
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
  
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>



  a.disabled {
    pointer-events: none;
    cursor: default;
    color: grey;
  }
  
.swal2-title {
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
<?php include 'navbarcss.php'; ?>

  </head>
  <body>



<?php include 'navbar.php'; ?>
 <!--main board-->
 <div class="container" style="max-width:1800px;">
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fas fa-calendar-check"></i></h1>
  </div>
  <div class="box">
  <h1>APPOINTMENT</h1>
  </div>
</div>

		<div class="row justify-content-center">
<div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
			<thead class="thead-dark">
					<tr class="text-center">
						<th> No</th>
							<th>ID</th>
							<th> Customer Name</th>
							<th> Beautician</th>
							<th> Email</th>
							<th> Service Type </th>
							<th> Details </th>
							<th> Extra Comments</th>
							<th> Consultation Status</th>
							<th> Date</th>
							<th> Day</th>
							<th> Time</th>
							<th> Meeting Link</th>
							<th> Update</th>




					</tr>
			</thead>

			<?php

				$res = mysqli_query($connect,"SELECT *
				FROM consultation,customer,consultation_schedule,beautician
		    WHERE consultation.CONSULTATION_ScheduleID =consultation_schedule.SCHEDULE_ID  AND consultation.CONSULTATION_CustomerID=customer.CUSTOMER_ID  AND consultation_schedule.SCHEDULE_BeauticianID  =beautician.BEAUTICIAN_ID
		    ORDER BY consultation.CONSULTATION_ID  ");

		$count =0;

						$ability="";  	$state="";
						 while ($row = mysqli_fetch_assoc($res) )
						 {
							 	$conid =$row['CONSULTATION_ID'];


              if (  $row['CONSULTATION_Status']== "Unprocessed"   )
             							      $rowcolour ="table-danger";
                       		else  if (  $row['CONSULTATION_Status']== "Processing"   )
             									 $rowcolour ="table-warning";
                           else
                               $rowcolour ="table-success";

							if($row['CONSULTATION_MeetingLink']== "")
							{
								$ability="disabled";
							}
							else {
								$ability="";
							}

			?>

			<tr class="<?php echo $rowcolour ; ?> " >
				  <td class="text-center"><?php $count++ ; echo $count ?>  </td>
          <td class="text-center"> CO<?php echo $row['CONSULTATION_ID']; ?>  </td>
					<td class="text-center"><?php echo $row['CUSTOMER_FirstName']; echo $row['CUSTOMER_LastName'];  ?>  </td>
					<td class="text-center"><?php echo $row['BEAUTICIAN_Name'];  ?>  </td>
					<td class="text-center"><?php echo $row['CUSTOMER_Email']; ?>  </td>
					<td class="text-center"> <?php echo  $row['CONSULTATION_ServiceType'];?>  </td>
					<td > <?php echo $row['CONSULTATION_Details'];   ?>  </td>
					<td > <?php echo $row['CONSULTATION_ExtraComments'];  ?>  </td>
					<td class="text-center"> <?php echo $row['CONSULTATION_Status']; ?>  </td>
					<td class="text-center"><?php echo $row['SCHEDULE_Date']; ?>  </td>
					<td class="text-center"> <?php echo $row['SCHEDULE_Day'];  ?>  </td>
					<td class="text-center"> <?php echo $row['SCHEDULE_Start'];echo "---"; echo $row['SCHEDULE_End']; ?>  </td>
					<td class="text-center">  <a href="<?php echo $row['CONSULTATION_MeetingLink']; ?> " class="<?php echo $ability; ?>"  > Click Here</a>  </td>



					<td> <button type="submit"  class="btn btn-info"  data-toggle="modal" data-target="#editModal<?php echo $row['CONSULTATION_ID']; ?>" name="update" ><i class="far fa-edit"></i></button> </td>
			</tr>

<?php
include 'modalcons.php';


 }

?>

	  </table>



	</div>
		</div>

<script> $(document).ready(function() {
            $('#table').DataTable();
        } );

</script>

<?php include 'script.php'; ?>
</body>
</html>
