<?php

class AddressModel extends Model
{
	public $table = 'Address';
	public $addresses;

	public function getAllAddresses() {
        return $this->getData("SELECT * FROM Address");
    }

    public function getAddressByCity($city) {
        return $this->getData("SELECT * FROM Address WHERE city='" . $city."'");
    }

    public function getAddressByPostal($postal) {
        return $this->getData("SELECT * FROM Address WHERE postal_code='" . $postal."'");
    }

    public function getAddressByStreet($street) {
        return $this->getData("SELECT * FROM Address WHERE street_address='" . $street ."'");
    }

	private $data = 
	'{
		"Address" : [{
			"street_address" : "Address1",
			"postal_code" : "A1A 1A1",
			"city" : "City1"
		}, {
			"street_address" : "Address2",
			"postal_code" : "B2B 2B2",
			"city" : "City2"
		}, {
			"street_address" : "Address3",
			"postal_code" : "C3C 3C3",
			"city" : "City3"
		}]
	}';

	function __construct()
	{
		$this->addresses = json_decode($this->data)->Address;
	}
}

?>