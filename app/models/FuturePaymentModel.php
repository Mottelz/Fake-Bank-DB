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
        return $this->getData("SELECT Payment_id, To_accid, From_accid, Frequency, Future_Payments_Start_date, End_date, Amount FROM Future_Payments f INNER JOIN Account a ON f.From_accid = a.Account_id WHERE a.Client_id = $id");
	}

    public function getFuturePaymentsByStartDate($date) {
        return $this->getData("SELECT * FROM FuturePayment WHERE start_date=" . $date);
    }

    public function getFuturePaymentsByEndDate($date) {
        return $this->getData("SELECT * FROM FuturePayment WHERE end_date=" . $date);
    }




	function __construct()
	{
		$this->futurePayments = json_decode($this->data)->FuturePayment;
	}
}

?>
