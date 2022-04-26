<?php 
ob_start();
session_start();
$pagename="Products";
include "includes/connections/connect.php";
include "includes/pages/general/head.php";
include "includes/pages/general/table.php";
include "includes/pages/general/header.php";
?>
<body>
    <div class="container" style="padding-top:120px">
        <div class="col-sm-12">         
            <div class="row">
                <div class="col-sm-8">
                    <?php include "includes/pages/productsview.php";?>
                </div>
                <div class="col-sm-4">
                    <?php include "includes/pages/general/resources_sidepost.php";?>
                </div>
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
