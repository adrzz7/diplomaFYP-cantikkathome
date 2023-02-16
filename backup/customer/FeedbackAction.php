<?php
session_start();
include 'connect.php';
if (isset($_SESSION["CUSTOMER_Username"])) {
    //echo $_SESSION["UserName"];
    if (isset($_POST['AddFeedback']))
    {
        $CUSTOMER_Username = $_SESSION["CUSTOMER_Username"];
        $sql1 = "SELECT CUSTOMER_ID FROM customer WHERE CUSTOMER_Username ='$CUSTOMER_Username'";
        $result = mysqli_query($connect, $sql1);
        $row = mysqli_fetch_array($result);
        $FEEDBACK_CustID=$row['CUSTOMER_ID'];
        $FEEDBACK_Message = mysqli_real_escape_string($connect, $_POST['FEEDBACK_Message']);
        $FEEDBACK_Rating = mysqli_real_escape_string($connect, $_POST['FEEDBACK_Rating']);


        $sql = "INSERT INTO feedback (FEEDBACK_CustID , FEEDBACK_Message, FEEDBACK_Rating) 
        VALUES ('$FEEDBACK_CustID', '$FEEDBACK_Message', '$FEEDBACK_Rating')";
        mysqli_query($connect, $sql);
        echo "<script>alert('Feedback sent successful!') </script>";
        echo "<script>location.replace('Feedback.php')</script>";

    }
}
