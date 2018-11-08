<?
	$employee = $data['employee'];
	$employee_id = $employee->employee_id;
	$first_name = $employee->first_name;
	$last_name = $employee->last_name;
	$employee_branch_id = $employee->branch_id;
	$department = $employee->department;
	$title = $employee->title;
	$street_address = $employee->street_address;
	$phone = $employee->phone;
	$email = $employee->email;
	$salary = $employee->salary;
	$start_date = $employee->start_date;
	$active = $employee->active;

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

	<div>EDIT EMPLOYEE</div>

	<br />

	<form method="POST" action="/employee/edit/<?= $employee_id ?>">
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
						<option <?= $employee_branch_id == $branch_id ? 'selected' : '' ?>><?= $branch_id ?></option>
				<?
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Department<br />
			<input type="text" name="department" value="<?= $department ?>" />
		</div>

		<br />

		<div>
			Title<br />
			<input type="text" name="title" value="<?= $title ?>" required />
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

		<div>
			Salary<br />
			<input type="number" name="salary" step="0.01" value="<?= $salary ?>" required />
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" value="<?= $start_date ?>" />
		</div>

		<br />

		<div>
			Active<br />
			<select required>
				<option value="true" <?= $active == true ? 'selected' : '' ?>>Yes</option>
				<option value="false" <?= $active == false ? 'selected' : '' ?>>No</option>
			</select>
		</div>

		<br />
		<button type="submit" name="editemployee" value="true">Edit Employee</button>
	</form>


	<br />

	<div><a href="/employee">Go Back</a></div>
</body>
</html>