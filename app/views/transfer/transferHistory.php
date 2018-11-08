<?
	$transactions = $data['transactions'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<?= $this->subHeader() ?>

	<br />

	<div>TRANSFER HISTORY</div>

	<table>
		<tr>
			<th>Date</th>
			<th>To</th>
			<th>From</th>
			<th>Amount</th>
			<th>By</th>
		</tr>

		<?
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
		<?
			}
		?>
	</table>
</body>
</html>