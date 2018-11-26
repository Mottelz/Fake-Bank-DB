<?php
	$accounts = $data['accounts'];
	var_dump($accounts);
?>

<html>
<head>
	<?= $this->header() ?>

	<br />


</head>

<body>

	<div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
		<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">

	<br />

	<div><h2>Make A Payment</h2></div>

	<br />

	<form method="POST" action="/payment">
		<div>
			Payee<br />
			<input type="text" name="to" required class="form-control" required style="width:auto;" />
		</div>

		<br />

		<div>
			From<br />
			<select name="from" class="form-control" style="width:auto;" required>
				<option selected disabled value="">---Select Account---</option>
				<?php
					for($index = 0; $index < count($accounts); $index++)
					{
						$account = $accounts[$index];
						$account_id = $account->Account_id;
						$type = $account->Account_Type;
				?>
						<option value="<?= $account_id ?>">ID#<?= $account_id ?> : <?= $type ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Amount<br />
			<input type="number" name="amount" step="0.01" required class="form-control" required style="width:auto;" />
		</div>

		<br />

		<button type="submit" name="makepayment" class="btn btn-warning" value="true">Verify Payment</button>
	</form>
</div>
</div>
</div>
</body>
</html>
