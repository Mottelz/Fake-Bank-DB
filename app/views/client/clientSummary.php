<?
	$clients = $data['clients'];
?>

<html>
<head>
</head>

<body>
	<?= $this->header() ?>
	
	<br />

	<div>CLIENT SUMMARY</div>

	<br />

	<div><a href="/client/add">Add Client</a></div>
	<br />

	<table>
		<tr>
			<th>Client #</th>
			<th>Branch #</th>
			<th>Name</th>
			<th>Join Date</th>
			<th>Email</th>
			<th>Phone</th>
			<th></th>
			<th></th>
		</tr>
	<?
		for($index = 0; $index < count($clients); $index++)
		{
			$client = $clients[$index];
			$client_id = $client->client_id;
			$branch_id = $client->branch_id;
			$first_name = $client->first_name;
			$last_name = $client->last_name;
			$join_date = $client->join_date;
			$email = $client->email;
			$phone = $client->phone;
	?>
			<tr>
				<td><?= $client_id ?></td>
				<td><?= $branch_id ?></td>
				<td><?= "$first_name $last_name" ?></td>
				<td><?= $join_date ?></td>
				<td><?= $email ?></td>
				<td><?= $phone ?></td>
				<td><a href="/client/details/<?= $client_id ?>">View Details</a></td>
				<td><a href="/client/edit/<?= $client_id ?>">Edit</a></td>
			</tr>
	<?
		}
	?>
	</table>

</body>
</html>