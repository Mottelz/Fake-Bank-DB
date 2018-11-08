<?
	$employee_id = $data['employee_id'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>ADD TO SCHEDULE</div>

	<br />

	<form method="POST" action="/employee/addSchedule/<?= $employee_id ?>">
		<div>
			Type<br />
			<input type="text" name="sched_type" required />
		</div>

		<br />

		<div>
			Date<br />
			<input type="date" name="date" required />
		</div>

		<br />

		<button type="submit" name="addtoschedule" value="true">Add Day</button>
	</form>

	<br />

	<div><a href="/employee/details/<?= $employee_id ?>">Go Back</a></div>
</body>
</html>