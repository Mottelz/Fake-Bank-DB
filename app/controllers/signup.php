<?

class signup extends Controller 
{
	public function index() 
	{	
		$this->checkSignupData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->branches;

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

		return true;
	}
}

?>