<?php
include "includes/processing/counters.php";
?>
<!-- ======= Featured Services Section ======= -->
<section id="featured-services" class="featured-services pt-lg-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="fa fa-users"></i></div>
          <h4 class="title"><a href="">Startup Essentials</a></h4>
          <p class="description">We provide Knowledge, support programs and mentorship.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-laptop"></i></div>
          <h4 class="title"><a href="">Access to Resources</a></h4>
          <p class="description">We give access our registered user to access our materials
            available on this site.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="fa fa-money"></i></div>
            <h4 class="title"><a href="">Guidiance for start-ups</a></h4>
            <p class="description">With a lot of research we have researched on how to secure
              a loan to boost your start-up</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calculator"></i></div>
              <h4 class="title"><a href="">Business tools</a></h4>
              <p class="description">Convert, target  and make projection into a profitable business</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Services Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/msme-growth.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Who We Are</h3>
            <p class="fst-italic">
              We are a group of young entrepreneurs who are passionate about
              entrepreneurship and want to help people in the community. We grow a micro to major
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> We provide Knowledge, support programs and mentorship.</li>
              <li><i class="bi bi-check-circle"></i> We give access our registered user to access our materials
                available on this site.</li>
                <li><i class="bi bi-check-circle"></i> We have researched on how to secure a loan to boost your start-up</li>
              </ul>
              <p>
                We also provide you with a lot of resources to help you in your business journey. And also to keep you updated with the latest news and events. Our website is updated daily.
                Our business owners are guided and recieve support from our team. We move every step with you. Join our team and help us to grow your business.
              </p>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container">
          <div class="row">
            <div class="four col-md-4">
              <div class="counter-box colored"> <i class="fa fa-database"></i> <span class="counter"><?php echo $resources_count ?></span>
                <p>Resources</p>
              </div>
            </div>
            <div class="four col-md-4 set-mg">
              <div class="counter-box colored"> <i class="fa fa-group"></i> <span class="counter"><?php echo  $users_count  ?></span>
                <p>Registered Members</p>
              </div>
            </div>
            <div class="four col-md-4 set-mg">
              <div class="counter-box colored"> <i class="fa fa-industry"></i> <span class="counter">59</span>
                <p>Startup Supported</p>
              </div>
            </div>
          </div>

          <script>
          $(document).ready(function() {
            $('.counter').each(function () {
              $(this).prop('Counter',0).animate({
                Counter: $(this).text()
              }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                  $(this).text(Math.ceil(now));
                }
              });
            });
          });
          </script>

        </div>
      </section><!-- End Counts Section -->
