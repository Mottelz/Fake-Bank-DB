<?php

class AccountModel extends Model
{
    public function getAccountsByUserId($id) {
        return $this -> getData("SELECT * FROM Account WHERE Client_id=" . $id);
    }

    public function getAccountById($id) {
        return $this -> getData("SELECT * FROM Account WHERE Account_id=" . $id);
    }

    public function getAllAccounts() {
        return $this->getData("SELECT * FROM Account");
    }

	public function updateAccountBalance($id, $amount){
		return $this->getData("UPDATE Account SET Balance=" . $amount . " WHERE Account_id=" . $id);
	}
//	public $table = 'Account';
//	public $accounts;
//
//	private $data;
//	'{
//		"Account" : [{
//			"account_id" : 1,
//			"client_id" : 1,
//			"option" : "Option1",
//			"type" : "Checking",
//			"service" : "Service1",
//			"balance" : 1000
//		}, {
//			"account_id" : 2,
//			"client_id" : 1,
//			"option" : "Option2",
//			"type" : "Savings",
//			"service" : "Service2",
//			"balance" : 2000
//		}, {
//			"account_id" : 3,
//			"client_id" : 1,
//			"option" : "Option3",
//			"type" : "Investment",
//			"service" : "Service3",
//			"balance" : 3000
//		}]
//	}';

//	function __construct() {
////		$this->accounts = json_decode($this->data)->Account;
//        return $this->getData("SELECT * FROM Account");
//	}
}

?>