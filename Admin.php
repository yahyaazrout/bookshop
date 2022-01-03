<?php
session_start();
ob_start();
include_once 'dataAccess.php';
include_once 'service.php';
include_once 'pagination.php';
$uri = $_SERVER['REQUEST_URI'];
$_SESSION['urlOfPage']=$uri;
//$rows =service::getAllBooksForUpdate();
// $_SESSION['Admin_email'];
if (!empty($_SESSION['Admin_email'])) {
  # code...
$i=0;
$active=1;
$rows = pagination::displaybooks($i);
if (isset($_GET['indice'])) {
    # code...
    $i=$_GET['indice'];
    $active=$i;
    if ($i>0) {
        # code... 
        $indiceOfPage=pagination::indicInTable($i);
        $rows = pagination::displaybooks($indiceOfPage);
    }
   
    
}
}else {
  # code...
  header('location:login-register.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
  include_once('head.php');
  ?>
  <style>
    .pagination-lg .page-link {
    padding: 0.75rem 1.5rem !important;
    font-size: 1.25rem !important;
    line-height: 1 !important;
}
.page-link {
    color: #1e4356 !important;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff !important;
    background-color: #1e4356 !important;
    border-color: #1e4356 !important;
}



  </style>
</head>

<body>
<header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Bookshop</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="logout.php">Log out</a></li></ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>
  <!-- <img src="" alt=""> -->

  <div style="float: right; margin-top: 100px; margin-bottom: 20px; margin-right: 20px;">
    <button type="button" class=" btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" id="AddBook"> Add Book </button>
  </div>
  <div class="cntaner-fluid">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Book Name</th>
          <th scope="col">Price</th>
          <th scope="col">desc</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
        
        if ($rows->rowCount()>0) {

        while ($row = $rows->fetch()) {
          # code...

echo"
<tr>
<form action='Admin.php' method='POST'>
<th scope='row'><input style='width: 50px;' class='form-control mr-sm-2' readonly type='text' name='id_book' id='id_book' value='$row[0]'></th>
<td><img src='imageBooks/$row[2]' width='40px' height='40px' ></td>
<td><input class='form-control mr-sm-2' type='text' name='namebook' id='namebook'  value='$row[1] '></td>
<td><input class='form-control mr-sm-2'  type='text' name='pricebook' id='pricebook' value='$row[3]'> </td>
<td style='width: 220px;'> 
<input class='form-control mr-sm-2' type='text' name='desxbook' id='desxbook' value='$row[4]'>
</td>
<td style='width: 200px;'>
<input  class='btn btn-outline-danger' type='submit' value='Remove' name='Remove'>
<input  class='btn btn-outline-success' type='submit' value='Update' name='Update'>
</td>
</form>
</tr>
";
}
        }
        
        ?>
     
      </tbody>
    </table>
  </div>

  <!-- ---------------------------- modale win add ------------------------- -->
  <div class="container">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new Book </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="Admin.php" method="POST" enctype="multipart/form-data">
              <input class="form-control mr-sm-2" type="text" name="nameBook" id="nameBook" placeholder="name Book" required><br>
              <input class="form-control mr-sm-2" type="text" name="desc" id="desc" placeholder="desc Book" required><br>
              <input class="form-control mr-sm-2" type="text" name="price" id="pricebook" placeholder="Price" required><br>
              <select class="form-control" name="categorie" id="categorie">
                <option value="1">programming</option>
                <option value="2">Religious</option>
                <option value="3">cooking</option>
              </select> <br>
              <label title="image path">image path * </label> <br>
              <input class="form-control mr-sm-2" type="file" name="Image" id="Image" placeholder="Image" required><br>
              <label title="image path">Book path * </label> <br>
              <input class="form-control mr-sm-2" type="file" name="book" id="book" placeholder="Book file" required>
              </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" name="Add" value="Add" >
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ---------- start PHP -------- -->
  <?php
  if (!empty($_POST['Add'])) {
    # code...
    $nameBook = $_POST['nameBook'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $categorie = $_POST['categorie'];
    $Image1 = $_FILES["Image"];
    $Image = $_FILES["Image"]["tmp_name"];
    $Imagename = $_FILES["Image"]['name'];
    $book = $_FILES["book"]["tmp_name"];
    $bookname = $_FILES["book"]['name'];
    // alert('$nameBook---$desc--$Image---$Imagename---$bookname----$book');
    // print($book);
    // addNewBook($name,$desc,$price,$categorie,$imagPath,$filePath)
    service::addNewBook($nameBook,$desc,$price,$categorie,$Imagename,$bookname);
    move_uploaded_file( $Image, "imageBooks/$Imagename");
    move_uploaded_file( $book, "bookFiles/$bookname");
    header('location:Admin.php');
  }



  if (!empty($_POST['Remove'])) {
    # code...
    $id_book=$_POST['id_book'];
    service::deleteBook($id_book);
    header('location:Admin.php');
  }
  if (!empty($_POST['Update'])) {
    # code...
    $id_book=$_POST['id_book'];
    $namebook=$_POST['namebook'];
    $pricebook=$_POST['pricebook'];
    $desxbook=$_POST['desxbook'];
    service::updateBook($namebook,$pricebook,$desxbook,$id_book);
    header('location:Admin.php');
  }
  ?>
  <!-- ---------- end PHP -------- -->
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<section>
        <div aria-label="...">
            <ul class="pagination justify-content-center pagination-lg">
                <!-- <li class="page-item active">
                    <a class="page-link" href="#" tabindex="-1">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                <?php 
$count=pagination::countOfNumberbooks();
while ($a = $count->fetch()) {
    # code...
    $countNum=$a[0];
    $nbrPage=pagination::indecOfPage($countNum);
if ($nbrPage>0) {
    # code...

    for ($i=1; $i <=$nbrPage ; $i++) { 
        if($active==$i){
            
            
        echo"
        
        <li class=\"page-item active \"><a class=\"page-link \" href=\"admin.php?indice=$i\">$i</a></li>
        
        ";     
            
        }else{
            
            
        echo"
        
        <li class=\"page-item  \"><a class=\"page-link \" href=\"admin.php?indice=$i\">$i</a></li>
        
        ";     
            
        }
    
       
    }
}
}




?>


            </ul>
        </div>
    </section>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
  <?php

  ob_end_flush();
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>