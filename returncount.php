<?php
 session_start();
 include_once ('service.php');
 if (!empty($_POST['url'])) {
     # code...
     $_SESSION['urlOfPage'] = $_POST['url'];
 }

if (!empty($_SESSION['client_email'])) {
    # code...
    // $client_email='yahya@123';
    
    if (!empty($_POST['value'])) {
        # code...
        $client_email=$_SESSION['client_email'];
        $id_book=$_POST['value'];
        $data_toInsert=service::addtoPanier($id_book,$client_email);
        $rows=service::AllBookFromPanierByEmailClient($client_email);
        echo $rows->rowCount();
    } else {
        # code...
    $client_email=$_SESSION['client_email'];
    //  $urll = $_POST['url'];
    // $client_email='yahya@123';
    $rows=service::AllBookFromPanierByEmailClient($client_email);
    echo $rows->rowCount();
}
 } else {
    echo 0;
}

?>