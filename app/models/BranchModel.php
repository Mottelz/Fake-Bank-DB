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


	function __construct()
	{
		$this->branches = json_decode($this->data)->Branch;
	}
}

?>
