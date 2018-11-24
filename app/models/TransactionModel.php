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
	public function getAccountLoss($id) {
        return $this->getData(Select Amount from Transaction_Table where From_accid" . $id ". AND  (Trans_type = "Payment" or trans_type = "Transfer"));
    }
	


	function __construct()
	{
		$this->transactions = json_decode($this->data)->Transaction;
	}
}

?>