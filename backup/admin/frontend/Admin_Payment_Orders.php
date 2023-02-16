
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:AdminLogin.php"); }


?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>


<?php include 'navbarcss.php'; ?>

</head>
<body>
  <?php include 'navbar.php'; ?>



<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h2>ORDER PAYMENT</h2>
  </div>

  </div>
        </div>
    		<div class="row justify-content-center">
    <div class="col-auto">
<table class="table table-bordered table-responsive table-hover table-sortable">
  			<thead class="thead-dark">
					<tr class="text-center">
							<th> No</th>
							<th> Payment ID</th>
              <th> Order ID</th>
							<th> Payment Date </th>
							<th> Status </th>
							<th> Total Amount</th>
							<th> Receipt</th>
              <tH > ACTION  </tH>

					</tr>
			</thead>

			<?php
$count =0;
				$res = mysqli_query($connect,"SELECT * FROM payment_order ");


						$ability="";  	$state="";
						 while ($row = mysqli_fetch_assoc($res) )
						 {
								$payid =$row['PAYMENT_ORDER_ID'];

							 if (  $row['PAYMENT_ORDER_Status']== "Unapproved")
							 {  $rowcolour ="table-danger";  }

						else {
									$rowcolour ="table-success";
							}



              if (  $row['PAYMENT_ORDER_Status']== "Unapproved")
									{		$ability = "";
											$state = "";
										}

              else if (  $row['PAYMENT_ORDER_Status']== "Approved")
                   {
										 $ability = "disabled";
 										$state = "checked";

									 }




			?>

			<tr class="<?php echo $rowcolour ; ?> " >
        <td class="text-center"><?php $count++ ; echo $count ?>  </td>
        <td class="text-center">PY<?php echo $row['PAYMENT_ORDER_ID']; ?>  </td>
					<td class="text-center">OD<?php echo $row['PAYMENT_ORDER_OrderID'];  ?>  </td>
					<td class="text-center"> <?php echo  $row['PAYMENT_ORDER_Payment_Date'];?>  </td>
					<td > <?php echo $row['PAYMENT_ORDER_Status'];   ?>  </td>
					<td > RM <?php echo $row['PAYMENT_ORDER_Amount'];  ?>  </td>
					<td > <img src=data:image;base64,<?php echo $row['PAYMENT_ORDER_Receipt']; ?> width="100px" />  </td>


				<td>
					<form class="" action="" method="post">


						<label class="mark" >
							<?php  	echo "<input  type=checkbox name=consultationstatus value=".$row['PAYMENT_ORDER_ID']. " ".$ability." ".$state."  onclick=UpdatePaymentStatus(".$payid.",this.checked)  onchange=window.location.href='Admin_Payment_Orders.php';  >    ";    ?>
								<span   class="checkmark"></span>
					 </label>

				</td>



			</tr>

<?php  }

?>

	  </table>

	</form>


			<script type="text/javascript">

						function UpdatePaymentStatus(uid, chk) {
				 chk = (chk==true ? "1" : "0");
				 var url = "AdminPayment_Action.php?payid="+uid+"&chkYesNo="+chk;
				 if(window.XMLHttpRequest) {
						req = new XMLHttpRequest();
				 } else if(window.ActiveXObject) {
						req = new ActiveXObject("Microsoft.XMLHTTP");
				 }
				 // Use get instead of post.
				 req.open("GET", url, true);
				 req.send(null);
			}
			</script>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


</script>
	</div>
		</div>
		</div>

</body>
</html>
