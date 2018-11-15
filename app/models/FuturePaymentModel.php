<?php

class FuturePaymentModel
{
	public $table = 'FuturePayment';
	public $futurePayments;

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