<?

class login extends Controller 
{
	public function index() 
	{
		$this->checkSignout();
		$this->checkLoginData();

		$this->view('login');

 	 	// echo "===TEST OUTPUT===";
  		// $clientModel = $this->model('ClientModel');
  		// var_dump($clientModel->getClientById(1));
	}

	public function checkLoginData()
	{
		if(isset($_POST['login']) && $this->validateLoginData())
		{
			if($_POST['login'] == 'client')
			{
			// 	$clientModel = $this->model('ClientModel');
			// /	$client = $clientModel->getClientById($client->client_id); //Arbitrary client (NEED QUERY FOR client_id)

				//$_SESSION['login_id'] = $client->client_id;
				$_SESSION['login_type'] = 'Client';
			}
			else //$_POST['login'] == 'employee'
			{
				$employeeModel = $this->model('EmployeeModel');
				$employee = $employeeModel->employees[0]; //Arbitrary employee (NEED QUERY FOR employee_id)

				//$_SESSION['login_id'] = $employee->employee_id;
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
		$clientModel = $this->model('ClientModel');
		$client = $clientModel->getClientById($_POST['client_id']);

		if($_POST['login'] == 'client')
		{
			// if(!$client[0])
			// 	return false;
			// else if($_POST['password'] != $client[0]->password)
			// 	return false;
		}
		else //$_POST['login'] == 'employee'
		{
			//INSERT VALIDATION (AS NEEDED)
		}

		return true;
	}
}

?>