<?php

namespace EmailSubscribe;

use Db\Db;

class EmailSubscribe extends Db
{
	public function saveEmail($data)
	{
		if ($this->validate_email($data, 'required')) {
			return true;
		} else {
			return false;
		}
	}
}
