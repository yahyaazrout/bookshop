<?php
include_once ('service.php');
$Name_Client = $_POST['name'];
$lastName_Client = $_POST['lastname'];
$email_Client = $_POST['emailsignin'];
$password_Client = $_POST['passwordsignin'];
 $addClient=service::addClient($Name_Client,$lastName_Client,$email_Client,$password_Client);

echo $addClient;

?>