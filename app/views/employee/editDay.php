<?php
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
	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Edit Day</h2></div>

	<br />

	<form method="POST" action="/employee/editDay/<?= $sched_id ?>">
		<div>
			Type<br />
			<input type="text" name="sched_type" value="<?= $sched_type ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Date<br />
			<input type="date" name="date" value="<?= $date ?>" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="editday" class="btn btn-outline-success" value="true">Edit Day</button>
	</form>

	<br />

	<div><a href="/employee/details/<?= $employee_id ?>"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
</br>
</div>
</div>
</div>
</body>
</html>
