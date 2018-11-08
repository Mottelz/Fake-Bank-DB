<?
	$client = $data['client'];
	$client_id = $client->client_id;
	$branch_id = $client->branch_id;
	$first_name = $client->first_name;
	$last_name = $client->last_name;
	$street_address = $client->street_address;
	$join_date = $client->join_date;
	$email = $client->email;
	$phone = $client->phone;

	$address = $data['address'];
	$postal_code = $address->postal_code;
	$city = $address->city; 

	$countryT = $data['country'];
	$country = $countryT->country;
	$province = $countryT->province;
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>CLIENT DETAILS</div>

	<br />

	<div>Client #: <?= $client_id ?></div>
	<div>Branch #: <?= $branch_id ?></div>
	<div>Name: <?= "$first_name $last_name" ?></div>
	<div>Street Address: <?= $street_address ?></div>
	<div>City: <?= $city ?></div>
	<div>Province: <?= $province ?></div>
	<div>Postal Code: <?= $postal_code ?></div>
	<div>Phone: <?= $phone ?></div>
	<div>Email: <?= $email ?></div>
	<div>Join Date: <?= $join_date ?></div>

	<br />

	<div><a href="/client">Go Back</a></div>
</body>
</html>