<?
	$futurePayments = $data['futurePayments'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<?= $this->subHeader() ?>

	<br />

	<div>FUTURE PAYMENTS</div>

	<br />

	<div><a href="/payment/setupPayment">Setup Future Payments</a></div>

	<br />

	<table>
		<tr>
			<th>Payee</th>
			<th>From</th>
			<th>Amount</th>
			<th>Start Date</th>
			<th>Frequency (in days)</th>
			<th>End Date</th>
		</tr>

		<?
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
		<?
			}
		?>
	</table>
</body>
</html>