<?
	$user = $data['user'];
	$login_type = $data['login_type'];
	$user_id = $login_type == 'Client' ? $user->client_id : $user->employee_id;
	$branch_id = $user->branch_id;
	$first_name = $user->first_name;
	$last_name = $user->last_name;
	$street_address = $user->street_address;
	$email = $user->email;
	$phone = $user->phone;

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

	<div>CONTACT INFORMATION</div>

	<br />

	<div>Name: <?= $first_name ?> <?= $last_name ?></div>
	<div>Street Address: <?= $street_address ?></div>
	<div>City: <?= $city ?></div>
	<div>Province: <?= $province ?></div>
	<div>Postal Code: <?= $postal_code ?></div>
	<div>Phone: <?= $phone ?></div>
	<div>Email: <?= $email ?></div>

	<br />

	<div><a href="/profile/edit">Edit Contact Information</a></div>

	<br />

	<div><a href="/profile/changePassword">Change Password</a></div>
</body>
</html>