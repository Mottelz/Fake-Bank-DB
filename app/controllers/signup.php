<?
//TODO: Add to Address_Table if Street_address does not exist
class signup extends Controller 
{
	public function index() 
	{	
		$this->checkSignupData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();

		$this->view('signup', ['branches' => $branches]);
	}

	public function checkSignupData()
	{
		if(isset($_POST['signup']) && $this->validateSignupData())
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

			header("Location:/login");
		}
	}

	public function validateSignupData()
	{
		$streetaddressregex = '(^\d+\s[a-zA-Z0-9\-\'\s]+$)';
		$postalcoderegex = '(^[a-zA-Z]{1}\d{1}[a-zA-Z]{1}\s*\d{1}[a-zA-Z]{1}\d{1}$)';
		$phoneregex = '(^\d{10}$)';
		$emailregex = '(^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$)';

		$now = date('Y/m/d');
		$birthDate = date('Y/m/d', strtotime($_POST['birth_date']));

		if($birthDate >= $now)
			return false;
		else if(!preg_match($streetaddressregex, $_POST['street_address']))
			return false;
		else if(!preg_match($postalcoderegex, $_POST['postal_code']))
			return false;
		else if(!preg_match($phoneregex, $_POST['phone']))
			return false;
		else if(!preg_match($emailregex, $_POST['email']))
			return false;

		return true;
	}
}

?>