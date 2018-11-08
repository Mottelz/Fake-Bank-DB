<?
	$employee = $data['employee'];
	$employee_id = $employee->employee_id;
	$branch_id = $employee->branch_id;
	$department = $employee->department;
	$first_name = $employee->first_name;
	$last_name = $employee->last_name;
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

	$countryT = $data['country'];
	$country = $countryT->country;
	$province = $countryT->province;

	$schedules = $data['schedules'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>EMPLOYEE DETAILS</div>

	<br />

	<div>Employee #: <?= $employee_id ?></div>
	<div>Branch #: <?= $branch_id ?></div>
	<div>Department: <?= $department ?></div>
	<div>Name: <?= "$first_name $last_name"?></div>
	<div>Title: <?= $title ?></div>
	<div>Street Address: <?= $street_address ?></div>
	<div>City: <?= $city ?></div>
	<div>Province: <?= $province ?></div>
	<div>Postal Code: <?= $postal_code ?></div>
	<div>Phone: <?= $phone ?></div>
	<div>Email: <?= $email ?></div>
	<div>Salary: <?= $salary ?></div>
	<div>Start Date: <?= $start_date ?></div>
	<div>Active: <?= $active == true ? 'Yes' : 'No' ?></div>

	<br />

	<div>EMPLOYEE SCHEDULE</div>

	<br />

	<div><a href="/employee/addSchedule/<?= $employee_id ?>">Add To Schedule</a></div>

	<br />

	<table>
		<tr>
			<th>Type</th>
			<th>Date</th>
		</tr>

		<?
			for($index = 0; $index < count($schedules); $index++)
			{
				$schedule = $schedules[$index];
				$sched_type = $schedule->sched_type;
				$date = $schedule->date;
		?>
				<tr>
					<td><?= $sched_type ?></td>
					<td><?= $date ?></td>
					<td><a href="/employee/editDay/<?= $employee_id ?>">Edit</a></td>
				</tr>
		<?
			}
		?>
	</table>

	<br />

	<div><a href="/employee">Go Back</a></div>
</body>
</html>