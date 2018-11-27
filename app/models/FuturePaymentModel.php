<?php

class FuturePaymentModel extends Model
{
	public $table = 'FuturePayment';
	public $futurePayments;

	public function getAllFuturePayments() {
	    return $this->getData("SELECT * FROM Future_Payments");
    }

    public function getFuturePaymentsById($id) {
        return $this->getData("SELECT * FROM Future_Payments WHERE payment_id=" . $id);
    }

	public function getFuturePaymentsByClientId($id) {
        return $this->getData("SELECT Payment_id, To_accid, From_accid, Frequency, Future_Payments_Start_date, End_date, Amount FROM Future_Payments f INNER JOIN Account a ON f.From_accid = a.Account_id WHERE a.Client_id = $id");
	}

    public function getFuturePaymentsByStartDate($date) {
        return $this->getData("SELECT * FROM FuturePayments WHERE Future_Payments_Start_date=" . $date);
    }

    public function getFuturePaymentsByEndDate($date) {
        return $this->getData("SELECT * FROM Future_Payments WHERE End_date=" . $date);
    }

    public function getActiveFuturePayments($today) {
	    return $this->getData("SELECT * FROM Future_Payments WHERE End_date>'".$today."' AND Future_Payments_Start_date<'".$today."'");
    }

    public function getNextPaymentId() {
        return $this->getData("SELECT Payment_id FROM Future_Payments ORDER BY Payment_id DESC")[0]->Payment_id + 1;
    }

    public function insertFuturePayment($id, $to, $from, $amount, $start_date, $frequency, $end_date) {
        $this->insertData("INSERT INTO Future_Payments (Payment_id, To_accid, From_accid, Amount, Future_Payments_Start_date, Frequency, End_date) VALUES (" . 
            "$id" .
            ", $to" .
            ", $from" .
            ", $amount" .
            ", '$start_date'" .
            ", $frequency" .
            ", '$end_date')");
    }

    public function updateFuturePayment($id, $to, $from, $amount, $start_date, $frequency, $end_date) {
        $this->updateData("UPDATE Future_Payments SET " . 
            "To_accid = $to" .
            ", From_accid = $from" .
            ", Amount = $amount" .
            ", Future_Payments_Start_date = '$start_date'" .
            ", Frequency = $frequency" .
            ", End_date = '$end_date'" .
            " WHERE Payment_id = $id");
    }

}

?>
