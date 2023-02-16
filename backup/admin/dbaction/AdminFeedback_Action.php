    <?php
    include_once 'connect.php';


        mysqli_query($connect,"DELETE FROM feedback WHERE FEEDBACK_ID='" . $_POST["id"] . "'");
      ?>
