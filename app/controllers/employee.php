<?
require_once 'app/core/Automation.php';
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
		$address = $addressModel->getAddressByStreet($employee->Street_address)[0];

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->getCityByCity($address->City)[0];

		$scheduleModel = $this->model('ScheduleModel');
		$schedules = $scheduleModel->getScheduleByEmployeeId($employee->Employee_id);

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
		$branches = $branchModel->getAllBranches();

		$this->view('employee/employeeAdd', ['branches' => $branches]);
	}

	public function edit($employee_id)
	{
		$this->checkEditEmployeeData($employee_id);

		$employeeModel = $this->model('EmployeeModel');
		$employee = $employeeModel->getEmployeeById($employee_id)[0];

		$addressModel = $this->model('AddressModel');
		$address = $addressModel->getAddressByStreet($employee->Street_address)[0];

		$countryModel = $this->model('CountryModel');
		$country = $countryModel->getCityByCity($address->City)[0];

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();


		$this->view('employee/employeeEdit',
			['employee' => $employee,
			 'address' => $address,
			 'country' => $country,
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
		$schedule = $scheduleModel->getScheduleById($sched_id)[0];

		$this->checkEditDayData($sched_id);

		$this->view('employee/editDay', ['schedule' => $schedule]);
	}

	public function bankInfo()
	{
		$automation = new Automation();
		if($_POST['city']){
				$monthlyPayrollByCity = $automation->monthlyPayrollByCity($_POST['city']);//query
				$annualLossesByCity = $automation->annualLossesByCity($_POST['city']);//query
		//		$annualProfitsByCity = $automation->annualProfitsByCity($_POST['city']);//query
		}else {
			$monthlyPayrollByCity = null;
			$annualLossesByCity = null;
		//	$annualProfitsByCity = null;
		}
		if($_POST['branch']){
			$monthlyPayrollByBranch = $automation->monthlyPayrollByBranch($_POST['branch']);//query
			$annualLossesByBranch = $automation->annualLossesByBranch($_POST['branch']);//query
		//	$annualProfitsByBranch = $automation->annualProfitsByBranch($_POST['branch']);//query
		}else {
			$monthlyPayrollByBranch = null;
			$annualLossesByBranch = null;
		//	$annualProfitsByBranch = null;
		}

		$monthlyPayroll = $automation->monthlyPayroll();//query
		$annualLosses = $automation->annualLosses();//query
		//$annualProfits = $automation->annualProfits();//query
		//$processPayments = $automation->processPayments() {

		$branchModel = $this->model('BranchModel');
		$branches = $branchModel->getAllBranches();

		$countryModel = $this->model('CountryModel');
		$city = $countryModel->getAllUniqueCities();
		//var_dump($city);
		$this->view('employee/checkBankInfo', [
			'monthlyPayroll' => $monthlyPayroll,
			'monthlyPayrollByCity' => $monthlyPayrollByCity,
			'monthlyPayrollByBranch' => $monthlyPayrollByBranch,
			'annualLosses' => $montannualLosseshlyPayroll,
			'annualLossesByBranch' => $annualLossesByBranch,
			'annualLossesByCity' => $annualLossesByCity,
			//'annualProfits' => $annualProfits,
			//'annualProfitsByBranch' => $annualProfitsByBranch,
			//'annualProfitsByCity' => $annualProfitsByCity,
			'city' => $city,
			'branches' => $branches
			//'processPayments' => $processPayments
		]);
	}

	public function checkAddEmployeeData()
	{
		if(isset($_POST['addemployee']) && $this->validateAddEmployeeData())
		{
			$employeeModel = $this->model('EmployeeModel');

			$employeeID = $employeeModel->getNextEmployeeId();
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$password = $_POST['password'];
			$branchID = $_POST['branch_id'];
			$department = $_POST['department'];
			$title = $_POST['title'];
			$startDate = $_POST['start_date'];
			$birthDate = $_POST['birth_date'];
			$streetAddress = $_POST['street_address'];
			$postalCode = $_POST['postal_code'];
			$city = $_POST['city'];
			$province = $_POST['province'];
			$country = $_POST['country'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$salary = $_POST['salary'];
			$active = $_POST['active'];

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

			// Insert new employee
			$employeeModel->insertEmployee($employeeID, $firstName, $lastName, $password, $branchID, $department, $title, $startDate, $birthDate, $streetAddress, $phone, $email, $salary, $active);

			header("Location:/employee");
		}
	}

	public function checkEditEmployeeData($employee_id)
	{
		if(isset($_POST['editemployee']) && $this->validateEditEmployeeData())
		{
			$employeeModel = $this->model('EmployeeModel');

			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$password = $_POST['password'];
			$branchID = $_POST['branch_id'];
			$department = $_POST['department'];
			$title = $_POST['title'];
			$startDate = $_POST['start_date'];
			$birthDate = $_POST['birth_date'];
			$streetAddress = $_POST['street_address'];
			$postalCode = $_POST['postal_code'];
			$city = $_POST['city'];
			$province = $_POST['province'];
			$country = $_POST['country'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$salary = $_POST['salary'];
			$active = $_POST['active'];

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

			// Update employee
			$employeeModel->updateEmployee($employee_id, $firstName, $lastName, $branchID, $department, $title, $startDate, $birthDate, $streetAddress, $phone, $email, $salary, $active);

			header("Location:/employee");
		}
	}

	public function checkAddToScheduleData($employee_id)
	{
		if(isset($_POST['addtoschedule']) && $this->validateAddToScheduleData())
		{
			$scheduleModel = $this->model('ScheduleModel');

			$schedID = $scheduleModel->getNextSchedId();
			$schedType = $_POST['sched_type'];
			$date = $_POST['date'];

			$scheduleModel->insertSchedule($schedID, $employee_id, $schedType, $date);

			header("Location:/employee/details/$employee_id");
		}
	}

	public function checkEditDayData($sched_id)
	{
		if(isset($_POST['editday']) && $this->validateEditDayData())
		{
			$scheduleModel = $this->model('ScheduleModel');

			$schedType = $_POST['sched_type'];
			$date = $_POST['date'];

			$scheduleModel->updateSchedule($sched_id, $schedType, $date);

			$employee_id = $scheduleModel->getScheduleById($sched_id)[0]->Employee_id;
			header("Location:/employee/details/$employee_id");
		}
	}

	public function validateAddEmployeeData()
	{
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
		else if($_POST['salary'] <= 0)
			return false;

		return true;
	}

	public function validateEditEmployeeData()
	{
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
		else if($_POST['salary'] <= 0)
			return false;

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
