<?

class employee extends Controller
{
	public function index()
	{
		$this->checkIsLoggedIn();

		$employeeModel = $this->model('EmployeeModel');
		$employees = $employeeModel->getAllEmployees();

		$this->view('employee/employeeSummary', ['employees' => $employees]);
	}

	public function details($employee_id)
	{
		$employeeModel = $this->model('EmployeeModel');
		$employee = $employeeModel->getEmployeeById($employee_id)[0];

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->getAddressByStreet($employee->Employee_street_address)[0];

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->countries[0]; //Arbitrary country (NEED QUERY FOR city)

		$scheduleModel = $this->model('ScheduleModel');
		$schedules = $scheduleModel->schedules; //All schedules (NEED QUERY FOR employee_id)

		$this->view('employee/employeeDetails', 
			['employee' => $employee,
			 'address' => $address,
			 'country' => $country,
			 'schedules' => $schedules]);
	}

	public function add()
	{
		$this->checkAddEmployeeData();

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->branches;

		$this->view('employee/employeeAdd', ['branches' => $branches]);
	}

	public function edit($employee_id)
	{
		$this->checkEditEmployeeData();

		$employeeModel = $this->model('EmployeeModel');
		$employee = $employeeModel->employees[0]; //Arbitrary employee (NEED QUERY FOR employee_id)

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->addresses[0]; //Arbitrary address (NEED QUERY FOR street_address)

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->branches;

		$this->view('employee/employeeEdit',
			['employee' => $employee,
			 'address' => $address,
			 'branches' => $branches]);
	}

	public function addSchedule($employee_id)
	{
		$this->checkAddToScheduleData($employee_id);

		$this->view('employee/addSchedule', ['employee_id' => $employee_id]);
	}

	public function editDay($sched_id)
	{

		$scheduleModel = $this->model('ScheduleModel');
		$schedule = $scheduleModel->schedules[0]; //Arbitrary schedule (NEED QUERY FOR sched_id)
		
		$this->checkEditDayData($schedule->employee_id, $sched_id);

		$this->view('employee/editDay', ['schedule' => $schedule]);
	}

	public function checkAddEmployeeData()
	{
		if(isset($_POST['addemployee']) && $this->validateAddEmployeeData())
		{
			//NEED ADD EMPLOYEE QUERY

			header("Location:/employee");
		}
	}

	public function checkEditEmployeeData()
	{
		if(isset($_POST['editemployee']) && $this->validateEditEmployeeData())
		{
			//NEED EDIT EMPLOYEE QUERY
			
			header("Location:/employee");
		}
	}

	public function checkAddToScheduleData($employee_id)
	{
		if(isset($_POST['addtoschedule']) && $this->validateAddToScheduleData())
		{
			//NEED ADD TO SCHEDULE QUERY
			
			header("Location:/employee/details/$employee_id");
		}
	}

	public function checkEditDayData($employee_id, $sched_id)
	{
		if(isset($_POST['editday']) && $this->validateEditDayData())
		{
			//NEED EDIT SCHEDULE QUERY

			header("Location:/employee/details/$employee_id");
		}
	}

	public function validateAddEmployeeData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateEditEmployeeData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateAddToScheduleData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}

	public function validateEditDayData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}
}

?>