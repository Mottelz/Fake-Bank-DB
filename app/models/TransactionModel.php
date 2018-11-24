<?php

class TransactionModel extends Model
{
	public $table = 'Transaction';
	public $transactions;

	public function getAllTransactions() {
	    return $this->getData("SELECT * FROM Transaction_Table");
    }

    public function getTransactionById($id) {
        return $this->getData("SELECT * FROM Transaction_Table WHERE trans_id=" . $id);
    }

	 public function getTransactionByAccountId($id) {
        return $this->getData("SELECT * FROM Transaction_Table WHERE From_accid=" . $id);
    }

	public function transferMoneyTo($accIdFrom, $accIdTo, $amount) {

		//Test value

		$accountModel = $this->model('AccountModel');
		$accFrom = $accountModel->getAccountById($_POST[$accIdFrom]);


		$message = $accFrom[0]->Balance;
		echo "<script type='text/javascript'>alert('$message');</script>";

		//Take out of account
		$temp = $this->getData("SELECT Balance FROM Account WHERE Account_id=" . $accIdFrom) - $amount;
		$this->getData("UPDATE Account SET Balance=" . $temp . " WHERE Account_id=" . $accIdFrom);

		//Put in account
		$temp = $this->getData("SELECT Balance FROM Account WHERE Account_id=" . $accIdFrom) + $amount;
		$this->getData("UPDATE Account SET Balance=" . $temp . " WHERE Account_id=" . $accIdTo);

		return "Transaction Complete!";
	}

	function __construct()
	{
		$this->transactions = json_decode($this->data)->Transaction;
	}
}

?>