
<!-- The Modal -->
<div class="modal fade" id="editModal<?php echo $row['CONSULTATION_ID']; ?>">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Update Consultation Status & Send Meeting Link</h4>
<button type="button" class="close" data-dismiss="modal" onclick="pwindow.location.href='Admin_Consultation.php'">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
<div class="form-group">
  <form class="" action="AdminConsultation_Action.php" method="post">

<label for="date">Consultation ID : </label>
<input type="text" readonly name="CONSULTATION_ID"  value="OD<?php echo $row['CONSULTATION_ID']; ?>" class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">

<label for="custname">Customer Name : </label>
<input type="text" readonly  value="<?php echo $row['CUSTOMER_FirstName']; echo  $row['CUSTOMER_LastName'];  ?>" class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">

<label for="servicetype">Service Type : </label>
<input type="text" readonly  value="<?php echo $row['CONSULTATION_ServiceType'];  ?>" class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">

<label for="day">Day : </label>
<input type="text" readonly  value="<?php echo $row['SCHEDULE_Day'];  ?> " class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">

<label for="date"> Date : </label>
<input type="text" readonly  value="<?php echo $row['SCHEDULE_Date'];   ?>" class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">

<label for="time"> Time : </label>
<input type= "text" readonly  value="<?php echo $row['SCHEDULE_Start'];echo "---"; echo $row['SCHEDULE_End']; ?> " class="form-control">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

<div class="form-group">
<label for="day">Consultation Status :</label>
<select class="" name="consultstatus">
    <option selected="selected" value="<?php echo $row['CONSULTATION_Status'];?>"><?php echo $row['CONSULTATION_Status'];?></option>

    <?php

    if (  $row['CONSULTATION_Status']== "Unprocessed"   )
    {
      $option2 ="Processing (Email Sent)";
      $option3 ="Completed";
      $visibility="";

    }

    else  if (  $row['CONSULTATION_Status']== "Processing (Email Sent)" )  {
       $option2 ="Unprocessed";
       $option3 ="Completed";
       $visibility="readonly";

    }
    else {
     $option2 ="Processing (Email Sent)";
     $option3 ="Unprocessed";
     $visibility="readonly";
    } ?>
    <option  value="<?php echo $option2   ?>"><?php echo $option2   ?></option>
    <option  value="<?php echo $option3   ?>"><?php echo $option3   ?></option>
</select>

<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>

</div>

<div class="form-group">
<label for="startTime">Meeting Link :</label>
<input type="text" class="form-control" id="M<?php echo $row['CONSULTATION_ID']; ?>" value="<?php echo $row['CONSULTATION_MeetingLink'];?>"   name="meetinglink" <?php echo "$visibility"; ?>   required>
<button type="button" name="meet" value="<?php echo $row['CONSULTATION_ID']; ?>"  id="<?php echo $row['CONSULTATION_ID']; ?>" > Create Meeting Link </button>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>




<button type="submit" class="btn btn-primary" name="cnfrmupdt" >Confirm Update</button>
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="submit" class="btn btn-danger" data-dismiss="modal" name="closebtn" onclick="window.location.href='Admin_Consultation.php'">Close</button>
</form>

</div>

</div>
</div>
</div>



<script type="text/javascript">

$("#<?php echo $row['CONSULTATION_ID']; ?>").click(function(){
  var element = $(this);
  var appid = element.attr("value");
  var link = "consultation-room.php?id="+appid;

    $("#M<?php echo $row['CONSULTATION_ID']; ?>").val(link);

});
</script>
