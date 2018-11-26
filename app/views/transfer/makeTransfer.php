<?= $this->header();
		$accountType = $data['accounttype'];
		$accountOption = $data['accountoptions'];
		$accountService = $data['accountservice'];

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

	<div><h2>Make A Transfer</h2></div>

	<br />

	<form method="POST" action="/transfer">
		
		<div class="form-group" style="display: inline-block">	 Type
			<select name="type" class="form-control" required>
				<option selected disabled value="">---Select Type---</option>
				<?php

					for($index = 0; $index < count($accountType); $index++)
					{
						$account = $accountType[$index];
						$type = $account->Account_Type;
				?>
						<option><?= $type ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			From<br />
			<select name="from" required class="form-control" style="width:auto;">
				<option selected disabled value="">---Select Account---</option>
				<?php
					for($index = 0; $index < count($accounts); $index++)
					{
						$account = $accounts[$index];
						$account_id = $account->Account_id;
						$type = $account->type;
				?>
						<option value="<?= $account_id ?>"><?= $type ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div>
			Amount $<br />
			<input type="number" name="amount" step="0.01" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<button type="submit" name="maketransfer" class="btn btn-warning" value="true">Verify Transfer</button>
	</form>
</div>
</div>
</div>
</body>
</html>
