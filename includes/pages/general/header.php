<?php 
include "includes/pages/general/modals.php";
include "includes/processing/userinfoindex.php";
?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php">MSME</a><span class="logo-span">by Josey</span></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>                       
        <?php if(!isset($_SESSION['user'])){?><li><a class="nav-link" href="index.php">HOME</a></li>            
                <?php }?>
       
          <?php if(isset($_SESSION['user'])){
            if($mydesignation=="Admin"){?>
              <li class="dropdown"><a class="nav-link" href="#"><span>ADMIN ACTIONS</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                      <li><a class="nav-link" href="resourcesadmin.php">MANAGE RESOURCES</a></li>
                      <li><a class="nav-link" href="templatesadmin.php">MANAGE TEMPLATES</a></li>
                      <li><a class="nav-link" href="queriesadmin.php">MANAGE QUESTIONS</a></li>
                  </ul>
              </li>  
            <?php }else{?> 
              <li><a class="nav-link" href="userhome.php">DASHBOARD</a></li><?php }?>
            <?php }?>
                <li class="dropdown"><a class="nav-link" href="#"><span>RESOURCES</span> <i class="bi bi-chevron-down"></i></a>                                                     <ul>
                        <?php 
                        $query ="SELECT * FROM `type`";
                        $stmt2 = $conn->prepare($query);
                        $stmt2->execute();
                        $res=$stmt2->get_result();
                        while($rowd=$res->fetch_object())
                        {
                        ?>
                    <li><a class="nav-link" href="category.php?slug=<?php echo $rowd->slug;?>&id=<?php echo $rowd->id;?>"><?php echo strtoupper($rowd->name);?></a></li>
                    <?php } ?>
                    </ul>
                </li> 
            <li class="dropdown"><a class="nav-link" href="#"><span>TOOLS</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a class="nav-link" href="taxcalculator.php">TAX CALCULATOR</a></li>
                    <li><a class="nav-link" href="templates.php">TEMPLATES</a></li>
                </ul>
            </li>  
            <li><a class="nav-link" href="viewproducts.php">PRODUCTS</a></li>
            <li><a class="nav-link" href="viewcustomers.php">CUSTOMERS</a></li>
            <li><a class="nav-link" href="about.php">ABOUT US</a></li>
            <li><a class="nav-link" href="researches.php">RESEARCHES</a></li>       
         <?php 
          if(isset($_SESSION['user'])){?>               
            <li><a  href="includes/pages/general/logout.php"  class="getstarted btn-danger" >LOGOUT</a></li>
            <?php }else{ ?>
                <li><button class="getstarted" style="background:#37517e;"  data-toggle="modal" data-target="#loginModal">LOGIN</button></li>
            <?php }
            ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
