<?php

namespace Contact;

use Db;

class Contact extends Db
{
	//class field
	private $name;
	private $email;
	private $subject;
	private $message;
	private $response = array(
		'status' => false,
		'message' => '',
		'type' => ''
	);

	//method returns an array of [bool & string]
	public function saveContact($name, $email, $subject, $message)
	{
		$conn = $this->connect();
		//clean up
		$this->name = $this->stripOff($conn, $name);
		$this->email = $this->stripOff($conn, $email);
		$this->subject = $this->stripOff($conn, $subject);
		$this->message = $this->stripOff($conn, $message);

		//validate
		if (!empty($this->email)) {
			if (!$this->validate_text($this->name, 'required')) {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid full name';
			} elseif (!$this->validate_email($this->email, 'required')) {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid email';
			} elseif (!$this->validate_text($this->subject, 'required')) {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid subject';
			} elseif (!$this->validate_textarea($this->message, 'required')) {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid message';
			} else {
				$sql = "INSERT INTO `contactUs`(`fullName`, `email`, `subject`, `message`) VALUES ('" . $this->name . "', '" . $this->email . "', '" . $this->subject . "', '" . $this->message . "')";
				if ($conn->query($sql) === TRUE) {
					//send email
					$receiverName = 'Hi ' . $this->name;
					$receiverEmail = $this->email;
					$senderEmail = "query@safemotherhoodalliance.org";
					$btn = '';
					$emailSubject = "Thank you for contacting safemotherhoodalliance";
					$heading = "Thank you for contacting us.";
					$subheading = "We value your queries and contributions. We will get back to you at as soon as possible.";
					$extra = "";
					if ($this->sendEmail($receiverName, $receiverEmail, $senderEmail, $btn, $emailSubject, $heading, $subheading, $extra)) {
						$this->response['status'] = true;
						$this->response['message'] = 'Message sent successfully. We will get back to you real soon';
					} else {
						$this->response['status'] = true;
						$this->response['message'] = 'Message sent successfully. We will get back to you real soon...';
					}
				} else {
					$this->response['status'] = false;
					$this->response['message'] = 'System error. Please try again';
				}
			}
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Please fill in all fields before you submit';
		}
		return $this->response;
	} //end saveEmail()
}//end class
