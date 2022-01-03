<?php
ob_start();
session_start();
 include_once ('service.php');
 include_once ('dataAccess.php');
    $email_client=$_SESSION['client_email'];
    //$client_email='yahya@123';
    $total=0;
    $panierData;
    $count =0;
    $row;
 if (!empty($email_client)) {
   # code...
    // $email_client=$_POST['client_email'];
   if (!empty($email_client)) {
    # code...
    $rows=service::getTotalBookFromPanierByEmailClient($email_client);
    
    $panierData=service::AllBookFromPanierByEmailClient($email_client);
    $count=$panierData->rowCount();
  while ($row=$rows->fetch()) {
    # code...
    $total=$row[0];
  } 
}
 }else{
  header('location:login-register.php');
 }
 
 
    
    // $rows=service::getTotalBookFromPanierByEmailClient($client_email);
    // $panierData=service::AllBookFromPanierByEmailClient($client_email);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once ('head.php');
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
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="shop.php">shop</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="login-register.php">Log in</a></li>
          <li><span class="span" id="id" style=" position: absolute;margin-left: 5px;font-size:12px; margin-top: -1px; color:  #ea604b; ">
        <?=$count?>
        </span><a href="panier.php"><i class="bx bx-shopping-bag" style="font-size:16px;"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>
  <!-- ======= Header ======= -->
<main id="main">
    <div style="display: flex; float: right; margin-top: 10px; margin-right: 100px;"  class="alert alert-primary" >

        <div class="total">
            <span> Total: &nbsp</span>
            <span width="50px" name="Total" id="Total"><?=$total?></span>
            <span> &nbsp $</span>
        </div>
        </div>
        <section class="container">
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Book Name</th>
                    <th scope="col" >Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
        
      <!-- <tr>
          <form action="basket.php" class=" form-group" method="POST">
              <td scope="row"> <input class=" form-group" style=" width: 40px;" readonly type="text" name="id_book" id="" value="21"></td>
              <td><img src="../../back-end/imageBooks/RecipesforHealthyLiving.jpg" width="40px" height="40px" alt="" srcset=""></td>
              <td>Recipes for Healthy Living</td>
              <td> <input class=" form-group" style=" width: 40px;" readonly type="text" name="price_book" id="" value="70"></td>
              <td style=" width: 230px;">
              <input type="submit" class=" btn btn-outline-danger" name="Remove" value="Remove">
              <input type="submit" class=" btn btn-outline-success"  name="Buynow" value="Buy now">
              </td>
            </form>
            </tr>
          <tr> -->

 
  <?php
  if (!empty($panierData)) {
    # code...
 

while ($row =$panierData->fetch()) {
  # code...
  echo '
  <tr>
  <form action="" class=" form-group" method="POST">
      <td scope="row" > <input class=" form-group" style=" width: 40px;" readonly type="text" name="id_book" id="" value="'.$row[0].'"></td>
      <td><img src="imageBooks/'.$row[1].'" width="40px" height="40px" alt="" srcset=""></td>
      <td>'.$row[2].'</td>
      <td> <input class=" form-group" style=" width: 40px;" readonly type="text" name="price_book" id="" value="'.$row[3].'"></td>
      <td style=" width: 250px;">
      <input type="submit" class=" btn btn-outline-danger" name="Remove" value="Remove">
      <input type="submit" class=" btn btn-outline-success"  name="Buynow" value="Buy now">
      </td>
    </form>
    </tr>
  ';
}

if (isset($_POST['Remove'])) {
  # code...
  $id_book=$_POST['id_book'];
  // $email_client=$_SESSION['client_email'];
    # code...

     service::deleteFromPanier($id_book,$email_client);
     header('location:panier.php');

  }


if (isset($_POST['Buynow'])) {
  # code...
  $id_book=$_POST['id_book'];
  $price_book=$_POST['price_book'];
  if (!empty($email_client)) {
    # code...
     $_SESSION['idd']=$id_book;
     header('location:payment.php');
  }else {
    # code...
    header('location:login-register.php');
  }
}
}
ob_end_flush();
?>
          
            </tbody>
            </table>
</main>
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

</body>

</html>