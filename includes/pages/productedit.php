<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
        <div class="col-md-8">
          <div class="checkout_details_area clearfix">
          <?php 
          if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $dn = mysqli_query($conn,'SELECT * from products where product_id="'.$id.'"');
            while($row =mysqli_fetch_array($dn)) {
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $category = $row['category_id'];
                }
            ?>
            <div class="text-center  cart-page-heading mb-30">
              <h2>Edit A Product</h2>
            </div>
            <form action="includes/processing/processor.php?id=<?php echo $id;?>" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="title">Product Name <span>*</span></label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="description">Description <span>*</span></label>
                  <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="Price">Price *</label>
                  <input type="number" class="form-control" name="price" value="<?php echo $price;?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="industry" class="label">Category *</label>
                  <select name="category" class="form-control" required>
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
                  <button type="submit" name="updateproduct" class="btn btn-warning"><i class="fa fa-up-arrow-circle"></i> Update Product</button>
                </div>
              </div>
            </form>
            <?php }?>
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


<!--================End Product Edit Area =================-->