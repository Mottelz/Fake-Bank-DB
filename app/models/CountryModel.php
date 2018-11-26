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
        $this->insertData("INSERT INTO Country (City, Province, Country) VALUES (" . 
            "'" . $city . "'" .
            ", '" . $province . "'" .
            ", '" . $country . "')");
    }

    public function updateCityByStreet($street){

    }

//	private $data =
//	'{
//		"Country" : [{
//			"city" : "City1",
//			"country" : "Country1",
//			"province" : "Province1"
//		}, {
//			"city" : "City2",
//			"country" : "Country2",
//			"province" : "Province2"
//		}, {
//			"city" : "City3",
//			"country" : "Country3",
//			"province" : "Province3"
//		}]
//	}';
//
//	function __construct()
//	{
//		$this->countries = json_decode($this->data)->Country;
//	}
}

?>