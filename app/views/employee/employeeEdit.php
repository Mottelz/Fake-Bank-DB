<?php
	$employee = $data['employee'];
	$employee_id = $employee->Employee_id;
	$first_name = $employee->First_name;
	$last_name = $employee->Last_name;
	$employee_branch_id = $employee->Branch_id;
	$department = $employee->Department;
	$title = $employee->Title;
	$start_date = $employee->Start_date;
	$birth_date = $employee->Birth_date;
	$street_address = $employee->Street_address;
	$phone = $employee->Phone;
	$email = $employee->Email;
	$salary = $employee->Salary;
	$active = $employee->Active;

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
</head>

<body>
	<?= $this->header() ?>
	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Edit Employee</h2></div>

	<br />

	<form method="POST" action="/employee/edit/<?= $employee_id ?>">
		<div>
			First Name<br />
			<input type="text" name="first_name" value="<?= $first_name ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Last Name<br />
			<input type="text" name="last_name" value="<?= $last_name ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Branch #<br />
			<select name="branch_id" required class="form-control" required style="width:auto;">
				<option disabled value="">---Select Branch---</option>
				<?php
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branch_id = $branch->Branch_id;
				?>
						<option <?= $employee_branch_id == $branch_id ? 'selected' : '' ?>><?= $branch_id ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Department<br />
			<input type="text" name="department" value="<?= $department ?>" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Title<br />
			<input type="text" name="title" value="<?= $title ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" value="<?= $start_date ?>" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Birth Date<br />
			<input type="date" name="birth_date" value="<?= $birth_date ?>" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Street Address<br />
			<input type="text" name="street_address" value="<?= $street_address ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Postal Code<br />
			<input type="text" name="postal_code" value="<?= $postal_code ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			City<br />
			<input type="text" name="city" value="<?= $city ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Province<br />
			<input type="text" name="province" value="<?= $province ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Country<br />
			<input type="text" name="country" value="<?= $country ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Phone<br />
			<input type="text" name="phone" value="<?= $phone ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Email<br />
			<input type="text" name="email" value="<?= $email ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Salary<br />
			<input type="number" name="salary" step="0.01" value="<?= $salary ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Active<br />
			<select required class="form-control" required style="width:auto;">
				<option value="true"  <?= $active == true ? 'selected' : '' ?>>Yes</option>
				<option value="false" <?= $active == false ? 'selected' : '' ?>>No</option>
			</select>
		</div>

		<br />

		<button type="submit" name="editemployee" class="btn btn-outline-success" value="true">Edit Employee</button>
	</form>

	<br />

	<div><a href="/employee"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
</br>
</div>
</div>
</div>
</body>
</html>
