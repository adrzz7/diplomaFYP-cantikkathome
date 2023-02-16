<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }




 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Schedule</title>
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
  <h1><i class="fas fa-calendar-week"></i></h1>
  </div>
  <div class="box">
  <h1>SCHEDULE</h1>
  </div>
</div>
<p><button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button></p>
    		<div class="row justify-content-center">
    <div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
    			<thead class="thead-dark">
    					<tr class="text-center">
    					    <th scope="col">No.</th>
    							<th> ID </th>
                  <th> Beautician Name</th>
                  <th> Date</th>
    							<th> Day </th>
    							<th> Start Time </th>
                  <th> End Time </th>
    							<th> Availability </th>
    						  <th> Edit </th>
    						  <th> Delete </th>
    					</tr>
    			</thead>

    			<?php
$bil=1;
          $res = mysqli_query($connect,"SELECT * FROM consultation_schedule,beautician WHERE consultation_schedule.SCHEDULE_BeauticianID =beautician.BEAUTICIAN_ID AND SCHEDULE_Availability='Available'");
    						 while ($row = mysqli_fetch_assoc($res) )
    						 {
                    $conid = $row['SCHEDULE_ID'];
$beautid = $row['BEAUTICIAN_ID'];

    			?>

    			<tr >
    			    <th scope="row"><?php echo $bil;?></th>
    				 <td class="text-center">  <?php echo $conid ?>  </td>
             <td class="text-center"><?php  echo $row['BEAUTICIAN_Name']; ?></td>

    					<td class="text-center"> <?php echo $row['SCHEDULE_Date'];  ?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_Day'];?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_Start'];   ?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_End'];  ?>  </td>
              <td> <span class="badge badge-success"> <?php echo $row['SCHEDULE_Availability'];  ?> </span></td>

              <td>
                    <button type="submit" id=" updatebtn" class="btn btn-info" data-toggle="modal" data-target="#editModal<?php echo $conid; ?>"  name="updatebtn"   ><i class="fa fa-edit"></i></button>
                    <td>
                    <button type="button"  id="deletebutton" class="btn btn-danger delete"  value="<?php echo $conid  ?> " name="dltbtn"> <i class="fas fa-calendar-times"></i></button>   </td>


    			</tr>

          <?php
$bil++;
include 'modalsched.php';

        }

         ?>

    	  </table>


              <!-- The Modal -->
              <div class="modal fade" id="addModal">
              <div class="modal-dialog">
              <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
              <h4 class="modal-title">Add Consultation Schedule</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">

                <div class="form-group">
                  <form class="" action="AdminSchedule_Action.php" method="post">

                <label >Beautician:</label>
                <select  class="form-control" id="beaut" name="beaut">
                  <option selected > Select a Beautician</option>
                  <?php
                  $resulttt=mysqli_query($connect,"SELECT BEAUTICIAN_ID,BEAUTICIAN_Name FROM beautician WHERE BEAUTICIAN_Status ='Available'" );

                  while($rowb = mysqli_fetch_assoc($resulttt) ):;
                      echo("<option value='".$rowb['BEAUTICIAN_ID']."'>".$rowb['BEAUTICIAN_Name']."</option>");
                  endwhile;
            ?>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>


              <div class="form-group">
              <label for="date">Date:</label>
              <input type="date" value="" min="<?php echo date("Y-m-d")?>" class="form-control" id="date" name="date" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
              </div>



              <div class="form-group">
              <label for="startTime">Start Time :</label>
              <input type="time" class="form-control" id="startTime" value="" placeholder="Enter Start Time" name="startTime" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <div class="form-group">
              <label for="endTime">End Time :</label>
              <input type="time" class="form-control" id="endTime" value="" placeholder="Enter End Time" name="endTime" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
              </div>





              <button type="submit" class="btn btn-primary" name="add" >Add New Schedule</button>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-dismiss="modal" name="closebtn" >Close</button>
            </form>

              </div>

              </div>
              </div>
              </div>



    	</div>
    		</div>



        <script type="text/javascript">
        $(function() {
        $(".delete").click(function(){
        var element = $(this);
        var appid = element.attr("value");
        var info = 'delete=' + appid;
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
        url: "AdminSchedule_Action.php",
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
