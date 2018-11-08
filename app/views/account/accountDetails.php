<?
	$account = $data['account'];
	$account_id = $account->account_id;
	$type = $account->type;
	$balance = $account->balance;
	$option = $account->option;
	$service = $account->service;

	$transactions = $data['transactions'];

	$annualProfits = $data['annualProfits'];
	$annualLosses = $data['annualLosses'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>ACCOUNT DETAILS</div>

	<br />

	<div>Account #: <?= $account_id ?></div>
	<div>Type: <?= $type ?></div>
	<div>Balance: <?= $balance ?><div>
	<div>Option: <?= $option ?><div>
	<div>Service: <?= $service ?><div>

	<br />

	<div>Transaction History</div>

	<table>
		<tr>
			<th>Date</th>
			<th>Type</th>
			<th>To</th>
			<th>From</th>
			<th>Amount</th>
			<th>By</th>
		</tr>

		<?
			for($index = 0; $index < count($transactions); $index++)
			{
				$transaction = $transactions[$index];
				$trans_type = $transaction->trans_type;
				$to = $transaction->to;
				$from = $transaction->from;
				$amount = $transaction->amount;
				$by = $transaction->by;
				$date = $transaction->date;
		?>
				<tr>
					<td><?= $date ?></td>
					<td><?= $trans_type ?></td>
					<td><?= $to ?></td>
					<td><?= $from ?></td>
					<td><?= $amount ?></td>
					<td><?= $by ?></td>
				</tr>
		<?
			}
		?>
	</table>

	<br />

	<div>
		Annual Profits<br />
		<?= $annualProfits ?>
	</div>

	<br />

	<div>
		Annual Losses<br />
		<?= $annualLosses ?>
	</div>

	<br />


	<div><a href="/account">Go Back</a></div>
</body>
</html>