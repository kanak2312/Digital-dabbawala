<?php
	require_once('database.php');

	if(isset($_POST['name']) && $_POST['name'] != "")
	{
		if(isset($_POST['email']) && $_POST['email'] != "")
		{
			if(isset($_POST['number']) && $_POST['number'] != "")
			{
				if(isset($_POST['password']) && $_POST['password'] != "")
				{
					if(isset($_POST['cpassword']) && $_POST['cpassword'] != "")
					{
						if(isset($_POST['address1']) && $_POST['address1'] != "")
						{
							if(isset($_POST['address2']) && $_POST['address2'] != "")
							{
								if(isset($_POST['location']) && $_POST['location'] != "")
								{
									if(isset($_POST['pincode']) && $_POST['pincode'] != "")
									{
										if($_POST['password'] === $_POST['cpassword'])
										{
											$name = $_POST['name'];
											$email = $_POST['email'];
											$number = $_POST['number'];
											$password = $_POST['password'];
											$address1 = $_POST['address1'];
											$address2 = $_POST['address2'];
											$location = $_POST['location'];
											$pincode = $_POST['pincode'];
											$user = 1;
											$created_on = date('Y-m-d H:i:s');
											
											$query = "INSERT INTO login (name, email, password, mobile_number, address1, address2, location, pincode, user_type, dabba_food, created_on) VALUES ('".$name."', '".$email."', '".$password."', '".$number."', '".$address1."', '".$address2."', '".$location."', '".$pincode."', '".$user."', NULL, '".$created_on."')";
											if ($conn->query($query) === TRUE)
											{
												header("Location: login.php");
											}
											else 
											{
												echo "Error: " . $sql . "<br>" . $conn->error;
											}
										}
										else
										{
											header("Location: user.php?error=password and confirm password did not match"); die;
										}
									}
									else
									{
										header("Location: user.php?error=Pincode field is required"); die;
									}
								}
								else
								{
									header("Location: user.php?error=Location field is required"); die;
								}
								
							
							}
							else{
								header("Location: user.php?error=Address2 field is required"); die;
							}
						
						}
						else{
							header("Location: user.php?error=Address1 field is required"); die;
						}
					}
					else
					{
						header("Location: user.php?error=Confirm password field is required"); die;
					}
				}
				else
				{
					header("Location: user.php?error=Password field is required"); die;
				}
			}
			else
			{
				header("Location: user.php?error=Contact number field is required"); die;
			}
		}
		else
		{
			header("Location: user.php?error=Email field is required"); die;
		}
	}
	else
	{
		header("Location: user.php?error=Name field is required"); die;
	}
	
?>