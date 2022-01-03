<?php
ob_start();
session_start();
$url =$_SESSION['urlOfPage'];
include_once ('dataAccess.php');
include_once ('service.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php

include_once ('head.php');
?>
  <style>
    span{
      cursor: pointer;
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
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="portfolio">
      <div class="container">
    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter=".filter-login" id="login" >log in</li>
            <li data-filter=".filter-signin" id="signin"  >sign in</li>
          </ul>
        </div>
      </div>
    </section><!-- End Blog Section -->


    <!-- ======= Blog Section ======= -->
    <div class="class-signin filter-signin">
      <h2 class=" regi"> Registration </h2>
      <input class="form-control mr-sm-2" type="text" name="name" id="name" placeholder=" Your name" autocomplete="off" ><br>
      <input class="form-control mr-sm-2" type="text" name="lastname" id="lastname" placeholder=" Last name"><br>
      <input class="form-control mr-sm-2" type="emailsignin" name="emailsignin" id="emailsignin" placeholder=" Email"><br>
      <input class="form-control mr-sm-2" type="password" name="passwordsignin" id="passwordsignin" placeholder="*************" autocomplete="off"><br>
      <input class="form-control mr-sm-2 btn btn-primary" type="submit" name="Registration" id="Register" style="width:100%;" value=" Register"><br> <br>
      
    </div>
    <!-- ======= Blog Section ======= -->
    <div class="class-signin filter-login">
      <h2>
          Welcome !
      </h2>
      <form action='login-register.php' method="post">
      <input class="form-control mr-sm-2" type="email" name="email" id="email" placeholder="Enter Your E-mail" required>
      <br>
      <input class="form-control mr-sm-2" type="password" name="password" id="password" placeholder="********" required>
      <br>
      <input type="submit" name="Login" class="form-control mr-sm-2 btn btn-primary" value=" Log in">
      <!-- <button class="form-control mr-sm-2 btn btn-primary"> Log in</button> -->
      <br><br>
      <p class="forgat-pass" id="lien-a"> <a href="mailto:yahiaazrout@gmail.com" style="text-decoration: none; color: #000;"> Forgot password ?</a><span id="lien"> Sign in </span></p>
      </form>
  </div>
</div>
</section>
</main>
   
<?php
// echo $url;
if (isset($_POST['Login'])) {
  # code...
$email= $_POST['email'];
$password= $_POST['password'];
$testLoginClient=service::loginClients($email,$password);
$testLoginAdmin=service::loginAdmins($email,$password);
if ($testLoginClient!=0) {
    # code... 
    $_SESSION['client_email']=$email;
    echo"
    <script>
    window.location='$url';
  </script>";
}
if ($testLoginAdmin!=0) {
    # code...
    $_SESSION['Admin_email']=$email;
    $_SESSION['Admin_email']=$email;
  //   echo"
  //   <script>
  //   alert('$email ---- $password ');
  // </script>";
    header('location:Admin.php');
}

}

ob_end_flush();
?>

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
    $(document).ready(function() {
    $("#portfolio-flters").on('click', '#login', function() {
      // alert('login');
     $('.filter-login').css('display', 'block');
     $('.filter-signin').css('display', 'none');
    });
    $("#portfolio-flters").on('click', '#signin', function() {
      // alert('signin');
     $('.filter-signin').css('display', 'block');
     $('.filter-login').css('display', 'none');
    });
    $("#lien-a").on('click', '#lien', function() {
      $('.filter-signin').css('display', 'block');
     $('.filter-login').css('display', 'none');
    });
  });
  </script>
  <script>
$(function() {
  $(".filter-signin").on('click', '#Register', function() {
    var name = $('#name').val();
    var lastname = $('#lastname').val();
    var emailsignin = $('#emailsignin').val();
    var passwordsignin = $('#passwordsignin').val();
    if (name!='' && lastname!='' && emailsignin!='' && passwordsignin!='') {
      
    //   console.log(name);
    //   console.log(lastname);
    //   console.log(emailsignin);
    //   console.log(passwordsignin);
        $('#name').val('');
        $('#lastname').val('');
        $('#emailsignin').val('');
        $('#passwordsignin').val('');
             
      $.ajax({
          url: 'registerResp.php',
          method:'POST',
          data:{
            name : name,
            lastname : lastname,
            emailsignin : emailsignin,
            passwordsignin : passwordsignin
          },
          success: function(data) {
                console.log(data);
             if (data!=1) {

            }
          }
        });
      }else{
              alert("g");

      }

    });
  
});
</script>

</body>

</html>