<?php

include 'connect.php';


    if (isset($_POST['add']))
    {
        $TUTORIAL_Name = mysqli_real_escape_string($connect, $_POST['TUTORIAL_Name']);
        $CATEGORIES_ID = mysqli_real_escape_string($connect, $_POST['product_cat']);
        $TUTORIAL_CategoryID = $CATEGORIES_ID;
        $TUTORIAL_VidLink  = mysqli_real_escape_string($connect,$_POST['TUTORIAL_VidLink']);
        $TUTORIAL_Description = mysqli_real_escape_string($connect, $_POST['TUTORIAL_Description']);
        $TUTORIAL_Date = date("Y/m/d");
        $TUTORIAL_Time = date("H:i");


      mysqli_query($connect,"INSERT INTO tutorial (TUTORIAL_Name,TUTORIAL_CategoryID,TUTORIAL_VidLink,TUTORIAL_Description,TUTORIAL_Date,TUTORIAL_Time,TUTORIAL_Status) VALUES ('$TUTORIAL_Name', '$TUTORIAL_CategoryID', '$TUTORIAL_VidLink','$TUTORIAL_Description','$TUTORIAL_Date','$TUTORIAL_Time','Available')");
         header('location: Admin_Tutorial.php');

    }



    if (isset($_POST['delete'])) {

    $tutid = $_POST['delete'];
    mysqli_query($connect,"DELETE FROM tutorial WHERE TUTORIAL_ID =$tutid");

    }





    //update data
    if (isset($_POST['update'])) {

        $TUTORIAL_ID = $_POST['TUTORIAL_ID'];
        $TUTORIAL_Description =  $_POST['TUTORIAL_Description'];
        $TUTORIAL_Name =  $_POST['TUTORIAL_Name'];
        $TUTORIAL_CategoryID =  $_POST['TUTORIAL_CategoryID'];
        $TUTORIAL_VidLink =  $_POST['TUTORIAL_VidLink'];
        $TUTORIAL_Time =  $_POST['TUTORIAL_Time'];
        $TUTORIAL_Date =  $_POST['TUTORIAL_Date'];

        $sql = "UPDATE tutorial SET TUTORIAL_Name='$TUTORIAL_Name', TUTORIAL_CategoryID='$TUTORIAL_CategoryID', TUTORIAL_VidLink='$TUTORIAL_VidLink', TUTORIAL_Description='$TUTORIAL_Description', TUTORIAL_Date='$TUTORIAL_Date', TUTORIAL_Time='$TUTORIAL_Time' ,TUTORIAL_Status	='Available' WHERE TUTORIAL_ID='$TUTORIAL_ID' ";
        mysqli_query($connect, $sql);

       header('location: Admin_Tutorial.php');
    }









 ?>
