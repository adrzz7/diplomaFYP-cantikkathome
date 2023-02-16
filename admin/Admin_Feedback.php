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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
 
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>.swal2-title {
    position: relative;
    max-width: 100%;
    margin: 0 0 .4em;
    padding: 0;
    color: #fffffff;
    font-size: 1.875em;
    font-weight: 600;
    text-align: center;
    text-transform: none;
    word-wrap: break-word;
}

h2 {
    background: #ffffff;
    padding: 20px 35px;
    margin: -10px -50px;
    text-align: center;
    border-radius: 10px 10px 0 0;
}</style>
      <?php include 'navbarcss.php'; ?>
    </head>
    <body>


      <?php include 'navbar.php'; ?>



       <div class="container">
        <div class="clearfix">
   <div class="box" style=" width:60px;">
  <h1><i class="fas fa-envelope-open-text"></i></h1>
  </div>
  <div class="box">
  <h1>FEEDBACK</h1>
  </div>
  </div>
<?php
			$sql = "SELECT * FROM feedback INNER JOIN customer ON feedback.FEEDBACK_CustID
      =customer.CUSTOMER_ID";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
		<div class="row justify-content-center">
<div class="col-auto">
		<table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Rating</th>
          <th scope="col">Action</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>
            
            <th scope="row"><?php echo $bil;?></th>
            <td ><?php echo $result['CUSTOMER_FirstName'];?></td>
            <td ><?php echo $result['CUSTOMER_LastName'];?></td>
					  <td ><?php echo $result['CUSTOMER_Email'];?></td>
					  <td ><?php echo $result['FEEDBACK_Message'];?></td>
					  <td ><?php echo $result['FEEDBACK_Rating'];?></td>
					  <td  ><button class="btn btn-danger delete" name="delete" value="<?php echo $result["FEEDBACK_ID"]; ?>"><i class="fa fa-trash"></i></button>
          </td>
					
          </tr>
					
          <?php
          $bil++;
					}				
				?>
        
        </tbody>
      </table>  
</div>

            </div><!-- end of feedback video table div -->




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
        url: "AdminFeedback_Action.php",
        data: info,
        success: function(){
            
            
        }
        });
        $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
        

  }
         window.location.href='Admin_Feedback.php';

})
       
        return false;
        });
        });

 $(document).ready(function() {
            $('#table').DataTable();
        } );

        </script>
        <?php include 'script.php'; ?>
    </body>
    </html>
