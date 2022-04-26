<?php 
if(isset($_GET['del'])){
	$query=mysqli_query($conn,"DELETE FROM products WHERE product_id = '".$_GET['id']."'");
  if($query){
    $_SESSION['msg'] = "Product deleted successfully";
    echo "<script>alert('Product deleted successfully');</script>";
    "Location:../../userhome.php";
  }else{
    $_SESSION['msg'] = "Product failed to delete";
    echo "<script>alert('Product failed to delete');</script>";
    "Location:../../userhome.php";
  } 		
}
if(isset($_GET['delcustomer'])){
	$query=mysqli_query($conn,"DELETE FROM customers WHERE customer_id = '".$_GET['id']."'");
  if($query){
    $_SESSION['msg'] = "customer deleted successfully";
    echo "<script>alert('Customer deleted successfully');</script>";
    "Location:../../userhome.php";
  }else{
    $_SESSION['msg'] = "customer failed to delete";
    echo "<script>alert('customer failed to delete');</script>";
    "Location:../../userhome.php";
  } 		
}
?>
<link rel="stylesheet" href="assets/css/admin.css">
<section class="shop_grid_area" style="padding-top:120px">
  <div class="container">
    <div class="shop_grid_product_area">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-sm-12">
              <?php if ($mydesignation == "Admin"){
                $myusertype="an Admin of the site";
              }else{
                $myusertype="a MSME Business Owner";
              }          
              ?>           
              <h2>Welcome <?php echo $myfname;?> you are <?php echo $myusertype;?>.</h2>
            </div>
          </div>
          <div class="product-topbar d-flex align-items-center justify-content-between">
            <div class="row align-content-lg-end">
              <a href="addproduct.php" class="admin-btn" ><i class="fa fa-plus-circle fx-5"></i> &nbsp; Add  Products</a>
              <a href="addcustomer.php" class="admin-btn" ><i class="fa fa-plus-circle fx-5"></i> &nbsp; Add Customer</a>
            
            <div class="row text-center h2 text-md-center">My Products</div>
              <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                <thead>
                  <tr>
                      <th>S/N</th>
                      <th>Product Name</th>
                      <th>Price(#)</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $cnt=1;
                  $sql = "SELECT * FROM products WHERE user_id='$myid'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                    if ($row==null){
                      echo '<tr>No product to display</tr>';
                    }else{
                      $productid=$row['product_id'];
                      ?>
                      <tr>
                        <?php echo '<td>'.$cnt.'</td>';?>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td>
                          <a href="editproduct.php?id=<?php echo $productid;?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>

                            <a href="userhome.php?id=<?php echo $productid?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a> 
                          </td>

                        </tr>
                      <?php  }
                      $cnt++;
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>Product Name</th>
                      <th>Price(#)</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
                <br/>

              <div class="text-center text-md-center h2">My Customers</div>
              <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $cnt=1;
                  $sql = "SELECT * FROM customers WHERE user_id='$myid'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                    if ($row==null){
                      echo '<tr>No customer to display</tr>';
                    }else{
                      $customerid=$row['customer_id'];
                      ?>
                      <tr>
                        <?php echo '<td>'.$cnt.'</td>';?>
                        <td><?= $row['first_name']." ".$row['last_name']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td>
                            <a href="userhome.php?id=<?php echo $customerid?>&delcustomer=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a> 
                        </td>
                      </tr>
                      <?php  }
                      $cnt++;
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>Customer Name</th>
                      <th>Phone</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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
