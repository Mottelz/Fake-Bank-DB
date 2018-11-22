<?php

class CountryModel extends Model
{
	public $table = 'Country';
	public $countries;

	private $data = 
	'{
		"Country" : [{
			"city" : "City1",
			"country" : "Country1",
			"province" : "Province1"
		}, {
			"city" : "City2",
			"country" : "Country2",
			"province" : "Province2"
		}, {
			"city" : "City3",
			"country" : "Country3",
			"province" : "Province3"
		}]
	}';

	function __construct()
	{
		$this->countries = json_decode($this->data)->Country;
	}
}

?>