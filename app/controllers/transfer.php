<?

class transfer extends Controller
{
	public function index()
	{
		$this->view('transfer/makeTransfer');
	}

	public function subHeader()
	{
		$this->view('transfer/transferHeader');
	}

	public function history()
	{
		$this->view('transfer/transferHistory');
	}
}

?>