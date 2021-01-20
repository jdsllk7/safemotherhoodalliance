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

	public function isAdmin($email)
	{
		//clean up email
		$this->email = $this->stripOff($this->connect(), $email);
		$sql = "SELECT email FROM admin WHERE email ='" . $this->email . "'";
		$result = $this->connect()->query($sql);
		if ($result->num_rows == 1) {
			$this->response['status'] = true;
			$this->response['message'] = 'Welcome boss';
			$this->response['type'] = 'admin';
		} else {
			$this->response['status'] = false;
		}
		return $this->response;
	} //end isAdmin()

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
						$this->response['status'] = true;
						$this->response['message'] = 'Email subscription successful';
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
}//end class
