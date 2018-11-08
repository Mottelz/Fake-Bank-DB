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

	<div>MAKE A PAYMENT</div>

	<br />

	<form method="POST" action="/payment">
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
		
		<button type="submit" name="makepayment" value="true">Verify Payment</button>
	</form>
</body>
</html>