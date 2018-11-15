<?

class account extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();

		$this->checkToggle();

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

		$this->view('account/accountSummary', 
			['acc_toggle' => $_SESSION['acc_toggle'],
			 'accounts' => $accounts]);
	}

	public function new()
	{
		$this->checkOpenAccountData();

		$this->view('account/openAccount');
	}

	public function details($account_id)
	{
		$accountModel = $this->model('AccountModel');
		$account = $accountModel->accounts[0]; //Arbitrary account (NEED QUERY FOR account_id)

		$transactionModel = $this->model('TransactionModel');
		$transactions = $transactionModel->transactions; //All transactions (NEED QUERY FOR account_id)

		$annualProfits = 0; //Arbitrary value (NEED QUERY TO COMPUTE ANNUAL PROFITS)
		$annualLosses = 0; //Arbitrary value (NEED QUERY TO COMPUTE ANNUAL LOSSES)

		$this->view('account/accountDetails', 
			['account' => $account, 
			 'transactions' => $transactions,
		     'annualProfits' => $annualProfits,
		     'annualLosses' => $annualLosses]);
	}

	public function checkToggle()
	{
		if(isset($_POST['toggle']) && $this->validateOpenAccountData())
		{
			if($_POST['toggle'] == 'Personal')
				$_SESSION['acc_toggle'] = 'Personal';
			else //$_POST['toggle'] == 'Business'
				$_SESSION['acc_toggle'] = 'Business';
		}
	}

	public function checkOpenAccountData()
	{
		if(isset($_POST['openaccount']) && $this->validateOpenAccountData())
		{
			if($_SESSION['login_type'] == 'Client')
			{
				//NEED CREATE ACCOUNT QUERY (FOR CLIENT)
			}
			else //$_SESSION['login_type'] == 'Employee'
			{
				//NEED CREATE ACCOUNT QUERY (FOR EMPLOYEE)
			}

			header("Location:/account");
		}
	}

	public function validateOpenAccountData()
	{
		//INSERT VALIDATION (AS NEEDED)
		
		return true;
	}
}

?>