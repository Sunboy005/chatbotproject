<link rel="stylesheet" href="assets/css/admin.css">
<link rel="stylesheet" href="assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
<section class="shop_grid_area" style="padding-top:120px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">
                         <?php include "includes/pages/general/adminsidebar.php";?>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-md-9">
                                <?php 
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    //fetch from database
                                    $sql = "SELECT * FROM category WHERE category_id='$id'";
                                    if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        if ($row==null){
                                            echo '<tr>No Products to display</tr>';
                                          }else{                                        
                                        $categoryname=$row['name'];
                                        $description=$row['description'];
                                              ?>
                                        <div class="rows">
                                            <div class="col-md-12">
                                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                                    <div class="product-sorting d-flex align-items-center">
                                                        <h3>Edit Category</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                    <form action="includes/processing/resourceinfo.php" method="POST">
                                                        <div class="mt-3 form-group">
                                                            <label for="exampleInputEmail1">Category Name</label>
                                                            <input type="text" class="col-sm-12 form-control" name="name" value="<?php echo $categoryname;?>" required>
                                                        </div>
                                                        <div class="mt-3 form-group">
                                                            <label for="exampleInputEmail1">Category Description</label>
                                                            <textarea class="form-control col-sm-12 " name="description" required><?php echo $row['description'];?></textarea>
                                                        </div>
                                                        <div class="mt-3 form-group">
                                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                                            <button type="submit" name="updatecat" class="btn btn-primary mt-4">Update</button>
                                                        </div>                                                    
                                        </div>
                                        <?php }
                                        }
                                    }?>
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
                </div>
            </div>
        </div>
    </section>
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	
<script>
  $(function () {
    $('#example1').DataTable(
        {
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    }
    )
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
    