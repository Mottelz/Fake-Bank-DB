<?php

class EmployeeModel extends Model
{
	public $table = 'Employee';
	public $employees;

	public function getAllEmployees(){
	    return $this->getData("SELECT * FROM Employee");
    }

    public function getEmployeeById($id) {
	    return $this->getData("SELECT * FROM Employee WHERE employee_id=" . $id);
    }

    public function getEmployeeByBranch($id) {
        return $this->getData("SELECT * FROM Employee WHERE branch_id=" . $id);
    }

    public function getNextEmployeeId() {
        return $this->getData("SELECT Employee_id FROM Employee ORDER BY Employee_id DESC")[0]->Employee_id + 1;
    }

    public function insertEmployee($id, $first_name, $last_name, $password, $branch_id, $department, $title, $start_date, $birth_date, $street_address, $phone, $email, $salary, $active) {
    	$this->insertData("INSERT INTO Employee (Employee_id, First_name, Last_name, Employee_password, Branch_id, Department, Title, Employee_start_date, Birth_date, Street_address, Phone, Email, Salary, Active) VALUES (" .
    		$id . 
    		", '" . $first_name . "'" .
    		", '" . $last_name . "'" .
    		", '" . $password . "'" .
    		", " . $branch_id .
    		", '" . $department . "'" .
    		", '" . $title . "'" .
    		", '" . $start_date . "'" .
    		", '" . $birth_date . "'" .
    		", '" . $street_address . "'" .
    		", " . $phone .
    		", '" . $email . "'" .
    		", " . $salary .
    		", " . $active . ")");
    }

    public function updateEmployeeById($id, $first_name, $last_name, $street_address, $email, $phone) {
        return $this->getData("UPDATE Employee SET ".
            "First_name='".$first_name.
            "', Last_name='".$last_name.
            "', Street_address='".$street_address.
            "', Email='".$email.
            "', Phone='".$phone.
            "' WHERE Employee_id='".$id."'");
    }

    public function updateEmployeePassword($id, $password) {
        return $this->getData("UPDATE Client SET Employee_password='".$password."' WHERE Employee_id='".$id."'");
    }

	private $data = 
	'{
		"Employee" : [{
			"employee_id" : 1,
			"branch_id" : 1,
			"department" : "Department1",
			"title" : "Title1",
			"first_name" : "First1",
			"last_name" : "Last1",
			"salary" : 1000,
			"street_address" : "Address1",
			"phone" : 1111111111,
			"email" : "Email1",
			"start_date" : "2018-01-11",
			"active" : true
		}, {
			"employee_id" : 2,
			"branch_id" : 2,
			"department" : "Department2",
			"title" : "Title2",
			"first_name" : "First2",
			"last_name" : "Last2",
			"salary" : 2000,
			"street_address" : "Address2",
			"phone" : 2222222222,
			"email" : "Email2",
			"start_date" : "2018-02-12",
			"active" : true
		}, {
			"employee_id" : 3,
			"branch_id" : 3,
			"department" : "Department3",
			"title" : "Title3",
			"first_name" : "First3",
			"last_name" : "Last3",
			"salary" : 3000,
			"street_address" : "Address3",
			"phone" : 3333333333,
			"email" : "Email3",
			"start_date" : "2018-03-13",
			"active" : true
		}]
	}';

	function __construct()
	{
		$this->employees = json_decode($this->data)->Employee;
	}
}

?>