<?

class login extends Controller 
{
	public function index() 
	{
		$this->checkSignout();
		$this->checkLoginData();

		$this->view('login');
	}

	public function checkLoginData()
	{
		if(isset($_POST['login']) && $this->validateLoginData())
		{
			if($_POST['login'] == 'client')
			{
				$clientModel = $this->model('ClientModel');
				$client = $clientModel->clients[0]; //Arbitrary client (NEED QUERY FOR client_id)

				$_SESSION['login_id'] = $client->client_id;
				$_SESSION['login_type'] = 'Client';
			}
			else //$_POST['login'] == 'employee'
			{
				$employeeModel = $this->model('EmployeeModel');
				$employee = $employeeModel->employees[0]; //Arbitrary employee (NEED QUERY FOR employee_id)

				$_SESSION['login_id'] = $employee->employee_id;
				$_SESSION['login_type'] = 'Employee';
			}
			
			$_SESSION['acc_toggle'] = "Personal"; //Set to personal accounts as default

			header("Location:/account");
		}
	}

	public function checkSignout()
	{
		if($_POST['signout'])
		{
			unset($_SESSION['login_id']);
			unset($_SESSION['login_type']);
			unset($_SESSION['acc_toggle']);
		}
	}
	
	public function validateLoginData()
	{
		if($_POST['login'] == 'client')
		{
			//INSERT VALIDATION (AS NEEDED)
		}
		else //$_POST['login'] == 'employee'
		{
			//INSERT VALIDATION (AS NEEDED)
		}

		return true;
	}
}

?>