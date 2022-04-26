<?php
session_start();
$pagename="Home Page";
include "includes/pages/general/head.php";
include "includes/pages/general/header.php";
?>
<!-- //MainPage Begins -->
<?php include "includes/pages/home/hero.php"?>

<main id="main">
 <!-- ======= Clients Section ======= -->
  <?php 
  include "includes/pages/home/homemain.php"?>
 
</main>
 <!-- Modal -->


  <!-- ======= Footer ======= -->
<?php 
    include "includes/pages/general/footer.php";
?>
<script src="assets/js/login-register.js"></script>

<?php
  ob_end_flush();
?>