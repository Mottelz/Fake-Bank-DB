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

<?php var_dump($city[1]); ?>
	<div><h1>Bank Summary</h1></div>
	<h2>Get Losses By City:</h2>
		<select name="city" required>
				<option selected disabled value="">---Select Account---</option>
				<?php

					for($index = 0; $index < count($city); $index++)
					{
						$something = $city[$index];
						$CityName = $something->City;
				?>
						<option value="<?= $CityName ?>"><?= $CityName ?></option>
				<?php
					}
				?>
			</select>

	<h2>Get Losses By Branch:</h2>
		<select name="branch" required>
				<option selected disabled value="">---Select Account---</option>
				<?php
				var_dump($branches);
					for($index = 0; $index < count($branches); $index++)
					{
						$branch = $branches[$index];
						$branchName = $branch->Branch_id;
				?>
						<option value="<?= $branchName ?>"><?= $branchName ?></option>
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
