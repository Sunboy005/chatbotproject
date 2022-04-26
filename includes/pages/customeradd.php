<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
        <div class="col-md-8">
          <div class="checkout_details_area mt-50 clearfix">

            <div class="text-center  cart-page-heading mb-30">
              <h2>Add a Customer</h2>
            </div>
            <form action="includes/processing/processor.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="title">First Name <span>*</span></label>
                  <input type="text" class="form-control" id="fname" name="fname" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="title">Last Name <span>*</span></label>
                  <input type="text" class="form-control" id="lname" name="lname" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="description">Phone <span>*</span></label>
                  <input type="text" class="form-control" id="phone" name="phone" value="" required>
                </div>
                <div class="custom-control custom-checkbox d-block mb-2">
                  <input type="hidden"  value="<?php echo $myid;?>" name="myid">
                  <button type="submit" name="addcustomer" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Customer</button>
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
</section>
