<?php
	$monthlyPayroll = $data['monthlyPayroll'];
	$monthlyPayrollByCity = $data['monthlyPayrollByCity'];
	$monthlyPayrollByBranch = $data['monthlyPayrollByBranch'];
	$annualLosses = $data['annualLosses'];
	$annualLossesByBranch = $data['annualLossesByBranch'];
	$annualLossesByCity = $data['annualLossesByCity'];
	$annualProfits = $data['annualProfits'];
	$annualProfitsByBranch = $data['annualProfitsByBranch'];
	$annualProfitsByCity = $data['annualProfitsByCity'];
	//$processPayments = $data['processPayment'];
	$city = $data['city'];
	$branches = $data['branches'];
	$nothing = "";
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
<h2>Overall Losses:</h2>
  $ -<?php if($annualLosses != null){ echo sprintf('%0.2f', $annualLosses);} else {echo $nothing;} ?>
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
			</select></br>
			  $ -<?php if($annualLossesByCity != null){ echo sprintf('%0.2f', $annualLossesByCity);} else {echo $nothing;} ?>

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
			</select></br>
			  $ -<?php if($annualLossesByBranch != null){ echo sprintf('%0.2f', $annualLossesByBranch);} else {echo $nothing;} ?>


			</br></br></br>

			<h2>Overall Profits:</h2>
			  $ +<?php  if($annualProfits != null){ echo sprintf('%0.2f', $annualProfits);} else {echo $nothing;}  ?>
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
			</select></br>
			  $ +<?php if($annualProfitsByCity != null){ echo sprintf('%0.2f', $annualProfitsByCity);} else {echo $nothing;} ?>
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
			</select></br>
			  $ +<?php if($annualProfitsByBranch != null){ echo sprintf('%0.2f', $annualProfitsByBranch);} else {echo $nothing;}  ?>




		</br></br></br>

		<h2>Overall Monthly Payroll:</h2>
		 $ <?php  if($monthlyPayroll != null){ echo sprintf('%0.2f', $monthlyPayroll);} else {echo $nothing;} ?>
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
			</select></br>
			 $ <?= if($monthlyPayrollByCity != null){ echo sprintf('%0.2f', $monthlyPayrollByCity);} else {echo $nothing;}?>
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
			</select></br>
			 $ <?= if($monthlyPayrollByBranch != null){ echo sprintf('%0.2f', $monthlyPayrollByBranch);} else {echo $nothing;}?>
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
