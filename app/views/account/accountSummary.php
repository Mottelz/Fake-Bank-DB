<?	
	$accounts = $data['accounts'];
	$acc_toggle = $data['acc_toggle'];

	$toggleTo = $acc_toggle == 'Personal' ? 'Business' : 'Personal';
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<div>ACCOUNT SUMMARY</div>

	<br />


	<div><a href="/account/new">Open New Account</a></div>

	<?
		for($index = 0; $index < count($accounts); $index++)
		{
			$account = $accounts[$index];
			$account_id = $account->account_id;
			$type = $account->type;
			$balance = $account->balance;
	?>
			<br />
			<div>Account #: <?= $account_id ?></div>
			<div>Type: <?= $type ?></div>
			<div>Balance: <?= $balance ?></div>
			<div><a href="/account/details/<?= $account_id ?>">View Details</a></div>
	<?
		}
	?>

	<br />

	<form method="POST" action="/account">
		<button type="submit" name="toggle" value="<?= $toggleTo ?>">Switch to <?= $toggleTo ?> Accounts</button>
	</form>
</body>
</html>