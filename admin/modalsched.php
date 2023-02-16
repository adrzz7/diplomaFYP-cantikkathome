  <!-- The Modal -->
        <div class="modal fade" id="editModal<?php echo $conid; ?>">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Update Consultation Schedule</h4>
        <button type="button" class="close" data-dismiss="modal"   >&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group">
            <form class="" action="" method="post">

          <label >Beautician:</label>
          <select  class="form-control" id="beaut" name="beaut">
            <option value="<?php echo $beautid?>" >  <?php echo $beautname ?></option>
            <?php
            $resulttt=mysqli_query($connect,"SELECT BEAUTICIAN_ID,BEAUTICIAN_Name FROM beautician WHERE NOT BEAUTICIAN_ID=$beautid AND BEAUTICIAN_Status='Available'" );

            while($rowb = mysqli_fetch_assoc($resulttt) ):;
                echo("<option value='".$rowb['BEAUTICIAN_ID']."'>".$rowb['BEAUTICIAN_Name']."</option>");
            endwhile;
      ?>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>


        <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" value="<?php echo $row['SCHEDULE_Date'] ?>" class="form-control" id="date" name="date" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>



        <div class="form-group">
        <label for="startTime">Start Time :</label>
        <input type="time" class="form-control" id="startTime" value="<?php echo $row['SCHEDULE_Start'];?>" placeholder="Enter Start Time" name="startTime" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
        <label for="endTime">End Time :</label>
        <input type="time" class="form-control" id="endTime" value="<?php echo $row['SCHEDULE_End'];?>" placeholder="Enter End Time" name="endTime" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>





        <button type="submit" class="btn btn-primary" name="cnfrmupdt" >Confirm Update</button>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal" name="closebtn"  
>Close</button>
      </form>

        </div>

        </div>
        </div>
        </div>

