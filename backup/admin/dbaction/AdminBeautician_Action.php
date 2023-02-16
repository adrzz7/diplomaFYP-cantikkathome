<?php
include 'connect.php';
if (isset($_POST['updtbtn'])) {

  $beautid = substr("$_POST[id]" ,1);
  $name = $_POST['beautname'];
  $email = $_POST['email'];
  $add =$_POST['add'];
  $desc =$_POST['desc'];
  $num=$_POST['num'];
  $spec =$_POST['spec'];


mysqli_query($connect,"UPDATE beautician SET BEAUTICIAN_Name='$name', BEAUTICIAN_Description ='$desc', BEAUTICIAN_Specialization	='$spec' ,BEAUTICIAN_Email='$email' , BEAUTICIAN_Address='$add' , BEAUTICIAN_Contact='$num'    WHERE 	BEAUTICIAN_ID =$beautid") ;



  }

  if (isset($_POST['addbtnn'])) {

    $name = $_POST['beautname'];
    $email = $_POST['email'];
    $add =$_POST['add'];
    $desc =$_POST['desc'];
    $num=$_POST['num'];
    $spec =$_POST['spec'];

     mysqli_query($connect,"INSERT INTO beautician (  BEAUTICIAN_Name,BEAUTICIAN_Description,BEAUTICIAN_Specialization,BEAUTICIAN_Email,BEAUTICIAN_Address,BEAUTICIAN_Contact,BEAUTICIAN_Status) VALUES ('$name', '$desc','$spec' ,'$email' , '$add' , '$num','Available' ) ");



    }

if (isset($_POST['beautid'])) {


  $beautid =$_POST['beautid'] ;

   mysqli_query($connect,"UPDATE beautician set BEAUTICIAN_Status ='Unavailable' WHERE BEAUTICIAN_ID =$beautid");
   mysqli_query($connect,"DELETE FROM consultation_schedule  WHERE SCHEDULE_BeauticianID  =$beautid AND SCHEDULE_Availability='Available'");

}

  ?>



<script type="text/javascript">
  window.location.href="Admin_Beautician.php";
</script>
