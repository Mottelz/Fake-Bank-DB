<?
	$schedule = $data['schedule'];
	$employee_id = $schedule->employee_id;
	$sched_id = $schedule->sched_id;
	$sched_type = $schedule->sched_type;
	$date = $schedule->date;
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>EDIT DAY</div>

	<br />

	<form method="POST" action="/employee/editDay/<?= $sched_id ?>">
		<div>
			Type<br />
			<input type="text" name="sched_type" value="<?= $sched_type ?>" required />
		</div>

		<br />

		<div>
			Date<br />
			<input type="date" name="date" value="<?= $date ?>" required />
		</div>

		<br />

		<button type="submit" name="editday" value="true">Edit Day</button>
	</form>

	<br />

	<div><a href="/employee/details/<?= $employee_id ?>">Go Back</a></div>
</body>
</html>