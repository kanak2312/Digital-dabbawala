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
<div class="container">
<form action="home_food_action.php" method="POST">
  <div class="form-group">
    <label for="email">Delivery Address1:</label>
    <input type="text" name="address1" class="form-control" placeholder="Enter Address1" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Delivery Address2:</label>
    <input type="text" name="address2" class="form-control" placeholder="Enter Address2" id="pwd">
  </div>
		<?php
			$query1 = "SELECT `id`, `name` FROM `location`;";
			$result1 = $conn->query($query1);
		?>
			<label>Select Location</label>
			<select name="location" class="form-control">
			<option value="">Select Location</option>
			
		<?php
			if($result1->num_rows > 0)
							{
								while($row = $result1->fetch_assoc()) 
								{
		?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
		<?php
								}
							}
		?>
			</select><br>
  
  <div class="form-group">
    <label for="pwd">Number Of Days: </label>
    <input type="number" name="days" class="form-control" placeholder="Enter Days"  min="7" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd"> Delivery Charges:</label>
    <input type="text"  value="35" name="price" class="form-control" placeholder="Enter address" id="pwd">
  </div>
   <button type="submit" class="btn btn-primary">Place Order </button>
   </form>
