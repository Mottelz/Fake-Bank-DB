<?

class payment extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();
		$this->checkMakePaymentData();

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR client_id)
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('AccountModel');
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
		$this->checkIsLoggedIn();

		if($_SESSION['login_type'] == 'Client')
		{
			$futurePaymentModel = $this->model('FuturePaymentModel');
			$futurePayments = $futurePaymentModel->getFuturePaymentsByClientId($_SESSION['login_id']);
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$futurePaymentModel = $this->model('FuturePaymentModel');
			$futurePayments = $futurePaymentModel->getFuturePaymentsByClientId($_SESSION['login_id']);
		}

		$this->view('payment/futurePayments', ['futurePayments' => $futurePayments]);
	}

	public function setupPayment()
	{
		$this->checkIsLoggedIn();

		$this->checkSetupFuturePaymentsData();

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}

		$this->view('payment/setupPayment', ['accounts' => $accounts]);
	}

	public function editPayment($payment_id)
	{
		$this->checkIsLoggedIn();

		$this->checkEditFuturePaymentsData($payment_id);

		$futurePaymentModel = $this->model('FuturePaymentModel');
		$futurePayment = $futurePaymentModel->getFuturePaymentsById($payment_id)[0];

		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}

		$this->view('payment/editPayment',
			['payment_id' => $payment_id,
			 'futurePayment' => $futurePayment,
			 'accounts' => $accounts]);
	}

	public function history()
	{
		$this->checkIsLoggedIn();

		if($_SESSION['login_type'] == 'Client')
		{
			$transactionModel = $this->model('TransactionModel');
			$transactions = $transactionModel->getTransactionByClientId($_SESSION['login_id']);

		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$transactionModel = $this->model('TransactionModel');
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
			$futurePaymentModel = $this->model('FuturePaymentModel');

			$paymentID = $futurePaymentModel->getNextPaymentId();
			$to = $_POST['to'];
			$from = $_POST['from'];
			$amount = $_POST['amount'];
			$startDate = $_POST['start_date'];
			$frequency = $_POST['frequency'];
			$endDate = $_POST['end_date'];

			$futurePaymentModel->insertFuturePayment($paymentID, $to, $from, $amount, $startDate, $frequency, $endDate);

			header("Location:/payment/futurePayments");
		}
	}

	public function checkEditFuturePaymentsData($payment_id)
	{
		if(isset($_POST['editfuturepayments']) && $this->validateEditFuturePaymentsData())
		{
			$futurePaymentModel = $this->model('FuturePaymentModel');

			$paymentID = $payment_id;
			$to = $_POST['to'];
			$from = $_POST['from'];
			$amount = $_POST['amount'];
			$startDate = $_POST['start_date'];
			$frequency = $_POST['frequency'];
			$endDate = $_POST['end_date'];

			$futurePaymentModel->updateFuturePayment($paymentID, $to, $from, $amount, $startDate, $frequency, $endDate);
var_dump($_POST);
			//header("Location:/payment/futurePayments");
		}
	}

	public function validateMakePaymentData()
	{
		if($_POST['amount'] <= 0)
			return false;

		return true;
	}

	public function validateSetupFuturePaymentsData()
	{
		$now = date('Y/m/d');
		$start_date = date('Y/m/d', strtotime($_POST['start_date']));
		$end_date = date('Y/m/d', strtotime($_POST['end_date']));
		$daysInBetween = (strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24);

		if($_POST['amount'] <= 0)
			return false;
		else if($_POST['frequency'] <= 0)
			return false;
		else if($start_date < $now)
			return false;
		else if($end_date < $start_date)
			return false;
		else if($_POST['frequency'] > $daysInBetween)
			return false;

		return true;
	}

	public function validateEditFuturePaymentsData()
	{
		$now = date('Y/m/d');
		$end_date = date('Y/m/d', strtotime($_POST['end_date']));

		if($_POST['amount'] <= 0)
			return false;
		else if($_POST['frequency'] <= 0)
			return false;
		else if($end_date < $now)
			return false;

		return true;
	}
}

?>
