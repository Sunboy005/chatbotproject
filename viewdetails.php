<?php 
ob_start();
	session_start();
	include "includes/connections/connect.php";
  
	if(isset($_GET['id'])){	
		$id = intval($_GET['id']);
		$dn = mysqli_query($conn,'SELECT * FROM resources WHERE resource_id="'.$id.'"');
		$row = mysqli_fetch_array($dn);
		$preimage=$row["image"];
        $title=$row["title"];
        $id=$row["resource_id"];
        $summary=$row["summary"];
        $details=$row["details"];
        $typeId=$row["type_id"];
        $datecreated=$row["date_created"];
        if($preimage!=''){
            $image='<img src="assets/img/resources/'.$preimage.'" height="300px" width="600px">';
          }else{
            $image='<img src="assets/img/template.png" height="300px" width="600px">';
          }
          $dns = mysqli_query($conn,'SELECT * FROM `type` WHERE id="'.$typeId.'"');
          $roww = mysqli_fetch_array($dns);
          $type=$roww["name"];
          
        }
      $pagename="Resource: ".$title;
      include "includes/pages/general/head.php";
      include "includes/pages/general/header.php";
      ?>
      <div class="container" style="padding-top:110px">
        <div class="row"> 
            <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                  <h2 class="box-title text-center"><?php echo $title;?></h2>
                  <h3 class="text-center" style="background:grey;color:white;">Posted under <?php echo $type;?> on  <?php echo $datecreated;?> </h3>
                </div>
                <div class="box-body">
                  <?php echo $image;?>    
                  <div class="single_page">
                    <?php  $row = mysqli_fetch_array($dn); 
                      echo ' <p>'.$details.'</p>';
                    ?>
                    </hr>
                  </div>
                </div>
                  <!-- /.box-body -->
              </div>     
            </div>
            <div class="col-md-4">
                <?php include "includes/pages/general/resources_sidepost.php";?>
            </div>
          </div>
    </div>
</body>
   <!-- ======= Footer ======= -->
 
 <?php 
     include "includes/pages/general/footer.php";
     include "includes/pages/general/tablescript.php";
 ?>
<!-- Page Custom JS Script -->
