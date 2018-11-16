<?php
	$futurePayments = $data['futurePayments'];
?>

<html>
<head>
		<?= $this->header() ?>
</head>

<body>
	<br />

	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Future Payments</h2></div>

	<br />

	<div><a href="/payment/setupPayment"><button type="button" class="btn btn-outline-info">Setup Future Payments</button></a></div>

	<br />

	<table class="table table-striped">
		<thead>
			<tr>
			<th>Payee</th>
			<th>From</th>
			<th>Amount</th>
			<th>Start Date</th>
			<th>Frequency (in days)</th>
			<th>End Date</th>
		</tr>
	</thead>
<body>
		<?php
			for($index = 0; $index < count($futurePayments); $index++)
			{
				$futurePayment = $futurePayments[$index];
				$payment_id = $futurePayment->payment_id;
				$to = $futurePayment->to;
				$from = $futurePayment->from;
				$amount = $futurePayment->amount;
				$start_date = $futurePayment->start_date;
				$frequency = $futurePayment->frequency;
				$end_date = $futurePayment->end_date;
		?>
				<tr>
					<td><?= $to ?></td>
					<td><?= $from ?></td>
					<td><?= $amount ?></td>
					<td><?= $start_date ?></td>
					<td><?= $frequency ?></td>
					<td><?= $end_date ?></td>
					<td><a href="/payment/editPayment/<?= $payment_id ?>">Edit</a></td>
				</tr>
		<?php
			}
		?>
	</body>
	</table>
	</br>
</div>
</div>
</div>

</body>
</html>
