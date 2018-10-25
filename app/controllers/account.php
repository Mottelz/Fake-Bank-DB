<?

class account extends Controller
{
	public function index()
	{
		$this->view('account/accountSummary');
	}

	public function new()
	{
		$this->view('account/openAccount');
	}

	public function details()
	{
		$this->view('account/accountDetails');
	}
}

?>