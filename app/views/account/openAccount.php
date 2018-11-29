<html>
<head>
	<?= $this->header();
		$accountType = $data['accounttype'];
		$accountOption = $data['accountoptions'];
		$accountService = $data['accountservice'];

	?>

</head>

<body>
	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize: both;">
		<div class="container">
			<div class="col-md-8">

	<br />

	<form method="POST" action="/account/new">
		<div>Open A New Account</div>

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

		<div class="form-group" style="display: inline-block">
			Option<br />
			<select name="option" class="form-control" required>
				<option selected disabled value="">---Select Option---</option>
				<?php
					for($index = 0; $index < count($accountOption); $index++)
					{
						$account = $accountOption[$index];
						$option = $account->Account_Option;
				?>
						<option><?= $option ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<div class="form-group" style="display: inline-block">
			Service<br />
			<select name="service" class="form-control" required>
				<option selected disabled value="">---Select Service---</option>
				<?php
					for($index = 0; $index < count($accountService); $index++)
					{
						$account = $accountService[$index];
						$service = $account->Charge_Plan_Option ;
				?>
						<option><?= $service ?></option>
				<?php
					}
				?>
			</select>
		</div>

		<br />

		<button type="submit" name="openaccount" value="true" class="btn btn-outline-success">Open New Account</button>
	</form>
	<br />

	<div><a href="/account"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
	</br>
</div>
</div>
</div>
</body>
</html>
