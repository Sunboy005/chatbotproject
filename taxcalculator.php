<?php 
ob_start();
session_start();
$pagename="Tax Calculator";
include "includes/connections/connect.php";
include "includes/pages/general/head.php";
include('includes/processing/checklogin.php');
include "includes/pages/general/header.php";

?>
<?php include "includes/pages/general/notifier.php";?>
        <div class="container" style="padding-top:80px">       
                <div class="row">
                <div class="col-sm-12 ">
                    <h1 class="font-weight-400 mb-0 text-capitalize">
                        Calculate  Tax
                    </h1>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    <iframe src="https://apps.firs.gov.ng/taxcalculator/" width="100%" height="800px" style="border:none;" title="Calculate your Personal Tax"></iframe>
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
