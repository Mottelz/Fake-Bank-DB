<?

class client extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();

		$clientModel = $this->model('ClientModel');
		$clients = $clientModel->getAllClients();

		$this->view('client/clientSummary', ['clients' => $clients]);
	}

	public function details($client_id)
	{
		$clientModel = $this->model('ClientModel');
		$client = $clientModel->getClientById($client_id)[0];

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->getAddressByStreet($client->Street_address)[0];

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->getCityByCity($address->City)[0];

		$this->view('client/clientDetails',
			['client' => $client,
		     'address' => $address,
		 	 'country' => $country]);
	}

	public function add()
	{
		$this->checkAddClientData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();

		$this->view('client/clientAdd', ['branches' => $branches]);
	}

	public function edit($client_id)
	{
		$this->checkEditClientData();

		$clientModel = $this->model('ClientModel');
		$client = $clientModel->clients[0]; //Arbitrary client (NEED QUERY FOR client_id)

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->addresses[0]; //Arbitrary address (NEED QUERY FOR street_address)

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();


		$this->view('client/clientEdit',
			['client' => $client,
			 'address' => $address,
			 'branches' => $branches]);
	}

	public function checkAddClientData()
	{
		if(isset($_POST['addclient']) && $this->validateAddClientData())
		{
			$clientModel = $this->model('ClientModel');

			$clientID = $clientModel->getNextClientId();
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$birthDate = $_POST['birth_date'];
			$joinDate = date('Y-m-d');
			$password = $_POST['password'];
			$branchID = $_POST['branch_id'];
			$department = null;
			$streetAddress = $_POST['street_address'];
			$city = $_POST['city'];
			$province = $_POST['province'];
			$country = $_POST['country'];
			$postalCode = $_POST['postal_code'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			$countryModel = $this->model('CountryModel');
			$contries = $countryModel->getCityByCity($city);

			// Insert new country entry if there is no country for the given city
			if(!$countries)
				$countryModel->insertCountry($city, $province, $country);

			$addressModel = $this->model('AddressModel');
			$addresses = $addressModel->getAddressByStreet($streetAddress);

			// Insert new address entry if there is no address for the given street address
			if(!$addresses)
				$addressModel->insertAddress($streetAddress, $postalCode, $city);

			// Insert new client
			$clientModel->insertClient($clientID, $branchID, $firstName, $lastName, $birthDate, $joinDate, $streetAddress, $password, $department, $email, $phone);

			header("Location:/client");
		}
	}

	public function checkEditClientData()
	{
		if(isset($_POST['editclient']) && $this->validateEditClientData())
		{
			//NEED EDIT CLIENT QUERY

			header("Location:/client");
		}
	}

	public function validateAddClientData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateEditClientData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}
}

?>
