

        <!-- The Modal -->
        <div class="modal fade" id="editModal<?php echo $row['ORDERS_ID']; ?>">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Update Order Status & Tracking Number</h4>
        <button type="button" class="close" data-dismiss="modal"  onclick="window.location.href='Admin_Orders.php'">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="" action="AdminOrders_Action.php" method="post">

      <div class="form-group">
        <label for="date">Order ID : </label>
        <input type="text" readonly name="ORDERS_ID" value="OD<?php echo $row['ORDERS_ID']; ?>" class="form-control">
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
        <label for="date">Customer Name : </label>
        <input type="text" readonly  value="<?php echo $row['CUSTOMER_FirstName']; echo  $row['CUSTOMER_LastName'];  ?>" class="form-control">
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>



        <div class="form-group">
        <label for="date">Ordered Date : </label>
        <input type="text" readonly  value="<?php echo $row['ORDERS_Ordered_Date'];   ?>" class="form-control">
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
      <label for="day">Order Status :</label>
      <select class="form-control"name="odstatus">
            <option selected="selected" value="<?php echo $row['ORDERS_Order_Status'];?>"><?php echo $row['ORDERS_Order_Status'];?></option>
            <?php 	 if (  $row['ORDERS_Order_Status']== "Unprocessed"   )
							 {
                 $option2 ="Processing";
                 $option3 ="Completed";

                 }

						else  if (  $row['ORDERS_Order_Status']== "Processing"   ){
                  $option2 ="Unprocessed";
                  $option3 ="Completed";
							}
              else {
                $option2 ="Processing";
                $option3 ="Unprocessed";
              }

 ?>
            <option  value="<?php echo $option2   ?>"><?php echo $option2   ?></option>
            <option  value="<?php echo $option3   ?>"><?php echo $option3   ?></option>
  </select>

      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>

      </div>

        <div class="form-group">
        <label for="startTime">Tracking Number :</label>
        <input type="text" class="form-control" value="<?php echo $row['ORDERS_Tracking_No']; ?>"   name="trackno" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>




        <button type="submit" class="btn btn-primary" name="update" >Update</button>
      </form>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" name="closebtn" onclick="window.location.href='Admin_Orders.php'">Close</button>

        </div>

        </div>
        </div>
