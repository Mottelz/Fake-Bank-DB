<?php
	$transactions = $data['transactions'];
?>

<html>
<head>
	<?= $this->header() ?>

	<br />
</head>

<body>

	<br />
	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">
	<div><h2>Transfer History</h2></div>

	<table class="table table-striped">
		<thead>
			<tr>
			<th>Date</th>
			<th>To</th>
			<th>From</th>
			<th>Amount</th>
			<th>By</th>
		</tr>
	</head>
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
				<tr><th scope="row">
					<?= $date ?></
				</th>
					<td><?= $to ?></td>
					<td><?= $from ?></td>
					<td><?= $amount ?></td>
					<td><?= $by ?></td>
				</tr>

		<?php
			}
		?>
	</tbody>
	</table>
</br>
</div>
</div>
</div>
</body>
</html>
