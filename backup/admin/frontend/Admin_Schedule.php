<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:AdminLogin.php"); }




 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Schedule</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="admin.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>

 <?php include 'navbarcss.php'; ?>

 </head>
 <body>
   <?php include 'navbar.php'; ?>



<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h2>CONSULTATION SCHEDULE</h2>
  </div>
  <div class="remove">
     <button type="button" id="popup" data-toggle="modal"  data-target="#addModal">ADD</button>

    </div>
  </div>
        </div>
    		<div class="row justify-content-center">
    <div class="col-auto">
    		<table id="table" class="table table-bordered table-hover table-sortable">
    			<thead class="thead-dark">
    					<tr class="text-center">
    							<th> ID </th>
                  <th> Beautician Name</th>
                  <th> Date</th>
    							<th> Day </th>
    							<th> Start Time </th>
                  <th> End Time </th>
    							<th> Availability </th>
    						  <th> Action </th>
    					</tr>
    			</thead>

    			<?php

          $res = mysqli_query($connect,"SELECT * FROM consultation_schedule,beautician WHERE consultation_schedule.SCHEDULE_BeauticianID =beautician.BEAUTICIAN_ID AND SCHEDULE_Availability='Available'");

    						 while ($row = mysqli_fetch_assoc($res) )
    						 {
                    $conid = $row['SCHEDULE_ID'];

    			?>

    			<tr >
    				 <td class="text-center">  <?php echo $conid ?>  </td>
             <td class="text-center"><?php  echo $row['BEAUTICIAN_Name']; ?></td>

    					<td class="text-center"> <?php echo $row['SCHEDULE_Date'];  ?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_Day'];?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_Start'];   ?>  </td>
    					<td class="text-center"> <?php echo $row['SCHEDULE_End'];  ?>  </td>
              <td> <span class="badge badge-success"> <?php echo $row['SCHEDULE_Availability'];  ?> </span></td>

              <td>
                    <button type="submit" id=" updatebtn" class="btn btn-info"  value="<?php echo $conid ?>" name="updatebtn"  onclick="window.location.href='AdminSchedule_Action.php?conschid=<?php echo $conid ?>'" >EDIT</button>
                    <button type="button"  id="deletebutton" class="btn btn-danger delete"  value="<?php echo $conid  ?> " name="dltbtn"> DELETE</button>   </td>


    			</tr>

          <?php

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
              <button type="submit" class="btn btn-danger" data-dismiss="modal" name="closebtn" onclick="functionNamee();">Close</button>
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
        if(confirm("Are you sure you want to delete this?"))
        {
        $.ajax({
        type: "POST",
        url: "AdminSchedule_Action.php",
        data: info,
        success: function(){
        }
        });
        $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
        }
        return false;
        });
        });

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>


    <?php include 'script.php'; ?>
  </div>



  </body>
</html>
