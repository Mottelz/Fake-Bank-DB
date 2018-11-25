<?

class profile extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();
		
		if($_SESSION['login_type'] == 'Client')
		{
			$clientModel = $this->model('ClientModel');
            $user = $clientModel->getClientById($_SESSION['login_id']);
		}
		else //$_SESSION['Employee'] == 'Employee'
		{
			$employeeModel = $this->model('EmployeeModel');
			$user = $employeeModel->getEmployeeById($_SESSION['login_id']);
		}

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->getAddressByStreet($user->street_address);

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->getCityByCity($address->city);

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
            $user = $clientModel->getClientById($_SESSION['login_id']);
		}
		else //$_SESSION['Employee'] == 'Employee'
		{
			$employeeModel = $this->model('EmployeeModel');
            $user = $employeeModel->getEmployeeById($_SESSION['login_id']);
		}

		$addressModel = $this->model('AddressModel');
        $address = $addressModel->getAddressByStreet($user->street_address);

        $countryModel = $this->model('CountryModel');
        $country = $countryModel->getCityByCity($address->city);

		$this->view('profile/editContactInformation',
            ['login_type' => $_SESSION['login_type'],
                'user' => $user,
                'address' => $address,
                'country' => $country]);
	}

	public function checkEditContactInformationData()
	{
		if(isset($_POST['editcontactinformation']) && $this->validateEditContactInformationData())
		{
			if($_SESSION['login_type'] == 'Client')
			{
				//NEED EDIT CLIENT QUERY
                $clientModel = $this->model('ClientModel');
                $clientModel->updateClientById($_SESSION['login_id'], $_POST['branch_id'], $_POST['first_name'], $_POST['last_name'], $_POST['street_address'], $_POST['password'], $_POST['department'], $_POST['email'], $_POST['phone']);
			}
			else //$_SESSION['login_type'] == 'Employee'
			{
                $employeeModel = $this->model('EmployeeModel');
                $employeeModel->updateEmployeeById($_SESSION['login_id'], $_POST['branch_id'], $_POST['title'], $_POST['first_name'], $_POST['last_name'], $_POST['salary'], $_POST['street_address'], $_POST['password'], $_POST['department'], $_POST['email'], $_POST['phone'], $_POST['start_date'], $_POST['active']);
			}

			header("Location:/profile");
		}
	}

	public function checkChangePasswordData()
	{
		if(isset($_POST['changepassword']) && $this->validateChangePasswordData())
		{
            if($_SESSION['login_type'] == 'Client')
            {
                $clientModel = $this->model('ClientModel');
                $_SESSION['login_id'];
                $clientModel->updateClientPassword($_SESSION['login_id'], $_POST['newpassword']);
            }
            else //$_SESSION['login_type'] == 'Employee'
            {
                $employeeModel = $this->model('EmployeeModel');
                $employeeModel->updateEmployeePassword($_SESSION['login_id'], $_POST['newpassword']);
            }

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

		if($_POST['newpassword'] != $_POST['confirmpassword'])
			return false;

		return true;
	}
}

?>