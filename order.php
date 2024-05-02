<?php

	require_once('database.php');
	if(empty($_SESSION))
	{
		header("Location: login.php");
	}
	
	
	if(isset($_GET['id']) && $_GET['id'] != "")
	{
		$id = $_GET['id'];
	}
	else{
		header("Location:restro.php"); die; 
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#Home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php#about">About Us</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="restro.php"> Resturant</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="home_food.php"> Home Food</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
	
    
  </ul>
</nav>
<?php
	$hotel_query = "SELECT * FROM `login` WHERE `id` = ".$id." AND user_type = 2";
	$hotel_result = $conn->query($hotel_query);
	if($hotel_result->num_rows > 0)
	{
		$hotel_data = $hotel_result->fetch_assoc();
		
	}	
	else{
		header("Location:restro.php"); die;
	}
?>
<div class="container">
<form action="order_action.php" method="POST">
	<input type="hidden" name="hotel_id" value="<?php echo $id; ?>" />
  <div class="form-group">
    <label for="email">Hotel Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="hotel_name" value="<?php echo $hotel_data['name']; ?>" id="email" readonly />
  </div>
  <div class="form-group">
    <label for="pwd">Price:</label>
    <input type="text" class="form-control" placeholder="Enter price" name="price" value="<?php echo $hotel_data['dabba_price']; ?>" id="pwd" readonly />
  </div>
  <div class="form-group">
    <label for="pwd">Number Of Days:</label>
    <input type="number" class="form-control" placeholder="Enter days" name="days" id="pwd"  min="7" 
	required />
  </div>
  <div class="form-group">
    <label for="pwd"> Delivery Address1:</label>
    <input type="text" class="form-control" placeholder="Enter address" name="address1" maxlength="70" id="pwd" required />
  </div>
  <div class="form-group">
    <label for="pwd"> Delivery Address2:</label>
    <input type="text" class="form-control" placeholder="Enter address"  name="address2" maxlength="70" id="pwd" required />
  </div>
  <div class="form-group">
  <label for="comment">Dabba Food:</label>
  <textarea class="form-control" rows="5" name="dabba_food" id="comment"  readonly><?php echo $hotel_data['dabba_food']; ?></textarea>
</div>
  
  <?php
	$query1 = "SELECT `id`, `name` FROM `location`;";
	$result1 = $conn->query($query1);
?>
					
						<div class="form-wrapper">
							<label for="">Location:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-pin-drop"></i>
								<select name="location" id="" class="form-control" required>
									<option value="Select location">Select Location</option>
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
								  </select>
								  <br><br>
  <button type="submit" name="submit" class="btn btn-primary">Place Order </button>
</form>

</div>


 
  
  





</body>
</html>
