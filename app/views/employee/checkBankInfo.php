<?php
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

<form method="POST" action="/employee/bankInfo">
	<div><h1>Bank Summary</h1></div> </br></br></br>

	<h2>Get Losses By City:</h2>
		<select name="cityLosses" >
				<option selected disabled value="">---Select City---</option>
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
			<h3><?= $annualLossesByCity ?></h3>
	<h2>Get Losses By Branch:</h2>
		<select name="branchLosses" >
				<option selected disabled value="">---Select Branch---</option>
				<?php

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
			<h3><?= $annualLossesByBranch ?></h3>


			</br></br></br>


			<h2>Get Profits By City:</h2>
		<select name="cityProfits" >
				<option selected disabled value="">---Select City---</option>
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
			<h3><?= $annualProfitsByCity ?></h3>
	<h2>Get Profits By Branch:</h2>
		<select name="branchProfits" >
				<option selected disabled value="">---Select Branch---</option>
				<?php

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
			<h3><?= $annualProfitsByBranch ?></h3>




		</br></br></br>


			<h2>Get Monthly Payroll By City:</h2>
		<select name="cityPayroll" >
				<option selected disabled value="">---Select City---</option>
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
			<h3><?= $monthlyPayrollByCity ?></h3>
	<h2>Get Monthly Payroll By Branch:</h2>
		<select name="branchPayroll" >
				<option selected disabled value="">---Select Branch---</option>
				<?php

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
			<h3><?= $monthlyPayrollByBranch?></h3>
	<br />
	<br />
		<div>
		<button class="btn btn-lg btn-primary btn-block" name="submit" value="employee" type="submit" style="width:auto;">Submit</button>
		</div>
		</br></br></br>
	</form>
</div>
</div>
</div>
</body>
</html>
