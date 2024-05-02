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
	<div class="row">
		<div class="col-sm-3">
	
		</div>
	</div><br><br>
	<?php
		$query2 = "SELECT * FROM login WHERE user_type = 2";
		$result2 = $conn->query($query2);
	?>
	<div class="row">
	<?php
		if($result2->num_rows > 0)
		{
			while($row = $result2->fetch_assoc()) 
			{
	?>
		<div class="col-sm-4 gap">
			<div class="card">
				<img class="card-img-top" src="assets/food_img/<?php echo $row['food_image'] ?>" style="height:350px;" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $row['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp; INR <?php echo $row['dabba_price']; ?>/dabba</h5>
					<p class="card-text"><?php echo $row['dabba_food']; ?></p>
				</div>
			<div class="card-footer">
<?php
			$query3 = "SELECT `name` FROM `location` WHERE `id` = ".$row['location']."";
			$result3 = $conn->query($query3);
			$location = $result3->fetch_assoc();
?>
			<small class="text-muted"><?php echo $location['name']; ?></small>
			<a href="order.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Order Now</a>
			</div>
		</div>
	</div>
	<?php
			}
		}
	?>
  
  
  
  
  
  
 
  
 
  
 
  
  
  
  
  
  </div>
  
 

</div>


 
  
  





</body>
</html>
