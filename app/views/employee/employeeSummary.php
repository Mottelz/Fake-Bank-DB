<?php
	$employees = $data['employees'];
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

	<div><h2>Employee Summary</h2></div>

	<br />

	<div><a href="/employee/add"><button type="button" class="btn btn-outline-success">Add Employee</button></a></div>

	<br />

	<table class="table table-striped">
		<thead>
			<tr>
			<th>Employee #</th>
			<th>Branch #</th>
			<th>Department</th>
			<th>Name</th>
			<th>Title</th>
			<th>Salary</th>
			<th>Start Date</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
		for($index = 0; $index < count($employees); $index++)
		{
			$employee = $employees[$index];
			$employee_id = $employee->Employee_id;
			$branch_id = $employee->Branch_id;
			$department = $employee->Department;
			$first_name = $employee->First_name;
			$last_name = $employee->Last_name;
			$title = $employee->Title;
			$salary = $employee->Salary;
			$start_date = $employee->Employee_start_date;
			$active = $employee->Active;
	?>
			<tr>
				<td><?= $employee_id ?></td>
				<td><?= $branch_id ?></td>
				<td><?= $department ?></td>
				<td><?= "$first_name $last_name" ?></td>
				<td><?= $title ?></td>
				<td><?= $salary ?></td>
				<td><?= $start_date ?></td>
				<td><?= $active == true ? 'Yes' : 'No' ?></td>
				<td><a href="/employee/details/<?= $employee_id ?>">View Details</a></td>
				<td><a href="/employee/edit/<?= $employee_id ?>">Edit</a></td>
			</tr>
	<?php
		}
	?>

	</table>
</div>
</div>
</div>
</body>
</html>
