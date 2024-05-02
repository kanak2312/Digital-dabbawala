<?php
	require_once('database.php');
	if(empty($_SESSION))
	{
		header("Location: login.php");
	}
	$hotel_id = $_SESSION['id'];
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
	$hotelorder_query = "SELECT orders.days, orders.total_amount, orders.created_on, orders.delivery_address1, orders.delivery_address2, login.name, login.mobile_number, location.name AS location_name FROM orders LEFT JOIN login ON login.id = orders.user_id LEFT JOIN location ON location.id = orders.location_id WHERE orders.hotel_id = ".$hotel_id."";
	$hotelorder_result = $conn->query($hotelorder_query);
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">User Location</th>
      <th scope="col">Days</th>
      <th scope="col">Total Amount</th>
      <th scope="col">User Mobile Number</th>
	  <th scope="col">Delivery Address</th>
      <th scope="col">Created On</th>
    </tr>
  </thead>
  <tbody>
<?php
	if($hotelorder_result->num_rows > 0)
	{
		$i = 1;
		while($row = $hotelorder_result->fetch_assoc())
		{
?>
	<tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['location_name']; ?></td>
      <td><?php echo $row['days']; ?></td>
      <td><?php echo $row['total_amount']; ?></td>
      <td><?php echo $row['mobile_number']; ?></td>
      <td><?php echo $row['delivery_address1'] . " " . $row['delivery_address2']; ?></td>
      <td><?php echo $row['created_on']; ?></td>
    </tr>
<?php
		$i++;
		}
	}
	else{
?>
	<tr>
		<td colspan="8"><center>No orders present</center></td>
	</tr>
<?php
	}
?>
  </tbody>
</table>
</div>
</body>
</html>
