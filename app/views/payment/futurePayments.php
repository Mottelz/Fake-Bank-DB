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
				$payment_id = $futurePayment->Payment_id ;
				$to = $futurePayment->To_accid ;
				$from = $futurePayment->From_accid ;
				$amount = $futurePayment->Amount ;
				$start_date = $futurePayment->Future_Payments_Start_date;
				$frequency = $futurePayment->Frequency ;
				$end_date = $futurePayment->End_date ;
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
