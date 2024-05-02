<?php
	require_once('database.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM login where (email = '".$username."' OR mobile_number = '".$username."') and password = '".$password."'"; 
	$result = mysqli_query($conn, $query);  
	$row = $result->fetch_assoc();   
	$count = mysqli_num_rows($result);  
	if($count == 1)
	{
	   $_SESSION['id'] = $row['id'];
	   $_SESSION['name'] = $row['name'];
	   $_SESSION['email'] = $row['email'];
	   $_SESSION['mobile_number'] = $row['mobile_number'];
	   $_SESSION['address1'] = $row['address1'];
	   $_SESSION['address2'] = $row['address2'];
	   $_SESSION['location'] = $row['location'];
	   $_SESSION['pincode'] = $row['pincode'];
	   $_SESSION['user_type'] = $row['user_type'];
	   header("Location: index.php");
	   
	}  
	else{  
		echo "<h1> Login failed. Invalid username or password.</h1>";  
	}     
	
	
?>