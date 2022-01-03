<?php
include_once 'service.php';

// name lastname email password

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
if (!empty($name)&&!empty($lastname)&&!empty($email)&&!empty($password)) {
    # code...
    $rows=service::addClient($name,$lastname,$email,$password);
    echo $rows;
}






















?>