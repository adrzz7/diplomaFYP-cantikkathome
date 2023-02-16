<div id="editModal<?php echo $result['CATEGORIES_ID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Category</h4>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
      </div>
      <div class="modal-body">
        <form action="AdminCategories_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>

                                  <input type="hidden"  name="cid" id="cid" value="<?php echo $result['CATEGORIES_ID'];?>" >
                                       <div class="form-group">
                                         <label for="pname">Category Name</label>
                                         <input class="form-control" required type="text" id="cname" value="<?php echo $result['CATEGORIES_Name'];?>" name="categoryname">
                                         <div class="valid-feedback">Valid.</div>
                                         <div class="invalid-feedback">Please fill out this field.</div>
                                         </div>



                                         <button  class="btn btn-primary" type="submit" name="update" >UPDATE</button>
                                     </form>
                                   </div>

                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                   </div>
</div>

</div>
</div>



<!-- Modal -->
  <div id="editModal<?php echo $result['PRODUCT_ID']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Product</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='Admin_Product.php'">&times;</button>
        </div>
        <div class="modal-body">
          <form action="AdminProduct_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>

            <input type="hidden" name="id" value="<?php echo $result['PRODUCT_ID']; ?>">

                                         <div class="form-group">
                                           <label for="pname">Product Name</label>
                                           <input class="form-control"  required  type="text" name="productname" value="<?php echo $result['PRODUCT_Name']; ?>">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label for="price">Category</label>
                                           <select name="product_cat" class="form-control"  required  ><!-- form-control Begin -->
                                                 <option selected="selected" value="<?php echo $result['CATEGORIES_ID'];?>"><?php echo $result['CATEGORIES_Name'];?></option>
                                                   <?php
                                                   $res = mysqli_query($connect, "SELECT * FROM categories WHERE NOT CATEGORIES_ID= '$result[CATEGORIES_ID]' AND CATEGORIES_Status ='Available' ");
                                                   while($displaycat = mysqli_fetch_assoc($res)) :
                                                   ?>
                                                     <option value="<?php echo $displaycat['CATEGORIES_ID']; ?> "><?php echo $displaycat['CATEGORIES_Name']; ?></option>
                                                   <?php
                                                   endwhile;
                                                   ?>
                                           </select>
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label> Price</label>
                                           <input class="form-control"  required value="<?php echo $result['PRODUCT_Price'];?>" type="text" name="price" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label>Description</label>
                                           <input class="form-control"  required  value="<?php echo $result['PRODUCT_Descriptions'];?>" type="text" name="description" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                           <label >Product Image</label>
                                           <input class="form-control" required  type="file" value="<?php echo $result['PRODUCT_Images'];?>" name="productimage" accept="image/*" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>


                                           <button  class="btn btn-primary" type="submit" name="update" >Save</button>

                                         </form>

                                     </div>

                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='Admin_Product.php'" >Close</button>
                                     </div>
</div>

</div>
</div>





<div id="editModal<?php echo $result['TUTORIAL_ID'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Tutorial Video</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='Admin_Tutorial.php'">&times;</button>
      </div>
      <div class="modal-body">
        <form action="AdminTutorial_Action.php" id="AddTutoform" method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>

          <div class="form-group">

            <input type="hidden" name="TUTORIAL_ID" value="<?php echo $result['TUTORIAL_ID'];?>"   >
            <label   >Tutorial Title    </label>
            <input class="form-control"  required  type="text"   name="TUTORIAL_Name" value="<?php echo $result['TUTORIAL_Name']; ?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>

          <div class="form-group">
                <label   >Category  </label>
                <select  class="form-control" name="TUTORIAL_CategoryID" required>
                      <option selected="selected" value="<?php echo $result['CATEGORIES_ID'];?>"><?php echo $result['CATEGORIES_Name'];?></option>
                  <?php
                  $res = mysqli_query($connect, "SELECT * FROM categories WHERE NOT CATEGORIES_ID= '$result[CATEGORIES_ID]'");
                  while($displaycat = mysqli_fetch_assoc($res)) :
                  ?>
                      <option value="<?php echo $displaycat['CATEGORIES_ID']; ?> "><?php echo $displaycat['CATEGORIES_Name']; ?></option>
                  <?php
                endwhile;
                  ?>
                </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>




          <div class="form-group">
                <label   >Tutorial Video Link  </label>
                <input class="form-control"  required  type="text"   name="TUTORIAL_VidLink" value="<?php echo $result['TUTORIAL_VidLink']; ?>"  >
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>



          <div class="form-group">
              <label   >Tutorial Video Description  </label>
              <input class="form-control"  required  type="text"   name="TUTORIAL_Description" value="<?php echo $result['TUTORIAL_Description']; ?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>



          <div class="form-group">
                <label   >Date  </label>
                <input class="form-control"  required  type="date"  name="TUTORIAL_Date" value="<?php echo $result['TUTORIAL_Date']; ?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>

          <div class="form-group">
                <label   >Time  </label>
                <input class="form-control"  required  type="time"   name="TUTORIAL_Time" value="<?php echo $result['TUTORIAL_Time']; ?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>


          <button  class="btn btn-primary" type="submit" name="update" >Save</button>
      </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='Admin_Tutorial.php'">Close</button>
      </div>
    </div>

  </div>
</div>
