<?php
	$clients = $data['clients'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	<div class="templateux-cover" style="background-image: url(../images/slider-1.jpg);resize: both;">
		<div class="container">
			<div class="col-md-8">
	<br />

	<div><h2>Client Summary</h2></div>

	<br />

	<div><a href="/client/add"><button type="button" class="btn btn-outline-success">Add Client</button></a></div>

	<br />

		<table class="table table-striped" style="margin:auto;">
		<tr>
			<th scope="col">Client #</th>
			<th scope="col">Branch #</th>
			<th scope="col">Name</th>
			<th scope="col">Join Date</th>
			<th scope="col">Email</th>
			<th scope="col">Phone</th>
			<th scope="col">Details</th>
			<th scope="col">Edit</th>
		</tr>
	<?php
		for($index = 0; $index < count($clients); $index++)
		{
			$client = $clients[$index];
			$client_id = $client->Client_id;
			$branch_id = $client->Branch_id;
			$first_name = $client->First_name;
			$last_name = $client->Last_name;
			$join_date = $client->Join_date;
			$email = $client->Email;
			$phone = $client->Phone;
	?>

			<tr>
				<th scope="row"><?= $client_id ?></th>
				<td><?= $branch_id ?></td>
				<td><?= "$first_name $last_name" ?></td>
				<td><?= $join_date ?></td>
				<td><?= $email ?></td>
				<td><?= $phone ?></td>
				<td><a href="/client/details/<?= $client_id ?>">View Details</a></td>
				<td><a href="/client/edit/<?= $client_id ?>">Edit</a></td>
			</tr>
	<?php
		}
	?>
	</table>
</div>
</div>
</div>
</body>
</html>
