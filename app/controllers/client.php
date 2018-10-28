<?

class client extends Controller
{
	public function index()
	{
		$this->view('client/clientSummary');
	}

	public function details()
	{
		$this->view('client/clientDetails');
	}

	public function add()
	{
		$this->view('client/clientAdd');
	}

	public function edit()
	{
		$this->view('client/clientEdit');
	}
}

?>