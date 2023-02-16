<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }

    $result = mysqli_query($connect,"SELECT feedback.FEEDBACK_ID, feedback.FEEDBACK_CustID, feedback.FEEDBACK_Message, feedback.FEEDBACK_Rating,
    customer.CUSTOMER_FirstName, customer.CUSTOMER_LastName, customer.CUSTOMER_Email FROM feedback INNER JOIN customer ON feedback.FEEDBACK_CustID
    =customer.CUSTOMER_ID");

    ?>
    <!DOCTYPE html>
    <html lang="">
    <head>
        <title>Feedback Beautician</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="admin.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <?php include 'navbarcss.php'; ?>
    </head>
    <body>


      <?php include 'navbar.php'; ?>



        <div class="content">
            <div class="FeedHeadSection">
                <i class='fas fa-book-reader' style="margin-left: 2%; font-size: 34px;"></i>
                <tab3><nobr class="FeedHeadAdmn">  Feedback</nobr></tab3>
            </div>

            <!-- Start of tutorial video table div -->
            <br><br><br>


                  		<div class="row justify-content-center">
                  <div class="col-auto">
                  		<table class="table table-bordered table-responsive table-hover table-sortable">
                  			<thead class="thead-dark">
                  					<tr class="text-center">
                  						<th> No</th>
                  							<th>ID</th>
                  							<th> FirstName </th>
                  							<th> LastName</th>
                  							<th> Email</th>
                  							<th> Message</th>
                  							<th> Rating </th>




                  					</tr>
                  			</thead>


                        <?php
                        while($row = mysqli_fetch_array($result)) {
                          $i=0;

                            if($i%2==0)
                                $classname="even";
                            else
                                $classname="odd";
                            ?>
                            <tr class="<?php if(isset($classname)) echo $classname;?>">
                                <td  ><?php echo $row["CUSTOMER_FirstName"]; ?></td>
                                <td  ><?php echo $row["CUSTOMER_FirstName"]; ?></td>
                                <td  ><?php echo $row["CUSTOMER_LastName"]; ?></td>
                                <td  ><?php echo $row["CUSTOMER_Email"]; ?></td>
                                <td  ><?php echo $row["FEEDBACK_Message"]; ?></td>
                                <td  ><?php echo $row["FEEDBACK_Rating"]; ?></td>
                                <td  >

                                        <button class="btn btn-danger delete" name="delete" value="<?php echo $row["FEEDBACK_ID"] ; ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                      </table>
            </div>
            </div>



            </div><!-- end of feedback video table div -->




    <script type="text/javascript">


        $(function() {
        $(".delete").click(function(){
        var element = $(this);
        var feedid = element.attr("value");
        var info = 'id=' + feedid;
        if(confirm("Are you sure you want to delete this?"))
        {
        $.ajax({
        type: "POST",
        url: "AdminFeedback_Action.php",
        data: info,
        success: function(){
        }
        });
        $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
        }
        return false;
        });
        });


        </script>
        <?php include 'script.php'; ?>

    </body>
    </html>
