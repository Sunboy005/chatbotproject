<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
      <div class="col-md-4">
          <div class="shop_sidebar_area">
            <?php include "includes/pages/general/adminsidebar.php";?>
          </div>
        </div>
        <div class="col-md-8">          
          <div class="checkout_details_area clearfix">
            <div class="text-center  cart-page-heading mb-30">
              <h2>Add a Resource</h2>
            </div>
            <form action="includes/processing/processor.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-6" >
                      <label for="title">Title<span>*</span></label>
                      <input id="title" name="title" type="text" class="form-control" required>
                  </div>
                <div class="col-md-6 mb-3">
                  <label for="type">Type *</label>
                  <select  class="form-control" name="type" required>
                    <option value="">Select Type</option>
                    <?php
                    $query ="SELECT * FROM type";
                    $stmt2 = $conn->prepare($query);
                    $stmt2->execute();
                    $res=$stmt2->get_result();
                    while($rowd=$res->fetch_object())
                    {
                      ?>
                      <option value="<?php echo $rowd->id;?>" ><?php echo $rowd->name;?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>                      
                <div class="row">
                  <div class="col-md-6">
                    <label for="summary">Summary<span>*</span></label>
                    <input id="summary" type="text" name="summary" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="imagefile">Resource Image<span>*</span></label>
                    <input id="imagefile" type="file" name="imagefile" class="form-control" required>
                  </div>
                </div>                                
                <div class="col-md-12">
                    <label for="details">Details<span>*</span></label>
                    <textarea id="summernote" class="form-control" id="details" row="5" name="details"></textarea>
                </div>   
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" name="addresources" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Add Resources</button>
                </div>    
            </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
 