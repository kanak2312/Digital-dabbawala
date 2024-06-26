<?php

	require_once('database.php');
	if(empty($_SESSION))
	{
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <style>
	.gap {
		margin-bottom : 20px;
	}
  </style>
  
</head>
<body>
<?php include 'navbar.php';?>
<br/><br/>
<div class="container">

<?php
	$allorder_query = "SELECT
    o.days,
    o.total_amount,
    o.created_on,
    o.delivery_address1,
    o.delivery_address2,
    ulogin.name AS user_name,
    ulogin.mobile_number AS user_number,
	ulogin.address1,
	ulogin.address2,
    deliveryl.name AS user_deliverty_location,
	homel.name AS user_home_location
FROM
    orders o
LEFT JOIN login ulogin ON
    ulogin.id = o.user_id
LEFT JOIN location deliveryl ON
    deliveryl.id = o.location_id
LEFT JOIN location homel ON
    homel.id = ulogin.location
WHERE
	o.type = 2";
	$allorder_result = $conn->query($allorder_query);
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
	  <th scope="col">User Mobile No</th>
      <th scope="col">User Home Location</th>
	  <th scope="col">User Home Address</th>
	  <th scope="col">User Delivery Location</th>
	  <th scope="col">Delivery Address</th>
	  <th scope="col">Days</th>
	  <th scope="col">Total Amount</th>
      <th scope="col">Created On</th>
    </tr>
  </thead>
  <tbody>
<?php
	if($allorder_result->num_rows > 0)
	{
		$i = 1;
		while($row = $allorder_result->fetch_assoc())
		{
?>
	<tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['user_name']; ?></td>
      <td><?php echo $row['user_number']; ?></td>
      <td><?php echo $row['user_home_location']; ?></td>
      <td><?php echo $row['address1'] . " " . $row['address2']; ?></td>
      <td><?php echo $row['user_deliverty_location']; ?></td>
	  <td><?php echo $row['delivery_address1'] . " " . $row['delivery_address2']; ?></td>
	  <td><?php echo $row['days']; ?></td>
	  <td><?php echo $row['total_amount']; ?></td>
	  <td><?php echo $row['created_on']; ?></td>
    </tr>
<?php
		$i++;
		}
	}
	else{
?>
	<tr>
		<td colspan="10"><center>No orders present</center></td>
	</tr>
<?php
	}
?>
  </tbody>
</table>
</div>
</body>
</html>
