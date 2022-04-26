<?php
session_start();
if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
  header("Location: index.php");
  die();
}
$pagename="Add Answer";
include('includes/abstractions/admin.php');
include "includes/pages/general/table.php";
?>
<main id="main">
  <!-- ======= Clients Section ======= -->
<?php   
    include "includes/pages/responseadd.php";
?>
</main>
  <!-- ======= Footer ======= -->
<?php 
    include "includes/pages/general/footer.php";
    include "includes/pages/general/tablescript.php";
?>
