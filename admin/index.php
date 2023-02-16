<?php
session_start();
include 'connect.php';
if(!isset($_SESSION["ADMIN_Username"]))
{ header("Location:Admin_Login.php"); }

$queryproduct = mysqli_query( $connect , "SELECT COUNT(PRODUCT_ID ) FROM product WHERE PRODUCT_Status='Available' ") ;
$totalproduct= mysqli_fetch_array($queryproduct, MYSQLI_NUM);

$queryconsultation = mysqli_query( $connect , "SELECT COUNT(CONSULTATION_ID ) FROM consultation ");
$totalconsultation= mysqli_fetch_array($queryconsultation, MYSQLI_NUM);

$queryfeedback = mysqli_query( $connect , "SELECT COUNT(FEEDBACK_ID) FROM feedback ");
$totalfeedback= mysqli_fetch_array($queryfeedback, MYSQLI_NUM);

$querycustomers = mysqli_query( $connect , "SELECT COUNT(CUSTOMER_ID) FROM customer ");
$totalcustomers= mysqli_fetch_array($querycustomers, MYSQLI_NUM);

$queryorders = mysqli_query( $connect , "SELECT COUNT(orders.ORDERS_ID)
  FROM orders ");
 $totalorders= mysqli_fetch_array($queryorders, MYSQLI_NUM);

$querypaymentoder =mysqli_query( $connect , "SELECT SUM(PAYMENT_ORDER_Amount) FROM payment_order");
$totalpaymentoder = mysqli_fetch_array($querypaymentoder, MYSQLI_NUM);

$querypaymentconsultation =mysqli_query( $connect , "SELECT SUM(PAYMENT_CONSULTATION_Amount) FROM  payment_consultation ");
$totalpaymentconsultation= mysqli_fetch_array($querypaymentconsultation, MYSQLI_NUM);

$totalpayment =  $totalpaymentoder[0] + $totalpaymentconsultation[0];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js"></script>


  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.3/dist/sweetalert2.all.min.js" charset="utf-8"></script>



</head>


<?php include 'navbar.php'; ?>


<div class="container">
<div class="row">
        <!-- Total product data-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-list"></i>
              </div>
              <div class="mr-5">  <?php  echo $totalproduct[0] ; ?> Product!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Admin_Product.php"> <!-- product page link-->
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!-- Total consultation data-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="mr-5"> <?php  echo $totalconsultation[0] ; ?> Consultation!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Admin_Consultation.php"><!-- consultation page link-->
              <span class="float-left"> View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!-- total order data-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php  echo $totalorders[0] ; ?> Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Admin_Orders.php"><!-- order page link-->
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!-- total customer data-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-address-book"></i>
              </div>
              <div class="mr-5"><?php  echo $totalcustomers[0] ; ?> Customers!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Admin_Customer.php"><!-- customer page link-->
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <!-- total feedback data-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php  echo $totalfeedback[0] ; ?> Feedbacks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Admin_Feedback.php"><!-- feedback page link-->
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


                <!-- total payment data-->
                <div class="col-xl-4 col-sm-6 mb-3">
                  <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                      <div class="card-body-icon">
                        <i class="fa fa-money"></i>
                      </div>
                      <div class="mr-5"> Earnings RM <?php  echo $totalpaymentconsultation[0] +$totalpaymentoder[0] ; ?></div>
                    </div>

                  </div>
                </div>


      </div>
      <!-- End of Icon Cards-->


      <!-- Area Chart Sales-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Sales Overview</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
      <!-- End of Area Chart-->
    </div>
    </div>

      <!-- Area Chart Consultation-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Consultation Overview</div>
        <div class="card-body">
          <canvas id="myConsultationChart" width="100%" height="30"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">

        </div>

        </div>

      <!-- End of Area Chart-->


 <!--end of main board-->

 <!--dropdown menu script-->


<script>
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
    </script>
 <!--end of dropdown menu script-->

<script>


<?php  $ovquery = mysqli_query($connect ,"SELECT YEAR(PAYMENT_ORDER_Payment_Date) as SalesYear, MONTH(PAYMENT_ORDER_Payment_Date) as SalesMonth, SUM(PAYMENT_ORDER_Amount) AS TotalSales
    FROM payment_order
GROUP BY YEAR(PAYMENT_ORDER_Payment_Date), MONTH(PAYMENT_ORDER_Payment_Date)
ORDER BY YEAR(PAYMENT_ORDER_Payment_Date), MONTH(PAYMENT_ORDER_Payment_Date)" );

$month1 =0;
$month2=0;
$month3=0;
$month4=0;
$month5=0;
$month6=0;
$month7=0;
$month8=0;
$month9=0;
$month10=0;
$month11=0;
$month12=0;

$totalsales=0;
while( $ovsales = mysqli_fetch_assoc($ovquery) )
{


        if($ovsales['SalesMonth'] == 1){
           $month1 = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 2){
           $month2  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 3){
           $month3  =$ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 4){
           $month4  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 5){
           $month5  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 6){
           $month6  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 7){
           $month7  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 8){
           $month8 = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 9){
          $month9  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 10){
           $month10  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 11){
           $month11  = $ovsales['TotalSales'];
        }else if($ovsales['SalesMonth'] == 12){
           $month12  = $ovsales['TotalSales'];
        }

        $totalsales= $ovsales['TotalSales'];
        if($totalsales < $ovsales['TotalSales']  )
           { $totalsales =  $ovsales['TotalSales']; }

}

 ?>


// -- Area Chart
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
    datasets: [{
      label: "Total Sales",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,

      data: [  <?php echo $month1; ?>, <?php echo $month2; ?>, <?php echo $month3; ?>, <?php echo $month4; ?>, <?php echo $month5; ?>, <?php echo $month6; ?>, <?php echo $month7; ?>,<?php echo $month8; ?> ,<?php echo $month9; ?> ,<?php echo $month10; ?> ,<?php echo $month11; ?>,<?php echo $month12; ?> ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $totalsales; ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});




<?php

$consquery = mysqli_query($connect ,"SELECT YEAR(consultation_schedule.SCHEDULE_Date) as ConsYear, MONTH(consultation_schedule.SCHEDULE_Date) as ConsMonth, COUNT(consultation.CONSULTATION_ID ) AS TotalCons
FROM consultation_schedule,consultation WHERE consultation.CONSULTATION_ScheduleID= consultation_schedule.SCHEDULE_ID
GROUP BY YEAR(consultation_schedule.SCHEDULE_Date), MONTH(consultation_schedule.SCHEDULE_Date)
 ORDER BY YEAR(consultation_schedule.SCHEDULE_Date), MONTH(consultation_schedule.SCHEDULE_Date) " );

$month1 =0;
$month2=0;
$month3=0;
$month4=0;
$month5=0;
$month6=0;
$month7=0;
$month8=0;
$month9=0;
$month10=0;
$month11=0;
$month12=0;

$maxcons=0;
while( $totalcons = mysqli_fetch_assoc($consquery) )
{


        if($totalcons['ConsMonth'] == 1){
           $month1 = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 2){
           $month2  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 3){
           $month3  =$totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 4){
           $month4  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 5){
           $month5  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 6){
           $month6  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 7){
           $month7  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 8){
           $month8 = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 9){
          $month9  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 10){
           $month10  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 11){
           $month11  = $totalcons['TotalCons'];
        }else if($totalcons['ConsMonth'] == 12){
           $month12  = $totalcons['TotalCons'];
        }

        $maxcons= $totalcons['TotalCons'];
        if($maxcons < $totalcons['TotalCons']  )
           { $maxcons =  $totalcons['TotalCons']; }

}











 ?>
var ctxx = document.getElementById("myConsultationChart");
var myLineeChart = new Chart(ctxx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
    datasets: [{
      label: "Total",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,
      data: [  <?php echo $month1; ?>, <?php echo $month2; ?>, <?php echo $month3; ?>, <?php echo $month4; ?>, <?php echo $month5; ?>, <?php echo $month6; ?>, <?php echo $month7; ?>,<?php echo $month8; ?> ,<?php echo $month9; ?> ,<?php echo $month10; ?> ,<?php echo $month11; ?>,<?php echo $month12; ?> ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $maxcons; ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

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
</script>




<?php include 'script.php'; ?>





</body>
</html>
