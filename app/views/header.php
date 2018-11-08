<?
	$account_type = $data['account_type'];
	$acc_toggle = $data['acc_toggle'];
?>

<html>
<head>
</head>

<body>
	<div>
		<form method="POST" action="/login">
			HEADER
			<a href="/account">Account Summary</a>
			<a href="/payment">Payment</a>
			<a href="/transfer">Transfer</a>
			<a href="/profile">Profile</a>

			<? if(true/*$account_type == 'Employee'*/) { ?>
				<a href="/client">Clients</a>
			<? } ?>

			<? if(true/*$acc_toggle == 'Business'*/) { ?>
				<a href="/employee">Employees</a>
			<? } ?>


			<button type="submit" name="signout" value="true">Sign Out</button>
		</form>

	</div>
</body>
</html>