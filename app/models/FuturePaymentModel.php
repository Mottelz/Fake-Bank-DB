<?php

class FuturePaymentModel extends Model
{
	public $table = 'FuturePayment';
	public $futurePayments;

	public function getAllFuturePayments() {
	    return $this->getData("SELECT * FROM FuturePayment");
    }

    public function getFuturePaymentsById($id) {
        return $this->getData("SELECT * FROM FuturePayment WHERE payment_id=" . $id);
    }

		public function getFuturePaymentsByClientId($id) {
        return $this->getData("SELECT * FROM Future_Payments INNER JOIN Account ON Future_Payments.From_accid = Account.Account_id where Client_id=". $id);
		}

    public function getFuturePaymentsByStartDate($date) {
        return $this->getData("SELECT * FROM FuturePayment WHERE start_date=" . $date);
    }

    public function getFuturePaymentsByEndDate($date) {
        return $this->getData("SELECT * FROM FuturePayment WHERE end_date=" . $date);
    }

	private $data =
	'{
		"FuturePayment" : [{
			"payment_id" : 1,
			"to" : "To1",
			"from" : "From1",
			"amount" : 1000,
			"start_date" : "2018-01-11",
			"frequency" : 1,
			"end_date" : "2018-11-01"
		}, {
			"payment_id" : 2,
			"to" : "To2",
			"from" : "From2",
			"amount" : 1000,
			"start_date" : "2018-02-12",
			"frequency" : 14,
			"end_date" : "2018-12-02"
		}, {
			"payment_id" : 3,
			"to" : "To3",
			"from" : "From3",
			"amount" : 1000,
			"start_date" : "2018-03-03",
			"frequency" : 60,
			"end_date" : "2018-03-13"
		}]
	}';

	function __construct()
	{
		$this->futurePayments = json_decode($this->data)->FuturePayment;
	}
}

?>
