<?php

class ClientModel extends Model
{
	public $table = 'Client';
	public $clients;

	public function getAllClients() {
	    return $this->getData("SELECT * FROM Client");
    }

    public function getClientById($id) {
        return $this->getData("SELECT * FROM Client WHERE Client_id=" . $id);
    }

    public function getClientByBranchId($id) {
        return $this->getData("SELECT * FROM Client WHERE Branch_id=" . $id);
    }

    public function insertClient($id, $branch_id, $first_name, $last_name, $birth_date, $join_date, $street_address, $password, $department, $email, $phone) {
    	$this->getData("INSERT INTO Client (Client_id, Branch_id, First_name, Last_name, Birth_date, Join_date) VALUES ("
    		. $id .
    		", " . $branch_id .
    		", '" . $first_name . "'" .
    		", '" . $last_name . "')");
    }

    public function updateClientById($id, $branch_id, $first_name, $last_name, $street_address, $password, $department, $email, $phone) {
        return $this->getData("UPDATE Client SET Branch_id='".$branch_id.
            "', First_name='".$first_name.
            "', Last_name='".$last_name .
            "', Street_address='".$street_address.
            "', Password='".$password.
            "', Department='".$department.
            "', Email='".$email.
            "', Phone='".$phone.
            "' WHERE Client_id='".$id."'");
    }

    public function updateClientPassword($id, $password) {
        return $this->getData("UPDATE Client SET password='".$password."' WHERE client_id='".$id."'");
    }


	private $data = 
	'{
		"Client" : [{
			"client_id" : 1,
			"branch_id" : 1,
			"first_name" : "First1",
			"last_name" : "Last1",
			"street_address" : "Address1",
			"password" : "Password1",
			"join_date" : "2018-01-11",
			"department" : "Department1",
			"email" : "Email1",
			"phone" : 1111111111
		}, {
			"client_id" : 2,
			"branch_id" : 2,
			"first_name" : "First2",
			"last_name" : "Last2",
			"street_address" : "Address2",
			"password" : "Password2",
			"join_date" : "2018-02-12",
			"department" : "Department2",
			"email" : "Email2",
			"phone" : 2222222222
		}, {
			"client_id" : 3,
			"branch_id" : 3,
			"first_name" : "First3",
			"last_name" : "Last3",
			"street_address" : "Address3",
			"password" : "Password3",
			"join_date" : "2018-03-13",
			"department" : "Department3",
			"email" : "Email3",
			"phone" : 3333333333
		}]
	}';

	function __construct()
	{
		$this->clients = json_decode($this->data)->Client;
	}
}

?>