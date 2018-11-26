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

    public function getNextClientId() {
    	return $this->getData("SELECT Client_id FROM Client ORDER BY Client_id DESC")[0]->Client_id + 1;
    }

    public function insertClient($id, $branch_id, $first_name, $last_name, $birth_date, $join_date, $street_address, $password, $department, $email, $phone) {
    	$this->insertData("INSERT INTO Client (Client_id, Branch_id, First_name, Last_name, Birth_date, Join_date, Password, Street_address, Phone, Email) VALUES ("
    		. $id .
    		", " . $branch_id .
    		", '" . $first_name . "'" .
    		", '" . $last_name . "'" .
    		", '" . $birth_date . "'" .
    		", '" . $join_date . "'" .
    		", '" . $password . "'" .
    		", '" . $street_address . "'" .
    		", '" . $phone . "'" .
            ", '" . $email . "')");
    }

    public function updateClient($id, $branch_id, $first_name, $last_name, $birth_date, $join_date, $street_address, $department, $email, $phone) {
        $this->updateData("UPDATE Client SET " .
            "Branch_id = $branch_id" .
            ", First_name = '$first_name'" . 
            ", Last_name = '$last_name'" .
            ", Birth_date = '$birth_date'" .
            ", Join_date = '$join_date'" .
            ", Street_address = '$street_address'" .
            ", Department = '$department'" .
            ", Email = '$email'" .
            ", Phone = '$phone'");
    }

    public function updateClientById($id, $first_name, $last_name, $street_address, $email, $phone) {
        return $this->updateData("UPDATE Client SET ".
            "First_name='".$first_name.
            "', Last_name='".$last_name .
            "', Street_address='".$street_address.
            "', Email='".$email.
            "', Phone='".$phone.
            "' WHERE Client_id='".$id."'");
    }

    public function updateClientPassword($id, $password) {
        return $this->updateData("UPDATE Client SET password='".$password."' WHERE client_id='".$id."'");
    }


	function __construct()
	{
		$this->clients = json_decode($this->data)->Client;
	}
}

?>
