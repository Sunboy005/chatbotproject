<?php
session_start();

$pagename="Home Page";
include "includes/pages/general/head.php";
include "includes/processing/loginregister.php";
include "includes/pages/general/header.php";
?>
<!-- //MainPage Begins -->

<main id="main">
 <!-- ======= Clients Section ======= -->
  <?php include "includes/pages/aboutmain.php"?>
 
</main>
 <!-- Modal -->


  <!-- ======= Footer ======= -->

<?php 
    include "includes/pages/general/footer.php";
?>