<html>
<head>
	<?= $this->header() ?>
</head>

<body>

	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize:verticle;overflow:auto;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Change Password</h2></div>

	<br />

	<form method="POST" action="/profile/changePassword">
		<div>
			Current Password<br />
			<input type="password" name="password" required class="form-control" style="width:auto;" />
		</div>

		<br />

		<div>
			New Password<br />
			<input type="password" name="newpassword" required class="form-control" style="width:auto;"/>
		</div>

		<br />

		<div>
			Confirm Password<br />
			<input type="password" name="confirmpassword" required class="form-control" style="width:auto;" />
		</div>

		<br />

		<button type="submit" name="changepassword" class="btn btn-outline-info" value="true">Change Password</button>
	</form>

	<br />

	<div><a href="/profile"><button type="button" class="btn btn-outline-danger">Go Back</button></a></div>
	<br />
</div>
</div>
</div>

</body>
</html>
