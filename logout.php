<?php
session_start();
session_destroy();
header('location:index.php');

if (!empty($_SESSION['client_email'])) {
    # code...
    session_destroy();
    header('location:index.php');
}
if (!empty($_SESSION['Admin_email'])) {
    # code...
    session_destroy();
    header('location:index.php');
}
?>