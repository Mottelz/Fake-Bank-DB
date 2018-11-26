<?

class client extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();

		$clientModel = $this->model('ClientModel');
		$clients = $clientModel->clients;

		$this->view('client/clientSummary', ['clients' => $clients]);
	}

	public function details($client_id)
	{
		$clientModel = $this->model('ClientModel');
		$client = $clientModel->clients[0]; //Arbitrary client (NEED QUERY FOR client_id)

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->addresses[0]; //Arbitrary address (NEED QUERY FOR street_address)

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->countries[0]; //Arbitrary country (NEED QUERY FOR city)

		$this->view('client/clientDetails',
			['client' => $client,
		     'address' => $address,
		 	 'country' => $country]);
	}

	public function add()
	{
		$this->checkAddClientData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->branches;

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
		$branches = $branchModel->branches;


		$this->view('client/clientEdit',
			['client' => $client,
			 'address' => $address,
			 'branches' => $branches]);
	}

	public function checkAddClientData()
	{
		if(isset($_POST['addclient']) && $this->validateAddClientData())
		{
			//NEED CREATE CLIENT QUERY

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
