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
              <div class="product-topbar d-flex align-items-center justify-content-between">
                <div class="row align-content-lg-end">
                  <div class="product-topbar d-flex align-items-center justify-content-between">
                    <div class="row align-content-lg-end">
                      <form action="resourceinfo.php"  method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                          <input type="text" class="form-control" name="name" value="" id="categoryname" aria-describedby="categoryname" placeholder="Enter Category Name">
                        </div>
                        <button type="submit" name="addcat" class="btn btn-success">Add Category</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
