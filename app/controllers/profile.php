<?

class profile extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();
		
		if($_SESSION['login_type'] == 'Client')
		{
			$clientModel = $this->model('ClientModel');
			$user = $clientModel->clients[0]; //Arbitrary client (NEED QUERY FOR client_id)
		}
		else //$_SESSION['Employee'] == 'Employee'
		{
			$employeeModel = $this->model('EmployeeModel');
			$user = $employeeModel->employees[0]; //Arbitrary employee (NEED QUERY FOR employee_id)
		}

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->addresses[0]; //Arbitrary address (NEED QUERY FOR street_address)

		$countryModel = $this->model('countryModel');
		$country = $countryModel->countries[0]; //Arbitrary country (NEED QUERY FOR city)

		$this->view('profile/contactInformation', 
			['login_type' => $_SESSION['login_type'],
			 'user' => $user,
		     'address' => $address,
		 	 'country' => $country]);
	}

	public function changePassword()
	{
		$this->checkChangePasswordData();

		$this->view('profile/changePassword');
	}

	public function edit()
	{
		$this->checkEditContactInformationData();

		if($_SESSION['login_type'] == 'Client')
		{
			$clientModel = $this->model('ClientModel');
			$user = $clientModel->clients[0]; //Arbitrary client (NEED QUERY FOR client_id)
		}
		else //$_SESSION['Employee'] == 'Employee'
		{
			$employeeModel = $this->model('EmployeeModel');
			$user = $employeeModel->employees[0]; //Arbitrary employee (NEED QUERY FOR employee_id)
		}

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->addresses[0]; //Arbitrary address (NEED QUERY FOR street_address)

		$this->view('profile/editContactInformation',
			['login_type' => $_SESSION['login_type'],
			 'user' => $user,
			 'address' => $address]);
	}

	public function checkEditContactInformationData()
	{
		if(isset($_POST['editcontactinformation']) && $this->validateEditContactInformationData())
		{
			if($_SESSION['login_type'] == 'Client')
			{
				//NEED EDIT CLIENT QUERY
			}
			else //$_SESSION['login_type'] == 'Employee'
			{
				//NEED EDIT EMPLOYEE QUERY
			}

			header("Location:/profile");
		}
	}

	public function checkChangePasswordData()
	{
		if(isset($_POST['changepassword']) && $this->validateChangePasswordData())
		{
			//NEED EDIT CLIENT/EMPLOYEE QUERY

			header("Location:/profile");
		}
	}

	public function validateEditContactInformationData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateChangePasswordData()
	{
		//INSERT VALIDATION (AS NEEDED)

		// NEED QUERY FOR password OF EMPLOYEE/CLIENT

		if($_POST['newpassword'] != $_POST['confirmpassword'])
			return false;

		return true;
	}
}

?>