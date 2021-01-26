<?php

namespace EmailSubscribe;

use Db;

class EmailSubscribe extends Db
{
	private $email; //class field
	private $response = array(
		'status' => false,
		'message' => '',
		'type' => ''
	);

	public function emailExists($email)
	{
		//clean up email
		$this->email = $this->stripOff($this->connect(), $email);
		$sql = "SELECT email FROM emailSubscribe WHERE email ='" . $this->email . "'";
		$result = $this->connect()->query($sql);
		if ($result->num_rows >= 1) {
			return true;
		} else {
			return false;
		}
	} //end emailExists()


	//method returns an array of [bool & string]
	public function saveEmail($email)
	{
		//clean up email
		$this->email = $this->stripOff($this->connect(), $email);

		//validate email
		if (!empty($this->email)) {
			if ($this->validate_email($this->email, 'required')) {
				if (!$this->emailExists($this->email)) {
					$sql = "INSERT INTO `emailSubscribe`(`email`) VALUES ('" . $this->email . "')";
					if ($this->connect()->query($sql) === TRUE) {
						//send email
						$receiverName = "";
						$receiverEmail = $email;
						$senderEmail = "info@safemotherhoodalliance.org";
						$btn = '';
						$emailSubject = "Email Subscription";
						$heading = "Thank you for subscribing";
						$subheading = "We publish blogs and newsletters on a weekly basis in order to keep you informed of our activities";
						$extra = "";
						if ($this->sendEmail($receiverName, $receiverEmail, $senderEmail, $btn, $emailSubject, $heading, $subheading, $extra)) {
							$this->response['status'] = true;
							$this->response['message'] = 'Thank you for subscribing';
						}else{
							$this->response['status'] = true;
							$this->response['message'] = 'Thank you for subscribing...';
						}
					} else {
						$this->response['status'] = false;
						$this->response['message'] = 'System error. Please try again';
					}
				} else {
					$this->response['status'] = false;
					$this->response['message'] = 'This email address already exists';
				}
			} else {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid email';
			}
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Email address is required';
		}
		return $this->response;
	} //end saveEmail()


	//method returns an array of [bool & string]
	public function deleteEmail($email)
	{
		//clean up email
		$this->email = $this->stripOff($this->connect(), $email);

		//validate email
		if (!empty($this->email)) {
			if ($this->validate_email($this->email, 'required')) {
				if ($this->emailExists($this->email)) {
					$sql = "DELETE FROM emailSubscribe WHERE email LIKE '$this->email'";
					if ($this->connect()->query($sql) === TRUE) {
						$this->response['status'] = true;
						$this->response['message'] = 'You will no longer receive emails from us.';
					} else {
						$this->response['status'] = false;
						$this->response['message'] = 'System error. Please try again';
					}
				} else {
					$this->response['status'] = false;
					$this->response['message'] = 'This email address does not exists';
				}
			} else {
				$this->response['status'] = false;
				$this->response['message'] = 'Please provide valid email';
			}
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Email address is required';
		}
		return $this->response;
	} //end saveEmail()
}//end class
