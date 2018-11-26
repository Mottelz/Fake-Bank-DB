<?php
	$client = $data['client'];
	$client_id = $client->Client_id;
	$branch_id = $client->Branch_id;
	$first_name = $client->First_name;
	$last_name = $client->Last_name;
	$street_address = $client->Street_address;
	$join_date = $client->Join_date;
	$email = $client->Email;
	$phone = $client->Phone;

	$address = $data['address'];
	$postal_code = $address->Postal_code;
	$city = $address->City;

	$countryT = $data['country'];
	$country = $countryT->Country;
	$province = $countryT->Province;
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>
	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">


	<br />

	<div><h2>Client Details</h2></div>

	<br />
<table class="table table-striped">
	<tr><th>Client #: <?= $client_id ?></th></tr>
	<tr><th>Branch #: <?= $branch_id ?></th></tr>
	<tr><th>Name: <?= "$first_name $last_name" ?></th></tr>
	<tr><th>Street Address: <?= $street_address ?></th></tr>
	<tr><th>City: <?= $city ?></th></tr>
	<tr><th>Province: <?= $province ?></th></tr>
	<tr><th>Postal Code: <?= $postal_code ?></th></tr>
	<tr><th>Phone: <?= $phone ?></th></tr>
	<tr><th>Email: <?= $email ?></th></tr>
	<tr><th>Join Date: <?= $join_date ?></th></tr>
</table>
	<br />

	<div><a href="/client"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
<br />
</div>
</div>
</div>
</body>
</html>
