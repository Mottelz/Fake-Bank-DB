<?

class payment extends Controller 
{
	public function index()
	{
		$this->checkIsLoggedIn();

		$this->checkMakePaymentData();

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR client_id)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR employee_id)
		}

		$this->view('payment/makePayment', ['accounts' => $accounts]);
	}

	public function subHeader()
	{
		$this->view('payment/paymentHeader');
	}

	public function futurePayments()
	{
		if($_SESSION['login_type'] == 'Client')
		{
			$futurePaymentModel = $this->model('futurePaymentModel');
			$futurePayments = $futurePaymentModel->futurePayments; //All future payments (NEED QUERY FOR account_id and client_id)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$futurePaymentModel = $this->model('futurePaymentModel');
			$futurePayments = $futurePaymentModel->futurePayments; //All future payments (NEED QUERY FOR account_id and employee_id)
		}

		$this->view('payment/futurePayments', ['futurePayments' => $futurePayments]);
	}

	public function setupPayment()
	{
		$this->checkSetupFuturePaymentsData();

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR client_id)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR employee_id)
		}

		$this->view('payment/setupPayment', ['accounts' => $accounts]);
	}

	public function editPayment($payment_id)
	{
		$this->checkEditFuturePaymentsData($payment_id);

		$futurePaymentModel = $this->model('futurePaymentModel');
		$futurePayment = $futurePaymentModel->futurePayments[0]; //Arbitrary future payments (NEED QUERY FOR payment_id HERE)

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR client_id)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('accountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR employee_id)
		}

		$this->view('payment/editPayment', 
			['payment_id' => $payment_id,
			 'futurePayment' => $futurePayment,
			 'accounts' => $accounts]);
	}

	public function history()
	{
		if($_SESSION['login_type'] == 'Client')
		{
			$transactionModel = $this->model('transactionModel');
			$transactions = $transactionModel->transactions; //All transactions (NEED QUERY FOR account_id, client_id and type)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$transactionModel = $this->model('transactionModel');
			$transactions = $transactionModel->transactions; //All transactions (NEED QUERY FOR account_id, employee_id and type)
		}

		$this->view('payment/paymentHistory', ['transactions' => $transactions]);
	}

	public function checkMakePaymentData()
	{
		if(isset($_POST['makepayment']) && $this->validateMakePaymentData())
		{
			//NEED CREATE PAYMENT QUERY

			header("Location:/payment/history");
		}
	}

	public function checkSetupFuturePaymentsData()
	{
		if(isset($_POST['setupfuturepayments']) && $this->validateSetupFuturePaymentsData())
		{
			//NEED CREATE FUTURE PAYMENT QUERY

			header("Location:/payment/futurePayments");
		}
	}

	public function checkEditFuturePaymentsData($payment_id)
	{
		if(isset($_POST['editfuturepayments']) && $this->validateEditFuturePaymentsData())
		{
			//NEED EDIT FUTURE PAYMENT QUERY

			header("Location:/payment/futurePayments");
		}
	}

	public function validateMakePaymentData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateSetupFuturePaymentsData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateEditFuturePaymentsData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}
}

?>