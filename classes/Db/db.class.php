<?php

namespace Db;

use Validator\Validator;

class Db extends Validator
{

	//localhost
	private $servernameLocal = "localhosts";
	private $usernameLocal = "root";
	private $passwordLocal = "";
	private $dbNameLocal = "dembebxq_sma_db";

	//production
	private $servernameProd = "localhost";
	private $usernameProd = "dembebxq_user1";
	private $passwordProd = "7fk!4RULbv30Z(";
	private $dbNameProd = "dembebxq_sma_db";

	private function server()
	{
		if (file_exists('localhost.txt')) {
			return 'localhost';
		} else {
			return 'production';
		}
	}

	protected function connect()
	{

		if ($this->server() == 'localhost') { // if connected to local server
			$conn = new mysqli($this->servernameLocal, $this->usernameLocal, $this->passwordLocal, $this->dbNameLocal);
		} elseif ($this->server() == 'production') { //if connected to prod server
			$conn = new mysqli($this->servernameProd, $this->usernameProd, $this->passwordProd, $this->dbNameProd);
		} else {
			die("Cannot connect to server.");
		}

		if (!$conn) {
			die("Cannot connect to server");
		}
		return $conn;
	} //end connect()
}
