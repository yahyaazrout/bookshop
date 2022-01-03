<?php
session_start();
include_once ('dataAccess.php');
include_once ('service.php');
 if (!empty($_POST['urllien'])) {
     # code...
     $_SESSION['urlOfPage'] = $_POST['urllien'];
 }
// $testLogin =0;

if (empty($_SESSION['client_email'])) {
    $_SESSION['urlOfPage']=$_POST['url'];
    # code...
    echo 0 ;
}
else {
    # code...
    $testLogin = $_SESSION['client_email'];
    echo $testLogin ;
    
}
?>