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

	<div>MAKE A TRANSFER</div>

	<br />

	<form method="POST" action="/transfer">
		<div>
			To<br />
			<select name="to" required>
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
		
		<button type="submit" name="maketransfer" value="true">Verify Transfer</button>
	</form>
</body>
</html>