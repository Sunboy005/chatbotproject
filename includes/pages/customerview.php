
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
                  $sql = "SELECT * FROM customers";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                    if ($row==null){
                      echo '<tr>No customer to display</tr>';
                    }else{
                      $customerid=$row['customer_id'];
                      ?>
                      <tr>
                        <?php echo '<td>'.$cnt.'</td>';?>
                        <td><?= $row['firstName']." ".$row['lastName']; ?></td>
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