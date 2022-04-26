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
        <?php 
          if(isset($_GET['id'])){	
            $id = intval($_GET['id']);
            $dn = mysqli_query($conn,'SELECT * FROM resources WHERE resource_id="'.$id.'"');
            $row = mysqli_fetch_array($dn);
            $title=$row["title"];
            $id=$row["resource_id"];
            $summary=$row["summary"];
            $details=$row["details"];
            $typeId=$row["type_id"];
          
            ?>        
          <div class="checkout_details_area clearfix">
            <div class="text-center  cart-page-heading mb-30">
              <h2>Edit <?php echo $title;?></h2>
            </div>
            <form action="includes/processing/processor.php?id=<?php echo $id;?>" method="POST">
              <div class="row">
                  <div class="col-md-6" >
                      <label for="title">Title<span>*</span></label>
                      <input id="title" name="title" type="text" value="<?php echo $title ?>" class="form-control" required>
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
                    <input id="summary" type="text" name="summary" value="<?php echo $summary ?>" class="form-control" required>
                  </div>
                </div>                                
                <div class="col-md-12">
                    <label for="details">Details<span>*</span></label>
                    <textarea id="summernote" class="form-control" id="details" row="5" name="details"><?php echo $details ?></textarea>
                </div>   
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" name="editresources" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Update Resource</button>
                </div>    
            </form>
            </div>
            <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>
