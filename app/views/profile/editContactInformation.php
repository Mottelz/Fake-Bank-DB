<?php
	$user = $data['user'];
	$login_type = $data['login_type'];
	$user_id = $login_type == 'Client' ? $user->Client_id : $user->Employee_id;
	$branch_id = $user->Branch_id;
	$first_name = $user->First_name;
	$last_name = $user->Last_name;
	$street_address = $user->Street_address;
	$join_date = $user->Join_date;
	$email = $user->Email;
	$phone = $user->Phone;

	$address = $data['address'];
	$postal_code = $address->Postal_code;
	$city = $address->City;

    $country = $data['country']->Country;
    $province = $data['country']->Province;
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg); resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Edit Contact Information</h2></div>

	<br />

	<form method="POST" action="/profile/edit">
		<div>
			First Name<br />
			<input type="text" name="first_name" value="<?= $first_name ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name" value="<?= $last_name ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" value="<?= $street_address ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" value="<?= $city ?>" required class="form-control" style="width:auto;"/>
		</div>

        <br />

        <div>
            Province<br />
            <input type="text" name="province" value="<?= $province ?>" required class="form-control" style="width:auto;"/>
        </div>

        <br />

        <div>
            Country<br />
            <input type="text" name="country" value="<?= $country ?>" required class="form-control" style="width:auto;"/>
        </div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" value="<?= $postal_code ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" value="<?= $phone ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" value="<?= $email ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="editcontactinformation" class="btn btn-outline-success" value="true">Edit Contact Information</button>
	</form>

	<br />

	<div><a href="/profile"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
		<br />
	</div>
	</div>
	</div>
</body>
</html>
