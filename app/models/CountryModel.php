<?php

class CountryModel extends Model
{
	public $table = 'Country';
	public $countries;

	public function getAllCities() {
	    return $this->getData("SELECT * FROM Country");
    }

    public function getCityByProvince($province) {
        return $this->getData("SELECT * FROM Country WHERE province='".$province."'");
    }

    public function getCityByCountry($country) {
        return $this->getData("SELECT * FROM Country WHERE country='".$country."'");
    }

    public function getCityByCity($city) {
        return $this->getData("SELECT * FROM Country WHERE city='".$city."'");
    }

    public function insertCountry($city, $province, $country) {
        $this->insertData("INSERT IGNORE INTO Country (City, Province, Country) VALUES (" .
            "'" . $city . "'" .
            ", '" . $province . "'" .
            ", '" . $country . "')");
    }

}

?>
