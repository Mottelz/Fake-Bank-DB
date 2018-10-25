<?

class profile extends Controller
{
	public function index()
	{
		$this->view('profile/contactInformation');
	}

	public function changePassword()
	{
		$this->view('profile/changePassword');
	}
}

?>