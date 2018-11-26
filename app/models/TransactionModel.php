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

	public function getTransactionByClientId($id) {
    	return $this->getData("SELECT * FROM Transaction_Table INNER JOIN Account ON Transaction_Table.From_accid = Account.Account_id where Trans_type ='Payment' OR Client_id =" . $id );
    }

    public function getNextTransId() {
    	return $this->getData("SELECT Trans_id FROM Transaction_Table ORDER BY Trans_id DESC")[0]->Trans_id + 1;
    }

	public function getTransferByClientId($id) {
		return $this->getData("SELECT * FROM Transaction_Table INNER JOIN Account ON Transaction_Table.From_accid = Account.Account_id where  Trans_type ='Transfer' OR Client_id =" . $id );
	}

	public function getAccountLoss($id) {
        return $this->getData("SELECT Amount FROM Transaction_Table WHERE From_accid=" . $id ." AND  (Trans_type = 'Payment' OR Trans_type = 'Transfer')");
    }

	public function getAccountProfit($id) {
	    return $this->getData("SELECT Amount FROM Transaction_Table WHERE From_accid=" . $id ." AND  (	Trans_type = 'Sale')");
	}

	public function getClientPayments($client_id) {
		return $this->getData("SELECT * FROM Transaction_Table t INNER JOIN Account a ON t.From_accid = a.Account_id WHERE Trans_type = 'Payment' AND Client_id = $client_id");
	}

	public function insertPayment($trans_id, $to , $from, $amount, $date) {
    	$inserted = $this->insertData("INSERT INTO Transaction_Table (Trans_id, To_accid, From_accid, Amount, Trans_date, Trans_type)  VALUES (" .
    		"$trans_id" .
    		", $to" .
    		", $from" .
    		", $amount" .
    		", '$date'" .
    		", 'Payment')");

    	if($inserted)
    		$this->computeBalanceAfterTrans($to, $from, $amount);
    }

    public function computeBalanceAfterTrans($to, $from, $amount) {
    	$this->updateAccountBalance($to, $amount);
    	$this->updateAccountBalance($from, -($amount));
    }

    public function updateAccountBalance($id, $amount){
		$this->updateData("UPDATE Account SET Balance=" . $amount . " WHERE Account_id=" . $id);
	}


	function __construct()
	{
		$this->transactions = json_decode($this->data)->Transaction;
	}
}

?>
