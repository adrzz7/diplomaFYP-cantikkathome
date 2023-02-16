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
