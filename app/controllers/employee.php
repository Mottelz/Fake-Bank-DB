<?

class employee extends Controller
{
	public function index()
	{
		$this->view('employee/employeeSummary');
	}

	public function details()
	{
		$this->view('employee/employeeDetails');
	}

	public function add()
	{
		$this->view('employee/employeeAdd');
	}

	public function edit()
	{
		$this->view('employee/employeeEdit');
	}
}

?>