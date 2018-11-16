<html>
<head>
	<?= $this->header() ?>
</head>

<body>
	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize: both;">
		<div class="container">
			<div class="col-md-8">

	<br />

	<form method="POST" action="/account/new">
		<div>Open A New Account</div>

		<div class="form-group" style="display: inline-block">	 Type
			<select name="type" class="form-control" required>
				<option selected disabled value="">---Select Type---</option>
				<option>Checking</option>
				<option>Savings</option>
				<option>Investment</option>
				<option>...</option>
			</select>
		</div>

		<br />

		<div class="form-group" style="display: inline-block">
			Option<br />
			<select name="option" class="form-control" required>
				<option selected disabled value="">---Select Option---</option>
				<option>Option 1</option>
				<option>Option 2</option>
				<option>Option 3</option>
			</select>
		</div>

		<br />

		<div class="form-group" style="display: inline-block">
			Service<br />
			<select name="service" class="form-control" required>
				<option selected disabled value="">---Select Service---</option>
				<option>Service 1</option>
				<option>Service 2</option>
				<option>Service 3</option>
			</select>
		</div>

		<br />

		<button type="submit" name="openaccount" value="true" class="btn btn-outline-success">Open New Account</button>
	</form>
	<br />

	<div><a href="/account"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
	</br>
</div>
</div>
</div>
</body>
</html>
