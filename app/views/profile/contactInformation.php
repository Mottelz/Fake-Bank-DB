<?php
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
	<?= $this->header() ?>
</head>

<body>
<p><?php var_dump($data)?> <br> <?php var_dump($user)?></p>
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
