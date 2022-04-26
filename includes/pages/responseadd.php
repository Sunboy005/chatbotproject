<?php 
if(isset($_GET['del'])){
	$query=mysqli_query($conn,"DELETE FROM responses WHERE response_id = '".$_GET['id']."'");
  if($query){
    echo "<script>alert('Response deleted successfully');</script>";
    "Location:../../addresponse.php";
  }else{
    echo "<script>alert('Response failed to delete');</script>";
    "Location:../../addresponse.php";
  } 		
}
?>
<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
      <div class="col-md-3">
          <div class="shop_sidebar_area">
            <?php include "includes/pages/general/adminsidebar.php";?>
          </div>
        </div>
        <div class="col-md-9">
          <div class="checkout_details_area clearfix">
              <div class="col-sm-12">
                <div class="col-sm-4"> <a href="addquery.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add a New Question</button></a></div>
                <div class="col-sm-4"><a href="unansweredadmin.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Unanswered</button></a></div>
                <div class="col-sm-4"> <a href="addresponse.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add New Answer</button></a></div>
              </div>
          </div>
          <div class="row">
                <div class="col-sm-6">
                  <div class="text-center  cart-page-heading mb-30">
                      <h2>Responses</h2>
                  </div>
                  <div class="align-content-lg-end"style="padding-right:5px;">
                    <table id="example2" class="table table-striped table-hover responsive" style="width:95%">
                      <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Response</th>
                        <th>Link</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $cnt=1;
                          $sql ="SELECT * FROM responses";
                          $result = mysqli_query($conn, $sql);
                          $rowcount=mysqli_num_rows($result);
                          while($row = mysqli_fetch_array($result)){
                            if ($rowcount<=0){
                              echo '<tr>No response added</tr>';
                            }else{                   
                            $responseId = $row['response_id'];
                            $response = $row['response'];
                            $link = $row['link'];
                        ?>
                        <tr>
                          <td><?php echo $cnt?></td>
                          <td><?php echo $response ?></td>
                          <td><?php echo $link ?></td>
                          <td>
                            <a href="addresponse.php?id=<?php echo  $responseId?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Delete"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                          </td>
                        </tr>
                        <?php }
                        $cnt++;
                        } ?> 
                      </tbody>
                      <tfoot>
                        <tr>                          
                          <th>s/N</th>
                          <th>Response</th>
                          <th>Link</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                </div>
              </div>
                  
                <div class="col-sm-6">                  
                <br/>
                <br/>
                  <div class="text-center  cart-page-heading mb-30">
                    <h3>Add a New Response</h3>
                  </div>
                  <form action="includes/processing/processor.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12" >
                          <label for="title">Response<span>*</span></label>
                          <input id="response" name="response" type="text" class="form-control">
                        </div>
                        <div class="col-sm-12">
                          <label for="link">Link without "HTTP://"<span>*</span></label>
                          <input type="text" name="link" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center mt-3">
                          <button type="submit" name="addresponse" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Add Response</button>
                      </div>
                    </div>    
                  </form>
                </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
