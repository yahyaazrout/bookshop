<?php
// include_once '../../back-end/service.php';
include_once 'service.php';
$rows = service::get_All_books();
while ($row = $rows->fetch()) {
  # code...
  echo "

<!-- start Details -->
<div class='col-lg-4 col-md-6 filter-Programming'>
  <div class='portfolio-item'>
    <img src='assets/img/portfolio/portfolio-1.jpg' class='img-fluid'>
    <div class='portfolio-info'>
      <h3><a href='assets/img/portfolio/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'>$row[1]</a></h3>
      <div>
        <a href='assets/img/portfolio/$row[3]' data-gall='portfolioGallery' class='venobox' title='$row[1]'><i class='bx bx-plus'></i></a>
        <a href='shop-details.php' title='shop Details'><i class='bx bx-link'></i></a>
        <a href='#' id='addPanier' title='add to card'>
          <i class='bx bx-shopping-bag'></i></a>
      </div>
    </div>
  </div>
</div>
<!-- end Details -->
  ";
}

?>