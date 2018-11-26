<?

class transfer extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();
		$this->checkMakeTransferData();



		if($_SESSION['login_type'] == 'Client')
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}
		else //$_SESSION['login_type']) = 'Employee'
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->getAccountsByUserId($_SESSION['login_id']);
		}

		$this->view('transfer/makeTransfer', ['accounts' => $accounts]);
	}

	public function subHeader()
	{
		$this->view('transfer/transferHeader');
	}

	public function history()
	{
		$this->checkIsLoggedIn();

		if($_SESSION['login_type'] == 'Client')
		{
			$transactionModel = $this->model('TransactionModel');
			$transactions = $transactionModel->getClientTransfers($_SESSION['login_id']);
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$transactionModel = $this->model('TransactionModel');
				$transactions = $transactionModel->getClientTransfers($_SESSION['login_id']);
		}

		$this->view('transfer/transferHistory', ['transactions' => $transactions]);
	}

	public function checkMakeTransferData()
	{
		if(isset($_POST['maketransfer']) && $this->validateMakeTransferData())
		{
			$transactionModel = $this->model('TransactionModel');

			$trans_id = $transactionModel->getNextTransId();
			$to = $_POST['to'];
			$from = $_POST['from'];
			$amount = $_POST['amount'];
			$date = date('Y-m-d');

			$transactionModel->insertTransfer($trans_id, $to, $from, $amount, $date);

			header("Location:/transfer/history");
		}
	}

	public function validateMakeTransferData()
	{
		if($_POST['amount'] <= 0)
			return false;

		return true;
	}
}

?>
