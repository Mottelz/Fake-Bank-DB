<?
	$employees = $data['employees'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<div>EMPLOYEE SUMMARY</div>

	<br />

	<div><a href="/employee/add">Add Employee</a></div>

	<br />

	<table>
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
	<?
		for($index = 0; $index < count($employees); $index++)
		{
			$employee = $employees[$index];
			$employee_id = $employee->employee_id;
			$branch_id = $employee->branch_id;
			$department = $employee->department;
			$first_name = $employee->first_name;
			$last_name = $employee->last_name;
			$title = $employee->title;
			$salary = $employee->salary;
			$start_date = $employee->start_date;
			$active = $employee->active;
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
	<?
		}
	?>
	</table>
</body>
</html>