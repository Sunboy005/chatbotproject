<?php
session_start();
$pagename="Admin :Resources Management";
include "includes/abstractions/admin.php";
include "includes/pages/general/table.php";
?>

<main id="main">
  <!-- ======= Clients Section ======= -->

  <?php   
    include "includes/pages/resourcesmain.php";
  ?>
</main>


  <!-- ======= Footer ======= -->

<?php 
    include "includes/pages/general/footer.php";
    include "includes/pages/general/tablescript.php";
?>
