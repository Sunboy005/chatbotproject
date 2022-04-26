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
                                      <a href="categoriesadmin.php/?add=0" class="admin-btn" ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add New Category</a>
                                      <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>S/N</th>
                                                  <th>Category</th>
                                                  <th>Slug</th>
                                                  <th>Description</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                  $cnt=1;
                                              $sql = "SELECT * FROM category";
                                              $result = mysqli_query($conn, $sql);
                                              while($row = mysqli_fetch_array($result)){

                                              if ($row==null){
                                              echo '<tr>No query to display</tr>';
                                              }else{
                                                  $categoryid=$row['category_id'];
                                                  ?>
                                                  <tr>
                                                      <?php echo '<td>'.$cnt.'</td>';?>
                                                      <td><?= $row['name']; ?></td>
                                                      <td><?= $row['slug']; ?></td>
                                                      <td><?= $row['description']; ?></td>
                                                      <td>
                                                        <a href="categoriesadmin.php?id=<?php echo $categoryid;?>&ed=edit" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>

                                                        <!-- <a href="queriesadmin.php?id=<?php  $id?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a> -->
                                                      </td>

                                                  </tr>
                                                  <?php  }
                                              $cnt++;
                                              } ?>
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <th>S/N</th>
                                                  <th>Category</th>
                                                  <th>Slug</th>
                                                  <th>Description</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </tfoot>
                                      </table>
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
