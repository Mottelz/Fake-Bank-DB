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
