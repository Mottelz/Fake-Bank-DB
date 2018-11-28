<?php
	$accounts = $data['accounts'];
	$acc_toggle = $data['acc_toggle'];

	$toggleTo = $acc_toggle == 'Personal' ? 'Business' : 'Personal';

?>

  <html>

  <head>
    <?= $this->header() ?>
  </head>

  <body>

    <div class="templateux-cover" style="background-image: url(images/slider-1.jpg);resize:verticle;overflow:auto;">
      <div class="container">
        <div class="col-md-8">
					<!-- copy divs -->
          <br />
          <button type="button" class="btn btn-outline-secondary" onclick="location.href='./account/new';">Open New Account</button>
          <br />
          <div class="panel panel-default">
            <br/>
            <br/>
            <div class="panel-heading">
              <h2>Account Summary</h2></div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Account #</th>
                <th scope="col">Type</th>
                <th scope="col">Balance</th>
                <th scope="col">View Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
				for($index = 0; $index < count($accounts); $index++)
				{
					$account = $accounts[$index];
					$account_id = $account->Account_id;
					$type = $account->Account_Type;
					$balance = $account->Balance;
			?>
                <tr>
                  <th scope="row">
                    <?= $account_id ?>
                  </th>
                  <td>
                    <?= $type ?>
                  </td>
                  <td>
                    <?= $balance ?>
                  </td>
                  <td><a href="/account/details/<?= $account_id ?>">View Details</td>
			<?php
				}
			?>
		</table>

	<!-- copy divs -->

		</div>
	</div>
</div>

</body>
</html>
