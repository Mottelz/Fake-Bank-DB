<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Sign in</title>

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	 <![endif]-->
</head>

<body>
  <div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
    <div class="container">
      <div class="col-md-8">

  <div class="container">

    <form class="form-signin" method="POST" action="/login">
      <h2 class="form-signin-heading">Client Login</h2>
      <label for="inputEmail" class="sr-only">Client Number</label>
      <input type="text" id="input_client_id" name="client_id" class="form-control" placeholder="Client #" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-primary" type="submit">Sign in</button>
    </form>

  </div>

  <br />


  <div><a href="/signup" class="btn btn-info">Sign Up</a></div>

  <br />
  <br />
  <br />

  <form method="POST" action="/login">
    <div class="container">
      <form class="form-signin" method="POST" action="/login">
        <h2 class="form-signin-heading">Employee Login</h2>
        <label for="inputEmail" class="sr-only">Employee Number</label>
        <input type="text" id="input_client_id" name="employee_id" class="form-control" placeholder="Employee #" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
      </form>

    </div>

  </form>
</div>
</div>
</div>

<?php
  echo "THIS IS A TEST PAGE";
  include "./app/core/Controller.php";
  $clientModel = $this->model('ClientModel');
  echo $clientModel->getClientById(1);
?>


</body>

</html>
