<?php
	$monthlyPayroll = $data['monthlyPayroll'];
	$monthlyPayroll = $data['monthlyPayroll'];
	$monthlyPayrollByCity = $data['monthlyPayrollByCity'];
	$monthlyPayrollByBranch = $data['monthlyPayrollByBranch'];
	$annualLosses = $data['montannualLosseshlyPayroll'];
	$annualLossesByBranch = $data['annualLossesByBranch'];
	$annualLossesByCity = $data['annualLossesByCity'];
	$annualProfits = $data['annualProfits'];
	$annualProfitsByBranch = $data['annualProfitsByBranch'];
	$annualProfitsByCity = $data['annualProfitsByCity'];
	//$processPayments = $data['processPayment'];
	$city = $data['city'];
	$branches = $data['branches'];
?>

<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h1>Bank Summary</h1></div>
	<h2>Get Losses By City:</h2>
		<select name="to" required>
				<option selected disabled value="">---Select Account---</option>
				<?php
					for($index = 0; $index < count($city); $index++)
					{
						$city = $city[$index];
						$CityName = $city->City;
						$type = $account->Account_Type;
				?>
						<option value="<?= $CityName ?>"></option>
				<?php
					}
				?>
			</select>

	<br />
	<br />


</div>
</div>
</div>
</body>
</html>
