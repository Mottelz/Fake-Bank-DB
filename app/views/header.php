<?php
	$login_type = $_SESSION['login_type'];
	//$acc_toggle = $data['acc_toggle'];
?>

  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <form method="POST" action="/login" style="margin-bottom:0px;">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">SuperBank</a>

        <!-- Links -->
        <ul class="navbar-nav">
          <?php if($login_type == 'Client') { ?>
            <li class="nav-item">
              <a class="nav-link" href="/account">Account summary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/payment">Payment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/transfer">Transfer</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="/profile">Profile</a>
          </li>
          <?php if($login_type != 'Client') { ?>
          <li class="nav-item">
              <a class="nav-link" href="/employee/bankInfo">Bank Information</a>
            </li>
          <?php } ?>
        </ul>
				<div style="margin-left:20px;">
        <a class="navbar-brand" href="#">
          <button type="submit" class="btn btn-outline-danger"> Sign Out</button>
        </a>
			</div>
				<div style="margin-left:auto;">
            <?php if($login_type != 'Client') { ?>
              <a href="/client" class="btn btn-primary btn-sm">Clients</a>
            <?php } ?>

            <?php if($login_type != 'Client') { ?>
              <a href="/employee" class="btn btn-secondary btn-sm">Employees</a>
            
					</div>
      </nav>

    </form>
  </head>

  <body>

  </body>

  </html>
