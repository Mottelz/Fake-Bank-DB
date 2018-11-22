<?php

class EmployeeModel extends Model
{
	public $table = 'Employee';
	public $employees;

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