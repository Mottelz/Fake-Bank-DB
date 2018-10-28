<?

class payment extends Controller 
{
	public function index()
	{
		$this->view('payment/makePayment');
	}

	public function subHeader()
	{
		$this->view('payment/paymentHeader');
	}

	public function setupPayment()
	{
		$this->view('payment/setupPayment');
	}

	public function history()
	{
		$this->view('payment/paymentHistory');
	}
}

?>