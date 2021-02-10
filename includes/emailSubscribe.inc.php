<?php
die(123);
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$email = $_POST["email"];

//get class object
$emailSubscribe = new EmailSubscribe();

//save email
$response = $emailSubscribe->saveEmail($email);

//send back to jQuery
echo json_encode($response);
