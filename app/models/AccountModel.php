<?php

class AccountModel extends Model
{
    public function getAccountsByUserId($id) {
        return $this -> getData("SELECT * FROM Account WHERE Client_id=" . $id);
    }

    public function getAccountById($id) {
        return $this -> getData("SELECT * FROM Account WHERE Account_id=" . $id);
    }

    public function getAllAccounts() {
        return $this->getData("SELECT * FROM Account");
    }

	public function updateAccountBalance($id, $amount){
		return $this->getData("UPDATE Account SET Balance=" . $amount . " WHERE Account_id=" . $id);
	}

  public function addAccountById($Account_id , $Client_id  , $Account_Option , $Account_Type ,
                                $Account_Service , $Balance , $Charge_Plan_Option , $Interest_Rate_Type ,
                                $Interest_Rate_Service ) {
      return $this->insertData("INSERT INTO Account (Account_id , Client_id , Account_Option,
                                                  Account_Type, Account_Service, Balance,
                                                  Charge_Plan_Option , Interest_Rate_Type, Interest_Rate_Service ) VALUES
                (" ."'" .   $Account_id
                  .", " .$Client_id
                  .", '" .$Account_Option
              .", '" .$Account_Type
              .", '" .$Account_Service
              .", '" . 0
              .", '" .$Charge_Plan_Option
              .", '" .$Interest_Rate_Type
              .", '" .$Interest_Rate_Service. "')");
  }

  public function getNextAccountId() {
    return $this->getData("SELECT Account_id  FROM Account ORDER BY Account_id DESC")[0]->Account_id + 1;
  }

}

?>
