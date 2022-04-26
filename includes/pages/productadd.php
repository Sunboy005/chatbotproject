<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
        <div class="col-md-8">
          <div class="checkout_details_area mt-50 clearfix">

            <div class="text-center  cart-page-heading mb-30">
              <h2>Add a Product</h2>
            </div>
            <form action="includes/processing/processor.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="title">Product Name <span>*</span></label>
                  <input type="text" class="form-control" id="name" name="name" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="description">Description <span>*</span></label>
                  <input type="text" class="form-control" id="description" name="description" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="Price">Price *</label>
                  <input type="number" class="form-control" name="price" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="category">Category *</label>
                  <select  class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <?php
                    $query ="SELECT * FROM category";
                    $stmt2 = $conn->prepare($query);
                    $stmt2->execute();
                    $res=$stmt2->get_result();
                    while($rowd=$res->fetch_object())
                    {
                      ?>
                      <option value="<?php echo $rowd->category_id;?>" ><?php echo $rowd->name;?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="custom-control custom-checkbox d-block mb-2">
                  <input type="hidden"  value="<?php echo $myid;?>" name="myid">
                  <button type="submit" name="addproduct" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="shop_sidebar_area">
            <?php include "includes/pages/general/resources_sidepost.php";?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
