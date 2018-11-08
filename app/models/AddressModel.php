<?

class AddressModel
{
	public $table = 'Address';
	public $addresses;

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