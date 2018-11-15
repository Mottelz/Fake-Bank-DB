<?php
	$employee_id = $data['employee_id'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Add To Schedule</h2></div>

	<br />

	<form method="POST" action="/employee/addSchedule/<?= $employee_id ?>">
		<div>
			Type<br />
			<input type="text" name="sched_type" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Date<br />
			<input type="date" name="date" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="addtoschedule" value="true" class="btn btn-outline-success" >Add Day</button></button>
	</form>

	<br />

	<div><a href="/employee/details/<?= $employee_id ?>"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
</br>
</div>
</div>
</div>
</body>
</html>
