

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
<style>


  a.disabled {
    pointer-events: none;
    cursor: default;
    color: grey;
  }
</style>

<?php include 'navbarcss.php'; ?>

  </head>
  <body>



<?php include 'navbar.php'; ?>
 <!--main board-->
 <div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h1>CONSULTATION</h1>
  </div>


</div>
        </div>

		<div class="row justify-content-center">
<div class="col-auto">
		<table class="table table-bordered table-responsive table-hover table-sortable">
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



					<td> <button type="submit"  class="btn btn-info"  data-toggle="modal" data-target="#editModal<?php echo $row['CONSULTATION_ID']; ?>" name="update" >EDIT</button>   </td>
			</tr>

<?php
include 'modalcons.php';


 }

?>

	  </table>



	</div>
		</div>

              

<?php include 'script.php'; ?>
</body>
</html>
