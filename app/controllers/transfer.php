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
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR client_id and account_level)
		}
		else //$_SESSION['login_type']) = 'Employee'
		{
			$accountModel = $this->model('AccountModel');
			$accounts = $accountModel->accounts; //All accounts (NEED QUERY FOR employee_id and account_level)
		}

		$this->view('transfer/makeTransfer', ['accounts' => $accounts]);


		//Testing values
		$message = "login_type: " . $_SESSION['login_type'] . " login_id: " . $_SESSION['login_id'];
		echo "<script type='text/javascript'>alert('$message');</script>";

		$transactionModel = $this->model('TransactionModel');
		$accountModel = $this->model('AccountModel');

		$accountModel->updateAccountBalance(1, 49);

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
			$transactions = $transactionModel->getTransferByClientId($_SESSION['login_id']);
		}
		else //$_SESSION['login_type'] == 'Employee'
		{
			$transactionModel = $this->model('TransactionModel');
				$transactions = $transactionModel->getTransferByClientId($_SESSION['login_id']);
		}

		$this->view('transfer/transferHistory', ['transactions' => $transactions]);
	}

	public function checkMakeTransferData()
	{
		if(isset($_POST['maketransfer']) && $this->validateMakeTransferData())
		{
			//NEED CREATE ACCOUNT QUERY




			$_SESSION["login_type"];	//Employee or Client


			$_SESSION["login_id"];	//Client_Id or Employee_Id



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
