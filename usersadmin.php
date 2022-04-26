<?php
session_start();
$pagename="Admin :Template Management";
include "includes/abstractions/admin.php";
include "includes/pages/general/table.php";
?>
<body>
  <main id="main">
    <!-- ======= Clients Section ======= -->

    <?php   
      include "includes/pages/usermain.php";
    ?>
  </main>
</body>
<!-- ======= Footer ======= -->
<?php 
    include "includes/pages/general/footer.php";
    include "includes/pages/general/tablescript.php";
?>