<?php
include 'connect.php';

if (isset($_POST['delete'])) {

$appid = $_POST['delete'];

$delete = mysqli_query($connect,"DELETE FROM consultation_schedule WHERE SCHEDULE_ID =$appid");

}


if(isset($_POST['add']))
{
  $date =$_POST['date'];
  $timestamp =strtotime($_POST['date']);
  $day = date('l', $timestamp);
    $starttime=$_POST['startTime'];
  $endtime=$_POST['endTime'];
  $beautid = $_POST['beaut'];


   $query= "INSERT INTO consultation_schedule ( SCHEDULE_Date ,SCHEDULE_Day,SCHEDULE_Start,SCHEDULE_End,SCHEDULE_Availability,SCHEDULE_BeauticianID  )
  VALUES ('$date','$day'  , '$starttime' ,'$endtime' ,'Available' ,'$beautid') ";

 mysqli_query($connect,$query );
 ?>

       <script type="text/javascript">
     window.location.href='Admin_Schedule.php';
       </script>


 <?php

 }




if(isset( $_GET['conschid'] ))
{
$conschid = $_GET['conschid'];

$res = mysqli_query($connect,"SELECT * FROM consultation_schedule,beautician WHERE consultation_schedule.SCHEDULE_BeauticianID =beautician.BEAUTICIAN_ID AND consultation_schedule.Schedule_ID= $conschid");
$row=mysqli_fetch_assoc($res);


$beautid = $row['BEAUTICIAN_ID'];
$beautname = $row['BEAUTICIAN_Name'];

    if ( $row['SCHEDULE_Availability'] =='Available') {
        $option1 =$row['SCHEDULE_Availability'] ;
        $option2 ='Unavailable';

    }
    else {
      $option1 =$row['SCHEDULE_Availability'] ;
      $option2 ='Available';
    }
}


if (isset($_POST['cnfrmupdt'])){


$date =$_POST['date'];
$timestamp =strtotime($_POST['date']);
$day = date('l', $timestamp);
$starttime=$_POST['startTime'];
$endtime=$_POST['endTime'];
$beautid = $_POST['beaut'];

 mysqli_query($connect,"UPDATE consultation_schedule SET SCHEDULE_Date='$date',SCHEDULE_Day='$day'  , 	SCHEDULE_Start='$starttime'    , SCHEDULE_End='$endtime'   ,SCHEDULE_Availability='Available' , SCHEDULE_BeauticianID ='$beautid'   WHERE SCHEDULE_ID=$conschid");

?>

      <script type="text/javascript">
    window.location.href='Admin_Schedule.php';
      </script>


<?php

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">


</script>
  </head>
  <body>


        <!-- The Modal -->
        <div class="modal fade" id="editModal">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Update Consultation Schedule</h4>
        <button type="button" class="close" data-dismiss="modal"   onclick="window.location.href='Admin_Schedule.php'">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group">
            <form class="" action="" method="post">

          <label >Beautician:</label>
          <select  class="form-control" id="beaut" name="beaut">
            <option value="<?php echo $beautid?>" >  <?php echo $beautname ?></option>
            <?php
            $resulttt=mysqli_query($connect,"SELECT BEAUTICIAN_ID,BEAUTICIAN_Name FROM beautician WHERE NOT BEAUTICIAN_ID=$beautid AND BEAUTICIAN_Status='Available'" );

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
        <input type="date" value="<?php echo $row['SCHEDULE_Date'] ?>" class="form-control" id="date" name="date" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>



        <div class="form-group">
        <label for="startTime">Start Time :</label>
        <input type="time" class="form-control" id="startTime" value="<?php echo $row['SCHEDULE_Start'];?>" placeholder="Enter Start Time" name="startTime" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
        <label for="endTime">End Time :</label>
        <input type="time" class="form-control" id="endTime" value="<?php echo $row['SCHEDULE_End'];?>" placeholder="Enter End Time" name="endTime" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>





        <button type="submit" class="btn btn-primary" name="cnfrmupdt" >Confirm Update</button>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal" name="closebtn"   onclick="window.location.href='Admin_Schedule.php'"
>Close</button>
      </form>

        </div>

        </div>
        </div>
        </div>





        <script>
        // Disable form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>




    <script type="text/javascript">
$(window).on('load', function(){

  $('#editModal').modal('show');
  });
    </script>





  </body>
</html>
