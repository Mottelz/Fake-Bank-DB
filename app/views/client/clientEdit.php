<?
	$client = $data['client'];
	$client_id = $client->client_id;
	$client_branch_id = $client->branch_id;
	$first_name = $client->first_name;
	$last_name = $client->last_name;
	$street_address = $client->street_address;
	$join_date = $client->join_date;
	$email = $client->email;
	$phone = $client->phone;

	$address = $data['address'];
	$postal_code = $address->postal_code;
	$city = $address->city; 

	$branches = $data['branches'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<div>EDIT CLIENT</div>

	<br />

	<form method="POST" action="/client/edit/<?= $client_id ?>">
		<div>
			First Name<br />
			<input type="text" name="first_name" value="<?= $first_name ?>" required />
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name" value="<?= $last_name ?>" required />
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" required>
				<option disabled value="">---Select Branch---</option>
				<?
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branch_id = $branch->branch_id;
				?>
						<option <?= $client_branch_id == $branch_id ? 'selected' : ''; ?>><?= $branch_id ?></option>
				<?
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" value="<?= $street_address ?>" required />
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" value="<?= $city ?>" required />
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" value="<?= $postal_code ?>" required />
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" value="<?= $phone ?>" required />
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" value="<?= $email ?>" required />
		</div>

		<br />
		<button type="submit" name="editclient" value="true">Edit Client</button>
	</form>


	<br />

	<div><a href="/client">Go Back</a></div>
</body>
</html>