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
					$hotel_id = $_POST['hotel_id'];
					$days = $_POST['days'];
					$price = $_POST['price'];
					$total_amount = $days*$price;
					$address1 = $_POST['address1'];
					$address2 = $_POST['address2'];
					$dabba_food = $_POST['dabba_food'];
					$location = $_POST['location'];
					$type = 1;
					$created_on = date('Y-m-d H:i:s');
					
					$order_query = "INSERT INTO orders (user_id, hotel_id, days, price, total_amount, delivery_address1, delivery_address2, location_id, type,  created_on) VALUES ('".$user_id."', '".$hotel_id."', '".$days."','".$price."', '".$total_amount."', '".$address1."', '".$address2."', '".$location."', 1, '".$created_on."')";
				   if ($conn->query($order_query) === TRUE)
					{
						header("Location: successful.php");
					}
					else 
					{
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
														
			   }
			   else
			   {
				 header("Location:order.php?id=".$_POST['hotel_id']."&error=location is required"); die;  
			   }
		   }
		   else
		   {
			  header("Location:order.php?id=".$_POST['hotel_id']."&error=address2 is required"); die; 
		   }
	  }
	  else
	  {
		 header("Location:order.php?id=".$_POST['hotel_id']."&error=address1 is required"); die; 
	  }
 }
 else
 {
	 header("Location:order.php?id=".$_POST['hotel_id']."&error=days is required"); die;
 }
?>