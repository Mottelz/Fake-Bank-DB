<?php
	$accounts = $data['account'];
	$account = $accounts[0];
	$account_id = $account->Account_id;
	$type = $account->Account_Type;
	$balance = $account->Balance;
	$option = $account->Account_Option;
	$service = $account->Account_Service;

	$transactions = $data['transactions'];

	$annualProfits = $data['annualProfits'];
	$annualLosses = $data['annualLosses'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">


	<div><h2>Account Details</h2></div>


<table class="table table-striped">
		<tr> <td><b>Account #:</b> &nbsp;<?= $account_id ?></td>
			<td><b>Type:</b>&nbsp;<?= $type ?></td>
			<td><b>Option:</b>&nbsp;<?= $option ?></td>
			<td><b>Service:</b>&nbsp;<?= $service ?></td>
			</tr>
</table>

	<br />

	<div><h2>Transaction History</h2></div>


		<table class="table table-striped">
		<tr>
			<th scope="col">Date</th>
			<th scope="col">Type</th>
			<th scope="col">To</th>
			<th scope="col">From</th>
			<th scope="col">Amount</th>
		</tr>

		<?php
			for($index = 0; $index < count($transactions); $index++)
			{
				$transaction = $transactions[$index];
				$trans_type = $transaction->Trans_type;
				$to = $transaction->To_accid;
				$from = $transaction->From_accid;
				$amount = $transaction->Amount;
				$date = $transaction->Trans_date;
		?>
				<tr>
					<td><?= $date ?></td>
					<td><?= $trans_type ?></td>
					<td><?= $to ?></td>
					<td><?= $from ?></td>
					<td><?= $amount ?></td>
				</tr>
		<?php
			}
		?>
	</table>
	<br />

	<div>
		<h4>Annual Profits</h4>
		<?= $annualProfits ?>
	</div>

	<br />

	<div >
		<h4>Annual Losses</h4>
		<?= $annualLosses ?>
	</div>

	<br />

<a href="/account"><button type="submit" class="btn btn-outline-danger">Go Back</button></a>
</br>
</div>
</div>
</div>
</body>
</html>
