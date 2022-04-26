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
              <h2>Add a Template</h2>
            </div>
            <form action="includes/processing/processor.php" method="POST">
                       <div class="row">
                            <div class="col-md-6" >
                                <label for="title" >Title</label>
                                <input id="title" name="title" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="category" >Category</label>
                                <select class="form-control" name="category">
                                    <option disabled selected>Category</option>
                                    <?php
                                        $sql ="SELECT * FROM category";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?= $row['category_id']; ?>">
                                       <?= $row['name']; ?>
                                    </option>
                                    <?php } ?> 
                                </select>                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="link" > Download Link without "HTTP://"</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="type" >Type</label>
                                <select class="form-control" name="type">
                                    <option style="background-color:rgba(40, 58, 90, 0.9)" disabled selected>Template Type</option>
                                    <?php
                                    $sql ="SELECT * FROM templatetype";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?= $row['templatetype_id']; ?>">
                                    <?= $row['name']; ?>
                                    </option>
                                    <?php } ?> 
                                </select>   
                            </div>
                        </div>          
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" name="addtemplate" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Add Template</button>
                        </div>    
                    </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
