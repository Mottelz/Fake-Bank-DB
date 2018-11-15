<?php

class AccountModel 
{
	public $table = 'Account';
	public $accounts;

	private $data = 
	'{
		"Account" : [{
			"account_id" : 1,
			"client_id" : 1,
			"option" : "Option1",
			"type" : "Checking",
			"service" : "Service1",
			"balance" : 1000
		}, {
			"account_id" : 2,
			"client_id" : 1,
			"option" : "Option2",
			"type" : "Savings",
			"service" : "Service2",
			"balance" : 2000
		}, {
			"account_id" : 3,
			"client_id" : 1,
			"option" : "Option3",
			"type" : "Investment",
			"service" : "Service3",
			"balance" : 3000
		}]
	}';

	function __construct()
	{
		$this->accounts = json_decode($this->data)->Account;
	}
}

?>