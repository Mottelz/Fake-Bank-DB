<?php
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

	<div><h2>Add New Client</h2></div>

	<br />

	<form method="POST" action="/client/add">
		<div>
			First Name<br />
			<input type="text" class="form-control" name="first_name" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" class="form-control" name="last_name" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Birth Date<br />
			<input type="date" class="form-control" name="birth_date" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" class="form-control" required style="width:auto;">
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
			<input type="text" class="form-control" name="street_address" required style="width:auto;"/>
		</div>

		<br />
	
		<div>
			Postal Code<br />
			<input type="text" class="form-control" name="postal_code" required style="width:auto;"/>
		</div>
		
		<br />

		<div>
			City<br />
			<input type="text" class="form-control" name="city" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Province<br />
			<input type="text" class="form-control" name="province" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Country<br />
			<input type="text" class="form-control" name="country" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" class="form-control" name="phone" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" class="form-control" name="email" required style="width:auto;"/>
		</div>

		<br />

		<button type="submit" class="btn btn-outline-success" name="addclient" value="true">Add Client</button>
	</form>

	<br />

	<div><a href="/client"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
	<br />
</div>
</div>
</div>
</body>
</html>
