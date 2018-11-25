<?php
	$user = $data['user'];
	$login_type = $data['login_type'];
	$user_id = $login_type == 'Client' ? $user->client_id : $user->employee_id;
	$branch_id = $user->Branch_id;
	$first_name = $user->First_name;
	$last_name = $user->Last_name;
	$street_address = $user->Street_address;
	$email = $user->Email;
	$phone = $user->Phone;

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
<p><?php var_dump($data)?></p>
<br>
<p><?php var_dump($address)?></p>
<br>
<p><?php var_dump($countryT)?></p>
<br>
<p><?php var_dump($user)?></p>
	<div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">

	<br />

	<div><h2>Contact Information</div>

	<br />
	<table class="table table-striped">
	<tr><th>Name: <?= $first_name ?> <?= $last_name ?></th></tr>
	<tr><th>Street Address: <?= $street_address ?></tr>
	<tr><th>City: <?= $city ?></tr>
	<tr><th>Province: <?= $province ?></tr>
	<tr><th>Postal Code: <?= $postal_code ?></tr>
	<tr><th>Phone: <?= $phone ?></tr>
	<tr><th>Email: <?= $email ?></tr>
	</table>
	<br />

	<div><a href="/profile/edit"><button type="submit" class="btn btn-outline-info" value="true">Edit Contact Information</button></a></div>

	<br />

	<div><a href="/profile/changePassword"><button type="submit" class="btn btn-outline-secondary" value="true">Change Password</button></a></div>
<br />
</div>
</div>
</div>
</body>
</html>
