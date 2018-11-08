<html>
<head>
</head>

<body>
	<?= $this->header() ?>

	<br />

	<div>CHANGE PASSWORD</div>

	<br />

	<form method="POST" action="/profile/changePassword">
		<div>
			Current Password<br />
			<input type="password" name="password" required />
		</div>

		<br />

		<div>
			New Password<br />
			<input type="password" name="newpassword" required />
		</div>
			
		<br />

		<div>
			Confirm Password<br />
			<input type="password" name="confirmpassword" required />
		</div>
			
		<br />
		
		<button type="submit" name="changepassword" value="true">Change Password</button>
	</form>

	<br />

	<div><a href="/profile">Go Back</a></div>
</body>
</html>