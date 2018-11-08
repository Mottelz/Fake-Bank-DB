<?
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

	<div>SETUP FUTURE PAYMENTS</div>

	<br />

	<form method="POST" action="/payment/setupPayment">
		<div>
			Payee<br />
			<input type="text" name="to" required />
		</div>

		<br />

		<div>
			From<br />
			<select name="from" required>
				<option selected disabled value="">---Select Account---</option>
				<?
					for($index = 0; $index < count($accounts); $index++) 
					{
						$account = $accounts[$index];
						$account_id = $account->account_id;
						$type = $account->type;
				?>
						<option value="<?= $account_id ?>"><?= $type ?></option>
				<?
					}
				?>
			</select>
		</div>
			
		<br />

		<div>
			Amount<br />
			<input type="number" name="amount" step="0.01" required />
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" required />
		</div>
			
		<br />

		<div>
			Frequency (in days)<br />
			<input type="number" name="frequency" required />
		</div>
			
		<br />

		<div>
			End Date<br />
			<input type="date" name="end_date" />
		</div>
			
		<br />
		
		<button type="submit" name="setupfuturepayments" value="true">Verify Payment</button>
	</form>

	<br />

	<div><a href="/payment/futurePayments">Go Back</a></div>
</body>
</html>