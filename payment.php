<?php
ob_start();
session_start();
include_once('service.php');
include_once('dataAccess.php');
$email_client=$_SESSION['client_email'];
$idbook = $_SESSION['idd'];
if (!empty($email_client)) {
  # code...
  $idbook = $_SESSION['idd'];
  $bookInfo = service::getBooks($idbook);
  $nameBook;
  $priceBook;
  $descBook;
  $idBook;
  $imagePathBook;
  $filePathBookPathBook;
  $path="";
  
  while ($row = $bookInfo->fetch()) {
    # code...
    
    //$idbook = $row[0];
    $nameBook = $row[1];
    $priceBook = $row[5];
    $descBook = $row[2];
    $imagePathBook = $row[3];
    $filePathBook = $row[4];
  }
}else {
  header('location:login-register.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include_once('head.php');
  ?>
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
          <li><a href="logout.php">Log out</a></li>
          <li><span class="span" id="idd" style=" position: absolute;margin-left: 5px;font-size:16px; margin-top: -10px; color:  #ea604b; ">
        0
        </span><a href="panier.php"><i class="bx bx-shopping-bag" style="font-size:16px;"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Payment</h2>

          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Payment</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-7 entries">

            <article class="entry">

              <div class="entry-img">
                <img src="imageBooks/<?=$imagePathBook?> " alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <?= $nameBook ?>
              </h2>


              <div class="entry-content">
                <p>
                  <?= $descBook ?>
                </p>

              </div>

            </article><!-- End blog entry -->
          </div><!-- End blog entries list -->

          <div class="col-lg-4">
            <div class="sidebar sidebar1">

              <h3 class="sidebar-title">price <span>: <?= $priceBook ?></span> $</h3>
              <div class="sidebar-item search-form">
                <form action="payment.php" method="POST">
                  <input type="number" name="Cardnumber" class="form-control mr-sm-2" id="Cardnumber" placeholder="Card Number" required><br>
                  <input type="number" name="month" class="form-control mr-sm-2" id="month" placeholder="Month" required><br>
                  <div class="hdaba3tom">
                    <input type="number" name="Year" id="Year" placeholder="Year" class="form-control mr-sm-2" required> &nbsp &nbsp
                    <input type="number" class="form-control mr-sm-2" name="cvv" id="cvv" placeholder="cvv" required>
                  </div>
                  <br>
                  <input type="submit" name="submit" id="submit" class="form-control mr-sm-2 btn btn-primary" value="Validate">
                </form>
              </div>
            </div>
            <?php
            include_once 'PaymentClass.php';
            if (isset($_POST['submit'])) {
              # code...
              $creditCard=$_POST['Cardnumber'];
              $month=$_POST['month'];
              $Year=$_POST['Year'];
              $cvv=$_POST['cvv'];
              // test($creditCard,$month,$year,$cvv)
               $testCard = Payments::testCard($creditCard,$month,$Year,$cvv);
               $test=Payments::test($creditCard,$month,$Year,$cvv);
              //  echo  $testCard;
              print'<script>';
              print"console.log('$testCard')";
              print'</script>';
          
            if ($testCard>0 && $test==1) {
              # code...
              $path="<a href='bookFiles/$filePathBook'>Download your book </a>";
              service::deleteFromPanier($idbook,$email_client);
            } else {
              # code...
              print'<script>';
              print"alert('toto dakhael dak xi shih')";
              print'</script>';
            }
          }
            

            ?>
            <!-- End sidebar search formn-->
            <div class="sidebar sidebar2">
            <h3 class='sidebar-title'>
            <?=$path?>
            </h3>

            </div>
            <!-- End sidebar search formn-->
          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div><!-- End .row -->

      </div><!-- End .container -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <?php
    include_once('footer.php');
    ?>
  </footer><!-- End Footer -->
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
  <script src="assets/js/main.js"> </script>
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