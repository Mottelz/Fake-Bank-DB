<?php
	$branches = $data['branches'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Add New Employee</h2></div>

	<br />

	<form method="POST" action="/employee/add">
		<div>
			First Name<br />
			<input type="text" name="first_name" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" required class="form-control" required style="width:auto;">
				<option selected disabled value="">---Select Branch---</option>
				<?php
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branch_id = $branch->branch_id;
				?>
						<option><?= $branch_id ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Department<br />
			<input type="text" name="department" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Title<br />
			<input type="text" name="title" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Salary<br />
			<input type="number" name="salary" step="0.01" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Active<br />
			<select required class="form-control" required style="width:auto;">
				<option selected value="true">Yes</option>
				<option value="false">No</option>
			</select>
		</div>

		<br />

		<button type="submit" name="addemployee" value="true" class="btn btn-outline-success" >Add Employee</button></button>
	</form>

	<br />

	<div><a href="/employee"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
</br>
</div>
</div>
</div>
</body>
</html>
