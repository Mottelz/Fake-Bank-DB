<?php
	$transactions = $data['transactions'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
			<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Payment History</h2></div>

	<table class="table table-striped">
		<thead>
			<tr>
			<th>Date</th>
			<th>To</th>
			<th>From</th>
			<th>Amount</th>
			<th>By</th>
		</tr>
</thead>
<tbody>
		<?php
			for($index = 0; $index < count($transactions); $index++)
			{
				$transaction = $transactions[$index];
				$to = $transaction->to;
				$from = $transaction->from;
				$amount = $transaction->amount;
				$by = $transaction->by;
				$date = $transaction->date;
		?>
				<tr>
					<td><?= $date ?></td>
					<td><?= $to ?></td>
					<td><?= $from ?></td>
					<td><?= $amount ?></td>
					<td><?= $by ?></td>
				</tr>
		<?php
			}
		?>
		<tbody>
	</table>
</br>
</div>
</div>
</div>
</body>
</html>
