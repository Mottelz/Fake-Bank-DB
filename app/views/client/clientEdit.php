<?php
	$client = $data['client'];
	$client_id = $client->Client_id;
	$client_branch_id = $client->Branch_id;
	$first_name = $client->First_name;
	$last_name = $client->Last_name;
	$street_address = $client->Street_address;
	$join_date = $client->Join_date;
	$email = $client->Email;
	$phone = $client->Phone;

	$address = $data['address'];
	$postal_code = $address->Postal_code;
	$city = $address->City;

	$countryObj = $data['country'];
	$province = $countryObj->Province;
	$country = $countryObj->Country;

	$branches = $data['branches'];
?>

<html>
<head>
		<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Edit Client #<?php 	echo $client_id ; ?></h2></div>

	<br />

	<form method="POST" action="/client/edit/<?= $client_id ?>">
		<div>
			First Name<br />
			<input type="text" name="first_name"  class="form-control" value="<?= $first_name ?>"  required style="width:auto;"/>
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name"  class="form-control" value="<?= $last_name ?>" required style="width:auto;" />
		</div>

		<br />

		<div>
			Branch #<br />


				 <select class="form-control" name="branch_id" style="width:auto;" required>

						<option disabled value="">---Select Branch---</option>
						<?php
							for($index = 0; $index < count($branches); $index++)
							{
								$branch = $branches[$index];
								$branch_id = $branch->branch_id;
						?>
								<option <?= $client_branch_id == $branch_id ? 'selected' : ''; ?>><?= $branch_id ?></option>
						<?php
							}
						?>
					</select>


		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address"  class="form-control" value="<?= $street_address ?>" required style="width:auto;" />
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city"  class="form-control" value="<?= $city ?>" required  style="width:auto;" />
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" class="form-control" value="<?= $postal_code ?>" required  style="width:auto;" />
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" class="form-control" value="<?= $phone ?>"  style="width:auto;" required />
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email"  class="form-control" value="<?= $email ?>" required style="width:auto;" />
		</div>

		<br />

		<button type="submit" name="editclient" class="btn btn-outline-info" value="true">Submit Edit</button>
	</form>

	<br />
	<br />
	<div><a href="/client"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>

</div>
</div>
</div>
</body>
</html>
