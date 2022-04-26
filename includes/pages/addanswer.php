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
          <div class="checkout_details_area mt-50 clearfix">

            <div class="text-center  cart-page-heading mb-30">
            <?php 
          if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $dn = mysqli_query($conn,'SELECT * from queries where query_id="'.$id.'"');
            while($row =mysqli_fetch_array($dn)) {
              $question = $row['incoming_message'];
              $questionId = $row['query_id'];
                
                }
            ?>
              <h2>Edit a Question and Response for Chat</h2>
            </div>
            <form action="includes/processing/processor.php?id="<?php echo $id?> method="POST">
                       <div class="row">
                            <div class=" col-md-6">
                                <label for="category" class="col-sm-6">Category</label>
                                <select class="form-control" name="categoryId">
                                    <?php
                                        $sql ="SELECT * FROM category";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['category_id']; ?>" >
                                       <?php echo $row['name']; ?>
                                    </option>
                                    <?php } ?> 
                                </select>                    
                            </div>
                            <div class=" col-md-6">
                                <label for="message" class="col-sm-6">Question</label>
                                <input type="text" name="message" value="<?php echo $question;?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                        <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="response">Response</label>
                                    <select class="form-control select2"  name="responseId" style="width: 100%;">
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
                            <div class=" col-md-6">
                              <br/>
                                <i class="fa fa-info text-info"></i> 
                                If the response is not available in the response use add response and addlink below.
                              </div>
                            </div>
                             
                            <div class="row">
                              <div class=" col-md-6">
                                <label for="message" class="col-sm-6">Add New Response</label>
                                <input type="text" name="response" placeholder="Add new response" class="form-control">
                              </div>
                              <div class=" col-md-6">
                                <label for="link" class="col-sm-6">Link without "HTTP://"</label>
                                  <input type="text" name="link" class="form-control">
                              </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" name="updatequery" class="btn btn-warning"><i class="fa fa-arrow-circle"></i> Update Question</button>
                        </div>    
                    </form>
                    <?php } ?>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
