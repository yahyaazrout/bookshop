<?php
ob_start();
session_start();
 include_once ('service.php');
 include_once ('dataAccess.php');
 $idbook = $_GET['value'];
 
 $id;
 $bookInfo = service::getBooks($idbook);


?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once ('head.php');
?>

  <style>
    .class-whith {
      /* flex: 1 !important; */
      /* max-width: 33.333333%; */
      width: 50% !important;
    }
    .image-kola{
      -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 100% !important;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Bookshop</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="shop.php">shop</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="login-register.php" id="loginLien">Log in </a></li>
          <li><span class="span" id="idd" style=" position: absolute;margin-left: 5px;font-size:16px; margin-top: -10px; color:  #ea604b; ">
        0
        </span><a href="panier.php"><i class="bx bx-shopping-bag" style="font-size:16px;"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>shop Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">shop</a></li>
            <li>shop Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">
      <?php
     while ($row = $bookInfo->fetch()) {
      echo "
      <div class='portfolio-details-container row'>
          <div class='col-lg-6 col-md-6 class-whith'>
            <div class='portfolio-item'>
              <img src='imageBooks/$row[3]' class='img-fluid image-kola'>
            </div>
          </div>

          <div class='portfolio-info'>
            <h3>Book info</h3>
            <ul>
              <li><strong>Price :  $row[5] $</strong></li>
              <li><strong>Book Name</strong>:  $row[1]</li>
              <li><a href='#' class='mr-sm-2 btn btn-primary' id='buynow'>buy now</a></li>
            </ul>
          </div>

        </div>

        <div class='portfolio-description'>
          <h2>book description</h2>
          <p>
          $row[2]
           </p>
        </div>";
        $id=  $row[0];
      }
      $_SESSION['idd']=$id;
      ?>
          
    </section><!-- End Portfolio Details Section -->
    <!-- // <li><a href='payment.php?id=$row[0]' class='mr-sm-2 btn btn-primary' id='buynow'>buy now</a></li> -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <?php
    include_once ('footer.php');
    ob_end_flush();
    ?>
  </footer>
  <!-- End Footer -->

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
  <?php
  $uri = $_SERVER['REQUEST_URI'];
  // echo $uri; 
  // echo "
  // <script>
  // console.log('$uri');
  // </script>
  // ";
  ?>
<script>
$(function() {
  $(".portfolio-details").on('click', '#buynow', function() {
       var value ="<?=$uri?>";
      // var value = window.location.href;
      console.log(value);
             
      $.ajax({
          url: 'testLogin.php',
          method:'POST',
          data:{
            url : value
          },
          success: function(data) {
                console.log(data);
            if (data == 0) {
              // $(document).ready(function() {
                window.location='login-register.php';
              // });
            } else{
                window.location='payment.php';

            }
          }
        });
    });



    $(".nav-menu").on('click', '#loginLien', function() {
       var vl ="<?=$uri?>";
      // var value = window.location.href;
      console.log(value);
             
      $.ajax({
          url: 'returncount.php',
          method:'POST',
          data:{
            urllien : vl
          }
        });
    });
    $(".mobile-nav").on('click', '#loginLien', function() {
       var vl ="<?=$uri?>";      
      $.ajax({
          url: 'returncount.php',
          method:'POST',
          data:{
            url: vl
          }
        });
    });
  
});
</script>
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
  </script>
</body>

</html>