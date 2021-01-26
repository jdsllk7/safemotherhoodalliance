<?php
//load all classes
include 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

//get class object
$contact = new Contact\Contact();

//save contact us
$response = $contact->saveContact($name, $email, $subject, $message);

//send back to jQuery
echo json_encode($response);
