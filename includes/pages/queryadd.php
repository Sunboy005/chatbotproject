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
              <h2>Add a Question and Response for Chat</h2>
            </div>
            <form action="includes/processing/processor.php" method="POST">
                       <div class="row">
                            <div class=" col-md-6">
                                <label for="category" class="col-sm-6">Category</label>
                                <select class="form-control" name="category">
                                    <option  disabled selected>Category</option>
                                    <?php
                                        $sql ="SELECT * FROM category";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?= $row['category_id']; ?>" >
                                       <?= $row['name']; ?>
                                    </option>
                                    <?php } ?> 
                                </select>                    
                                        </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6">
                                <label for="message" class="col-sm-6">Question</label>
                                <input type="text" name="message" class="form-control">
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="response">Response</label>
                                    <select class="form-control select2"  name="response" style="width: 100%;">
                                        <?php
                                            $sql1 ="SELECT * FROM responses";
                                            $result1 = mysqli_query($conn, $sql1);
                                            while($row1 = mysqli_fetch_array($result1)){
                                        ?>                                  
                                        <option value="<?php echo $row1['response_id'];?>"><?php echo $row1['response'];?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                        </div>               
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" name="addquery" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Add Question</button>
                        </div>    
                    </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
