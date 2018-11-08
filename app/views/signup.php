<?
	$branches = $data['branches'];
?>

<html>
<head>
</head>

<body>
	<div>CLIENT SIGN UP</div>

	<br />

	<form method="POST" action="/signup">
		<div>
			First Name<br />
			<input type="text" name="first_name" required />
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name" required />
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" required>
				<option selected disabled value="">---Select Branch---</option>
				<?
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branch_id = $branch->branch_id;
				?>
						<option><?= $branch_id ?></option>
				<?
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" required />
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" required />
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" required />
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" required />
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" required />
		</div>

		<br />

		<button type="submit" name="signup" value="true">Sign Up</button>
	</form>

	<br />

	<div><a href="/login">Go Back</a></div>
</body>
</html>