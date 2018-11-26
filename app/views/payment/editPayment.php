<?php
	$payment_id = $data['payment_id'];

	$futurePayment = $data['futurePayment'];
	$to = $futurePayment->To_accid;
	$from = $futurePayment->From_accid;
	$amount = $futurePayment->Amount;
	$start_date = $futurePayment->Start_date;
	$frequency = $futurePayment->Frequency;
	$end_date = $futurePayment->End_date;

	$accounts = $data['accounts'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>
	<div class="templateux-cover" style="background-image: url(../../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<?= $this->subHeader() ?>
		<div class="container">
			<div class="col-md-8">

	<br />

	<div><h2>Edit Future Payments</h2></div>

	<br />

	<form method="POST" action="/payment/editPayment/<?= $payment_id ?>">
		<div>
			Payee<br />
			<input type="text" name="to" value="<?= $to ?>" required class="form-control" style="width:auto;" />
		</div>
		<br />
		<div>
			From<br />
			<select name="from" required class="form-control" style="width:auto;">
				<option disabled value="">---Select Account---</option>
				<?php
					for($index = 0; $index < count($accounts); $index++)
					{
						$account = $accounts[$index];
						$account_id = $account->Account_id;
						$type = $account->Account_Type;
				?>
						<option value="<?= $account_id ?>" <?= $from == $account_id ? 'selected' : ''; ?>>ID#<?= $account_id ?> <?= $type ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Amount<br />
			<input type="number" name="amount" step="0.01" value="<?= $amount ?>" required class="form-control" style="width:auto;" />
		</div>

		<br />

		<div>
			Start Date<br />
			<input type="date" name="start_date" value="<?= $start_date ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Frequency (in days)<br />
			<input type="number" name="frequency" value="<?= $frequency ?>" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			End Date<br />
			<input type="date" name="end_date" value="<?= $end_date ?>" class="form-control" style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="editfuturepayments" class="btn btn-warning" value="true">Verify Payment</button>
	</form>

	<br />

	<div><a href="/payment/futurePayments"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
</br>

</div>
</div>
</div>
</body>
</html>
