<?php

include 'class-autoLoader.inc.php';

$response = array(
	'status' => 0,
	'message' => 'Error occurred, please try again.'
);

$email = $_POST["email"];

$emailSubscribe = new EmailSubscribe\EmailSubscribe();
if ($emailSubscribe->saveEmail($email)) {
	$response['status'] = 1;
	$response['message'] = 'Email subscription successful';
} else {
	$response['status'] = 0;
	$response['message'] = 'Email address required';
}
echo json_encode($response);
