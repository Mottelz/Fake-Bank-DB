<?

class signup extends Controller 
{
	public function index() 
	{	
		$this->checkSignupData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();

		var_dump($branches);
		$this->view('signup', ['branches' => $branches]);
	}

	public function checkSignupData()
	{
		if(isset($_POST['signup']) && $this->validateSignupData())
		{
			//NEED CREATE CLIENT QUERY

			header("Location:/login");
		}
	}

	public function validateSignupData()
	{
		//INSERT VALIDATION (AS NEEDED)
		$streetaddressregex = '(^\d+\s[a-zA-Z0-9\-\'\s]+$)';
		$postalcoderegex = '(^[a-zA-Z]{1}\d{1}[a-zA-Z]{1}\s*\d{1}[a-zA-Z]{1}\d{1}$)';
		$phoneregex = '(^\(*\d{3}\)*\s*-*\s*\d{3}\s*-*\s*\d{4}$)';
		$emailregex = '(^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$)';

		if(!preg_match($streetaddressregex, $_POST['street_address']))
			return false;
		if(!preg_match($postalcoderegex, $_POST['postal_code']))
			return false;
		else if(!preg_match($phoneregex, $_POST['phone']))
			return false;
		else if(!preg_match($emailregex, $_POST['email']))
			return false;

		return true;
	}
}

?>