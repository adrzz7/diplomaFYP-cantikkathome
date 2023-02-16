<?php
	session_start();
    include '../connect.php';

		if(!isset($_SESSION["CUSTOMER_Username"]) ){
    header("Location:MainPage.php");
	}

?>




	<div class="nav">
			<?php include 'header.php';?>
	</div>


<div class="jumbotron text-center" style="margin-bottom:0;  background: #fdfcee">
  <h1>Consultation</h1>
  <img src="user/consultation model.png" class="img-fluid"  alt="">
</div>

<br>
<br>
<h2 style="text-align:center" ><b>DIGITAL CONSULTATION</b> </h2>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="media">
    <div class="media-left">
      <img src="user/CONSULTATION MODELL.png" class="media-object" style="width:400px">
    </div>

    <div class="media-body" style="padding-left:50px; font-size:20px">
      <br>
      <p>Due to the unprecedented crisis , we are forced to live in " New Normal". But fret not ,no one can stop you from shining beautifully.</p>
      <p>I am utilizing the digital platform to reach you at your own comfort. Several tools will be used to ease the process. Below are the instructions for you to follow to get connected with me lively.</p>
    </div>

  </div>


  </div>
</div>

<br>
<br>


<h2 style="text-align:center" ><b>FOLLOW THESE STEPS</b> </h2>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="media">

    <div class="media-body" style="font-size:30px">
      <br>
      <ol type="1">
        <li>Consultation is based on cart system.</li>
        <li> Below this section you will find the item to be added.</li>
        <li>Click the  " + "   button to adjust the duration of the hours.</li>
        <li>Then select the date of your choice</li>
        <li>Click  " Book Now"  button.</li>
        <li>You will be directed to the cart page to view the fees of charge. Then proceed to make payment</li>
        <li>In the shipping options , please tick the checkbox" For Consultation" .</li>
        <li>Upload the payment receipt and click  " Pay Now "</li>
      </ol>
    </div>

  </div>


  </div>
</div>





<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="media">
      <div class="media-left">
        <img src="user/CONPAGE.jpg" class="media-object" style="width:400px">
      </div>
    <div class="media-body" style="padding-left:50px;font-size:30px">


      <div class="container-fluid" >
			<h1><b>BOOK YOUR SLOT HERE</b></h1>

								<div  class="form-group">
					          <h2><b><u>ONLINE CONSULTATION</u></b></h2>
												<label for="consultdate">Choose a date to see our beautician's schedule</label>
												<input class="form-control" id="chosendate" name="chosendate"type="date"  value="" min="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
										<!--		<input type="date" name="consultdate" class="form-control" min="<?php// echo date("Y-m-d")?>"  > -->



					      </div>


								<script>
								function showUser(str) {

								if (str == "") {

								document.getElementById("txtHint").innerHTML = "No data to be shown ";

								return;
								} else {
								if (window.XMLHttpRequest) {
								// code for IE7+, Firefox, Chrome, Opera, Safari
								xmlhttp = new XMLHttpRequest();
								} else {
								// code for IE6, IE5
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
								}
								xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
								}
								};
								xmlhttp.open("GET","getschedule.php?consultdate="+str,true);
								console.log(str);
								xmlhttp.send();
								}
								}
								</script>


								<div id="txtHint">

								</div>

</div>  <!--Container fluid -->
</div><!--Media body -->

  </div><!--Media  -->


</div><!--ROw-->
</div><!--Container -->





<div class="footer">
		<?php include 'footer.php';?>
</div>

</body>
</html>
