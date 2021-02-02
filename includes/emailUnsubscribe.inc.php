<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$email = $_POST["email"];

//get class object
$emailSubscribe = new EmailSubscribe\EmailSubscribe();

//save email
$response = $emailSubscribe->deleteEmail($email);

//send back to jQuery
echo json_encode($response);
