<?php
	$accounts = $data['accounts'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />
	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
			<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Setup Future Payments</h2></div>

	<br />

	<form method="POST" action="/payment/setupPayment">
		<div>
			Payee<br />
			<input type="text" name="to" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			From<br />
			<select name="from" required class="form-control" required style="width:auto;">
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
			<input type="number" name="amount" step="0.01" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			Frequency (in days)<br />
			<input type="number" name="frequency" required class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<div>
			End Date<br />
			<input type="date" name="end_date" class="form-control" required style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="setupfuturepayments" class="btn btn-warning" value="true">Verify Payment</button>
	</form>

	<br />

	<div><a href="/payment/futurePayments"><button type="submit" class="btn btn-outline-danger" value="true">Go Back</button></a></div>
	<br />
</div>
</div>
</div>
</body>
</html>
