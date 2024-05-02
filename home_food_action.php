<?php

	require_once('database.php');
	if(empty($_SESSION))
	{
		header("Location: login.php");
	}
	
	if(isset($_POST['days']) && $_POST['days'] != " ")
	{
	  if(isset($_POST['address1']) && $_POST['address1'] != " ")
	  {
		   if(isset($_POST['address2']) && $_POST['address2'] != " ")
		   {
			   if(isset($_POST['location']) && $_POST['location'] != " ")
			   {
					$user_id = $_SESSION['id'];
					$days = $_POST['days'];
					$price = $_POST['price'];
					$total_amount = $days*$price;
					$address1 = $_POST['address1'];
					$address2 = $_POST['address2'];
					$location = $_POST['location'];
					$type = 2;
					$created_on = date('Y-m-d H:i:s');
					
					$home_query = "INSERT INTO orders (user_id, days, price, total_amount, delivery_address1, delivery_address2, location_id, type,  created_on) VALUES ('".$user_id."', '".$days."','".$price."', '".$total_amount."', '".$address1."', '".$address2."', '".$location."', 2 , '".$created_on."')";
				   if ($conn->query($home_query) === TRUE)
					{
						header("Location: all_home_orders.php");
					}
					else 
					{
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
														
			   }
			   else
			   {
				 header("Location: home_food.php?error=location is required"); die;  
			   }
		   }
		   else
		   {
			  header("Location: home_food.php?error=address2 is required"); die; 
		   }
	  }
	  else
	  {
		 header("Location: home_food.php?error=address1 is required"); die; 
	  }
 }
 else
 {
	 header("Location: home_food.php?error=days is required"); die;
 }
?>
