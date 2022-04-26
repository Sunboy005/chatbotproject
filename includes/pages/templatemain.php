<?php 
if(isset($_GET['del'])){
	$query=mysqli_query($conn,"DELETE FROM templates WHERE template_id = '".$_GET['id']."'");
  if($query){
    $_SESSION['msg'] = "Resource deleted successfully";
    echo "<script>swal('Success!', 'Resource deleted successfully', 'success');</script>";
    "Location:../../userhome.php";
  }else{
    $_SESSION['msg'] = "Resource failed to delete";
    echo "<script>swal('Failed!', 'Resource failed to delete', 'danger');</script>";
    "Location:../../userhome.php";
  } 		
}
?>
<link rel="stylesheet" href="assets/css/admin.css">
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
            <div class="col-12">
              <div class="product-topbar d-flex align-items-center justify-content-between">
                <div class="row align-content-lg-end">
                <a href="addtemplate.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add a Template</button></a>
                        <h3 class="text-center">List of available Businesses Templates</h3>
                  <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cnt=1;
                      $sql = "SELECT * FROM templates";
                      $result = mysqli_query($conn, $sql);
                      $count=mysqli_num_rows($result);
                      while($row = mysqli_fetch_array($result)){
                       
                        $template_id=$row['template_id'];
                         if ($count<1){
                          echo '<tr>No template to display</tr>';
                        }else{ ?>
                         
                          <tr>
                            <?php echo '<td>'.$cnt.'</td>';?>
                            <td><b><?= $row['title']; ?></b></td>
                            <td><?= $row['dlink']; ?></td>
                            <td>

                            <!-- <a href="edittemplates.php?&id=<?php echo $id?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button></a> -->

                            <a href="templatesadmin.php?id=<?php echo  $template_id?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                          </td>
                        </tr>
                      <?php  }
                      $cnt++;
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>Title</th>
                      <th>Link</th>
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
</section>
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
