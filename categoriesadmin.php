<?php
session_start();
if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
    header("Location: index.php");
    die();
}
$pagename="Admin: Manage Category";
include "includes/abstractions/admin.php";
include "includes/pages/general/table.php";
?>
<main id="main">
  <!-- ======= Clients Section ======= -->
<?php    
   if(isset($_GET['add'])){
        include "includes/pages/categoryadd.php";
    }else if(isset($_GET['ed'])){
        include "includes/pages/categoryedit.php";
    }else{
    include "includes/pages/categorymain.php";
    }
?>

</main>
<!-- ======= Footer ======= -->
<?php 
    include "includes/pages/general/footer.php";
    include "includes/pages/general/tablescript.php";
?>