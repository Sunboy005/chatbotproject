<?php
session_start();
if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
  header("Location: index.php");
  die();
}
$pagename="Add Customer";
include "includes/abstractions/users.php";
?>
<!-- Page Custommed CSS -->

<main id="main">
  <!-- ======= Clients Section ======= -->

  <?php   
    include "includes/pages/customeradd.php";
  ?>
</main>


  <!-- ======= Footer ======= -->

<?php 
    include "includes/pages/general/footer.php";
?>
