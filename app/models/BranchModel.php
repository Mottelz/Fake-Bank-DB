<?php

class BranchModel extends Model
{
	public $table = 'Branch';
	public $branches;

	public function getAllBranches() {
	    return $this->getData("SELECT * FROM Branch");
    }

    public function getBranchById($id) {
        return $this->getData("SELECT * FROM Branch WHERE branch_id=" . $id);
    }

    public function getBranchByManagerId($id) {
        return $this->getData("SELECT * FROM Branch WHERE manager_id=" . $id);
    }

    function payrollByBranch($branch_id) {
    return $this->getData("SELECT Salary FROM Employee WHERE Active=1 AND Branch_id=".$branch_id);
    }

    function payrollByCity($city) {
        return $this->getData("SELECT e.Salary, City FROM Address_Table t INNER JOIN Employee e ON t.Street_address = e.Street_address WHERE t.City='".$city."' AND e.Active=1");
    }

    function payroll() {
		return $this->getData("SELECT Salary FROM Employee WHERE Active=1");
    }


	function __construct()
	{
		$this->branches = json_decode($this->data)->Branch;
	}
}

?>
