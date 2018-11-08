<?
	$payment_id = $data['payment_id'];

	$futurePayment = $data['futurePayment'];
	$to = $futurePayment->to;
	$from = $futurePayment->from;
	$amount = $futurePayment->amount;
	$start_date = $futurePayment->start_date;
	$frequency = $futurePayment->frequency;
	$end_date = $futurePayment->end_date;

	$accounts = $data['accounts'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<?= $this->subHeader() ?>

	<br />

	<div>EDIT FUTURE PAYMENTS</div>

	<br />

	<form method="POST" action="/payment/editPayment/<?= $payment_id ?>">
		<div>
			Payee<br />
			<input type="text" name="to" value="<?= $to ?>" required />
		</div>

		<br />

		<div>
			From<br />
			<select name="from" required>
				<option disabled value="">---Select Account---</option>
				<?
					for($index = 0; $index < count($accounts); $index++) 
					{
						$account = $accounts[$index];
						$account_id = $account->account_id;
						$type = $account->type;
				?>
						<option value="<?= $account_id ?>" <?= $from == $account_id ? 'selected' : ''; ?>><?= $type ?></option>
				<?
					}
				?>
			</select>
		</div>
			
		<br />

		<div>
			Amount<br />
			<input type="number" name="amount" step="0.01" value="<?= $amount ?>" required />
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" value="<?= $start_date ?>" required />
		</div>
			
		<br />

		<div>
			Frequency (in days)<br />
			<input type="number" name="frequency" value="<?= $frequency ?>" required />
		</div>
			
		<br />

		<div>
			End Date<br />
			<input type="date" name="end_date" value="<?= $end_date ?>" />
		</div>
			
		<br />
		
		<button type="submit" name="editfuturepayments" value="true">Verify Payment</button>
	</form>

	<br />

	<div><a href="/payment/futurePayments">Go Back</a></div>
</body>
</html>