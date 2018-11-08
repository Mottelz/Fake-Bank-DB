<?

class TransactionModel 
{
	public $table = 'Transaction';
	public $transactions;

	private $data = 
	'{
		"Transaction" : [{
			"trans_id" : 1,
			"trans_type" : "Type1",
			"to" : "To1",
			"from" : "From1",
			"amount" : 1000,
			"by" : "By1",
			"date" : "2018-01-11"
		}, {
			"trans_id" : 2,
			"trans_type" : "Type2",
			"to" : "To 2",
			"from" : "From2",
			"amount" : 2000,
			"by" : "By2",
			"date" : "2018-02-12"
		}, {
			"trans_id" : 3,
			"trans_type" : "Type3",
			"to" : "To3",
			"from" : "From3",
			"amount" : 3000,
			"by" : "By3",
			"date" : "2018-03-13"
		}]
	}';

	function __construct()
	{
		$this->transactions = json_decode($this->data)->Transaction;
	}
}

?>