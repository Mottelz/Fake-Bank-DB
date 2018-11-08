<?
	$branches = $data['branches'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<div>ADD EMPLOYEE</div>

	<br />

	<form method="POST" action="/employee/add">
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
			Department<br />
			<input type="text" name="department" />
		</div>

		<br />

		<div>
			Title<br />
			<input type="text" name="title" required />
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

		<div>
			Salary<br />
			<input type="number" name="salary" step="0.01" required />
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" />
		</div>

		<br />

		<div>
			Active<br />
			<select required>
				<option selected value="true">Yes</option>
				<option value="false">No</option>
			</select>
		</div>

		<br />
		<button type="submit" name="addemployee" value="true">Add Employee</button>
	</form>


	<br />

	<div><a href="/employee">Go Back</a></div>
</body>
</html>