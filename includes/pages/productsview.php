
        <div class="col-md-8">
          <div class="product-topbar d-flex align-items-center justify-content-between">
            <div class="row align-content-lg-end">
              <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Product Name</th>
                    <th>Price(#)</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $cnt=1;
                  $sql = "SELECT * FROM products";
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
                        <th>Description</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>