<?php
ob_start();
// include_once '../../back-end/service.php';
include_once 'service.php';
$uri = $_SERVER['REQUEST_URI'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include_once('head.php');
  ?>
  <style>
    .addPanier {
      background-color: transparent !important;
      border: none !important;
      color: rgb(255 255 255 / 50%);
      font-size: 28px;
    }

    .addPanier:hover {
      color: #ffffff;

    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span id="tt">Bookshop</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <div class='toto'>
      
      <nav class="nav-menu float-right d-none d-lg-block" id="nav-menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="shop.php">shop</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="login-register.php" id="loginLien">Log in</a></li>
          <li><span class="span" id="idd" style=" position: absolute;margin-left: 5px;font-size:16px; margin-top: -10px; color:  #ea604b; ">
        0
        </span><a href="panier.php"><i class="bx bx-shopping-bag" style="font-size:16px;"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our shop</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Our shop</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->
    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Programming">Programming</li>
              <li data-filter=".filter-Religious">Religious</li>
              <li data-filter=".filter-cookbooks">cookbooks </li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
          <!-- /*********************************** */ -->
          <?php
          // include_once '../../back-end/service.php';
          include_once 'service.php';
          $rows = service::get_All_books();
          while ($row = $rows->fetch()) {
            if ($row[6] == 1) {
              echo "

<!-- start Details -->
<div class='col-lg-4 col-md-6 filter-Programming'>
  <div class='portfolio-item'>
    <img src='imageBooks/$row[3]'  class='img-fluid'>
    <div class='portfolio-info'>
      <h3><a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'>$row[1]</a></h3>
      <div>
  <a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'><i class='bx bx-plus'></i></a>
        <a href='shop-details.php?value=$row[0]' title='shop Details'><i class='bx bx-link'></i></a>   
        <button  value='$row[0]'  id=\"addPanier\" class=\"addPanier\" title=\"add to card\"> <i class=\"bx bx-shopping-bag\"></i> </button>
      </div>
    </div>
  </div>
</div>
<!-- end Details -->
  ";
            }
            if ($row[6] == 2) {
              echo "
<!-- start Details -->
<div class='col-lg-4 col-md-6 filter-Religious'>
<div class='portfolio-item'>
  <img src='imageBooks/$row[3]'   class='img-fluid'>
  <div class='portfolio-info'>
    <h3><a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'>$row[1]</a></h3>
    <div>
      <a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'><i class='bx bx-plus'></i></a>
      <a href='shop-details.php?value=$row[0]' title='shop Details'><i class='bx bx-link'></i></a>
      <!-- <a href='#' id='addPanier' title='add to card'>
        <i class='bx bx-shopping-bag'></i></a> -->
        <button  value='$row[0]' id=\"addPanier\" class=\"addPanier\" title=\"add to card\"> <i class=\"bx bx-shopping-bag\"></i> </button>
    </div>
  </div>
</div>
</div>
<!-- end Details -->
";
            }
            if ($row[6] == 3) {
              echo "
<!-- start Details -->
<div class='col-lg-4 col-md-6 filter-cookbooks'>
<div class='portfolio-item'>
  <img src='imageBooks/$row[3]' class='img-fluid'>
  <div class='portfolio-info'>
    <h3><a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'>$row[1]</a></h3>
    <div>
      <a href='imageBooks/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'><i class='bx bx-plus'></i></a>
      <a href='shop-details.php?value=$row[0]' title='shop Details'><i class='bx bx-link'></i></a>
      <!-- <a href='#' id='addPanier' title='add to card'>
        <i class='bx bx-shopping-bag'></i></a> -->
        <button  value='$row[0]' id=\"addPanier\" class=\"addPanier\" title=\"add to card\"> <i class=\"bx bx-shopping-bag\"></i> </button>
    </div>
  </div>
</div>
</div>
<!-- end Details -->
";
            }
          }
          ?>
          <!-- /************************************/ -->
          <!-- start Details -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
  <!-- <button value=""></button> -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <?php
    include_once('footer.php');
    ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    fRt();

function fRt() {
  $(document).ready(function() {
    $.ajax({
      url: 'returncount.php',
      success: function(mydata) {
        $('#idd').html('');
        $('.span').html(mydata);
        // mydata=$('#idd').html;
        console.log(mydata);
      }
    });
  });
}
  ////////////////////////////////////
    $(".filter-Programming").on('click', '#addPanier', function() {

      var value = $(this).val();
      var url ="<?php echo $uri ?>";
      console.log(value);
      $.ajax({
          url: 'returncount.php',
          method: 'POST',
          data: {
            value: value,
            url: url
          },
          success: function(data) {
            if (data == 0) {
            // $(location).href('login-register.php');
            // $(location).attr('href', 'location:login-register.php');
              $(document).ready(function() {
                window.location = 'login-register.php';
              });
            } else {
              $('#idd').html(data);

            }
          }
        });
    });
    $(".filter-cookbooks").on('click', '#addPanier', function() {
      var value = $(this).val();
      var url ="<?php echo $uri ?>";
      console.log(value);
      $.ajax({
          url: 'returncount.php',
          method: 'POST',
          data: {
            value: value,
            url: url
          },
          success: function(data) {
            if (data == 0) {
            // $(location).href('login-register.php');
            // $(location).attr('href', 'location:login-register.php');
              $(document).ready(function() {
                window.location = 'login-register.php';
              });
            } else {
              $('#idd').html(data);

            }
          }
        });
    });




    $(".toto").on('click', '#loginLien', function() {
       var vl ="<?=$uri?>";
      //// var value = window.location.href;
      //console.log(vl);
      ////window.location = 'login-register.php';       
       $.ajax({
          url: 'returncount.php',
          method:'POST',
          data:{
            url: vl
          }
        });
    });
    
    $(".mobile-nav").on('click', '#loginLien', function() {
       var vl ="<?=$uri?>";
      // var value = window.location.href;
      //console.log(vl);
      //window.location = 'login-register.php';       
      $.ajax({
          url: 'returncount.php',
          method:'POST',
          data:{
            url: vl
          }
        });
    });


    $(".filter-Religious").on('click', '#addPanier', function() {
      var value = $(this).val();
      var url ="<?php echo $uri ?>";
      console.log(value);
      $.ajax({
          url: 'returncount.php',
          method: 'POST',
          data: {
            value: value,
            url: url
          },
          success: function(data) {
            if (data == 0) {
              $(document).ready(function() {
                window.location = 'login-register.php';
              });
            } else {
              $('#idd').html(data);

            }
          }
        });
    });

  
  </script>
<?php

ob_end_flush();
?>
</body>

</html>