<?php
session_start();
$pagename="Dashboard";
include "includes/abstractions/users.php";
include "includes/pages/general/table.php";
?>

<main id="main">
  <!-- ======= Clients Section ======= -->

  <?php   
    include "includes/pages/home/userhomemain.php";
  ?>
</main>
  <!-- ======= Footer ======= -->
<?php 
    include "includes/pages/general/footer.php";
    include "includes/pages/general/tablescript.php";
?>