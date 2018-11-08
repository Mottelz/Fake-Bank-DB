<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<form method="POST" action="/account/new">
		<div>OPEN NEW ACCOUNT</div>

		<br />

		<div>
			Type<br />
			<select name="type" required>
				<option selected disabled value="">---Select Type---</option>
				<option>Checking</option>
				<option>Savings</option>
				<option>Investment</option>
				<option>...</option>
			</select>
		</div>

		<br />

		<div>
			Option<br />
			<select name="option" required>
				<option selected disabled value="">---Select Option---</option>
				<option>Option 1</option>
				<option>Option 2</option>
				<option>Option 3</option>
			</select>
		</div>

		<br />

		<div>
			Service<br />
			<select name="service" required>
				<option selected disabled value="">---Select Service---</option>
				<option>Service 1</option>
				<option>Service 2</option>
				<option>Service 3</option>
			</select>
		</div>

		<br />

		<button type="submit" name="openaccount" value="true">Open New Account</button>
	</form>
	<br />

	<div><a href="/account">Go Back</a></div>
</body>
</html>