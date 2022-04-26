<?php 
if(isset($_GET['del'])){
	$query=mysqli_query($conn,"DELETE FROM queries WHERE query_id = '".$_GET['id']."'");
  if($query){
    $_SESSION['msg'] = "Query deleted successfully";
    echo "<script>swal('Success!', 'Query deleted successfully', 'success');</script>";
    "Location:../../userhome.php";
  }else{
    $_SESSION['msg'] = "Query failed to delete";
    echo "<script>swal('Failed!', 'Query failed to delete', 'danger');</script>";
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
                  <div class="col-sm-12">
                    <div class="col-sm-4"> <a href="addquery.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add a New Question</button></a></div>
                    <div class="col-sm-4"><a href="unansweredadmin.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Unanswered</button></a></div>
                    <div class="col-sm-4"> <a href="addresponse.php"><button type="button" class="admin-btn"  ><i class="fa fa-plus-circle fx-5"></i> &nbsp;Add New Answer</button></a></div>
                  </div>
                 <h3 class="text-center">Questions and Answers For the Chat Bot</h3>
                  <table id="example2" class="table table-striped table-hover responsive" style="width:100%">
                    <thead>
                      <tr>
                                                    <th>S/N</th>
                                                    <th>Question</th>
                                                    <th>Response</th>
                                                    <th>Link</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $cnt=1;
                                                $sql = "SELECT * FROM queries";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_array($result)){
                                                  $queryId=$row['query_id'];                                                
                                                  $responseId=$row['response_id'];                                                
                                                if ($row==null){
                                                echo '<tr>No query to display</tr>';		            
                                                }else{?>
                                                    <tr>                  
                                                        <?php echo '<td>'.$cnt.'</td>';?>
                                                        <td><?php echo $row['incoming_message']; ?></td>
                                                        
                                                         <?php 
                                                         if($responseId==0){
                                                           echo "<td class='text-danger'>No response added to the question</td>";
                                                           echo "<td class='text-danger'>No link</td>";
                                                          }else{
                                                            $ret="SELECT * FROM responses WHERE response_id = '$responseId'";
                                                            $result1=mysqli_query($conn,$ret);
                                                            while ($row1=mysqli_fetch_array($result1))
                                                            {
                                                              echo "<td>".$row1['response']."</td>";
                                                              echo "<td>".$row1['link']."</td>";
                                                            } 
                                                          }
                                                        ?>
                                                        <td>                                                        
                                                          <!-- <a href="editqueries.php?&id=<?php echo $queryId?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button></a> -->
                                                          <a href="queriesadmin.php?id=<?php echo  $queryId?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                                        </td>                                                    
                                                    </tr>
                                                    <?php  }
                                                $cnt++;
                                                } ?>  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>                  
                                                    <th>Questions</th>
                                                    <th>Response</th>
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
    