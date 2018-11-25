<?php

class AddressModel extends Model
{
	public $table = 'Address';
	public $addresses;

	public function getAllAddresses() {
        return $this->getData("SELECT * FROM Address_Table");
    }

    public function getAddressByCity($city) {
        return $this->getData("SELECT * FROM Address_Table WHERE City='" . $city."'");
    }

    public function getAddressByPostal($postal) {
        return $this->getData("SELECT * FROM Address_Table WHERE Postal_code='" . $postal."'");
    }

    public function getAddressByStreet($street) {
        return $this->getData("SELECT * FROM Address_Table WHERE Street_address='".$street."'");
    }

    public function insertAddress($street, $postal, $city) {
        $this->insertData("INSERT INTO Address_Table (Street_address, Postal_code, City) VALUES (" .
            "'" . $street . "'" .
            ", '" . $postal . "'" .
            ", '" . $city . "')");
    }



//	private $data =
//	'{
//		"Address" : [{
//			"street_address" : "Address1",
//			"postal_code" : "A1A 1A1",
//			"city" : "City1"
//		}, {
//			"street_address" : "Address2",
//			"postal_code" : "B2B 2B2",
//			"city" : "City2"
//		}, {
//			"street_address" : "Address3",
//			"postal_code" : "C3C 3C3",
//			"city" : "City3"
//		}]
//	}';

//	function __construct()
//	{
//		$this->addresses = json_decode($this->data)->Address;
//	}
}

?>
