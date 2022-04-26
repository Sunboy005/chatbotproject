<?php 
ob_start();
session_start();
$pagename="Template for businesses";
include "includes/connections/connect.php";
include "includes/pages/general/head.php";
include "includes/pages/general/header.php";
?>
        <div class="container" style="padding-top:80px">     
                <div class="row">
                <div class="col-sm-12 ">
                    <h1 class="font-weight-400 mb-0 text-capitalize">
                        Templates for Business Development
                    </h1>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    <?php include "includes/pages/template.php";?>
                    </div>
                    <div class="col-lg-4">
                        <?php include "includes/pages/general/resources_sidepost.php";?>
                    </div>
                </div>
        </div>
        <hr>

   <!-- ======= Footer ======= -->
 
 <?php 
     include "includes/pages/general/footer.php";
     
 ?>
