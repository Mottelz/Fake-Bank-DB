<?php
	$branches = $data['branches'];
?>

<html>
<head>
</head>

<body>
	<div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">

	<div>New Client Sign Up</div>

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
			Birth Date<br />
			<input type="date" name="birth_date" required />
		</div>

		<br />

		<div>
			Password<br />
			<input type="password" name="password" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" required>
				<option selected disabled value="">---Select Branch---</option>
				<?php
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branch_id = $branch->Branch_id;
				?>
						<option><?= $branch_id ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Province<br />
			<input type="text" name="province" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Country<br />
			<input type="text" name="country" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="signup" value="true">Sign Up</button>
	</form>

	<br />

	<div><a href="/login"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
</div>
</div>
</div>
</body>
</html>
