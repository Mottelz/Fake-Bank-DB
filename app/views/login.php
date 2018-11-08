<html>
<head>
</head>

<body>
	<div>CLIENT LOGIN</div>

	<br />

	<form method="POST" action="/login">
		Client #<br />
		<div><input type="text" name="client_id" required /></div>

		<br />

		<div>
			Password<br />
			<input type="password" name="password" required />
		</div>

		<br />

		<button type="submit" name="login" value="client">Login</button>
	</form>
		
	<div><a href="/signup">Sign Up</a></div>

	<br />
	<br />

	<div>EMPLOYEE LOGIN</div>

	<br />

	<form method="POST" action="/login">
		Employee #<br />
		<div><input type="text" name="employee_id" required /></div>

		<br />

		<div>
			Password<br />
			<input type="password" name="password" required />
		</div>

		<br />

		<button type="submit" name="login" value="employee">Login</button>
	</form>
</body>
</html>