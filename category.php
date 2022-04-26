<?php 
include "includes/connections/connect.php";
if(isset($_GET['id'])){
    $typeId=$_GET['id'];
    $query="SELECT * FROM type WHERE id='$typeId'";
    $runQuery=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($runQuery);
    $typename=$result['name'];
    $pagename=$typename;
    $typeslug=$result['slug'];
    $pagen='type?slug='.$typeslug.'&id='.$typeId;
    }
include "includes/pages/general/head.php";
include "includes/pages/general/header.php";
?>
<div class="container" style="padding-top:100px">
    <div class="col-sm-12">         
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                <div class="col-sm-12 ">
                    <h1 class="font-weight-800 mb-2 breadcrumb text-center text-lg-center pt-lg-3">
                        <?php echo strtoupper($pagename)?> Resources
                    </h1>
                </div>
            </div>
                <?php include "includes/pages/categories.php";?>
            </div>
            <div class="col-lg-4">
                <?php include "includes/pages/general/resources_sidepost.php";?>
            </div>
        </div>
    </div>
</div>
<hr>
 
   <!-- ======= Footer ======= -->
 
 <?php 
     include "includes/pages/general/footer.php";
 ?>
