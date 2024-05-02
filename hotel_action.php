<?php

	if(empty($_SESSION))
	{
		header("Location: login.php");
	}

	require_once('database.php');
	
	if(isset($_POST['Hotel_name']) && $_POST['Hotel_name'] != "")
	{
		if(isset($_POST['email']) && $_POST['email'] != "")
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
									if(isset($_POST['number']) && $_POST['number'] != "")
									{
										if(isset($_POST['dabba_price']) && $_POST['dabba_price'] != "")
										{
											if(isset($_POST['dabba_food']) && $_POST['dabba_food'] != "")
											{
												if(isset($_FILES['food_image']) && !empty($_FILES['food_image']) )
												{
													if($_POST['password'] === $_POST['cpassword'])
													{
														$hotel_name = $_POST['Hotel_name'];
														$email = $_POST['email'];
														$password = $_POST['password'];
														$address1 = $_POST['address1'];
														$address2 = $_POST['address2'];
														$location = $_POST['location'];
														$pincode =  $_POST['pincode'];
														$number =   $_POST['number'];
														$user = 2;
														$dabba_price = $_POST['dabba_price'];
														$created_on =  date('Y-m-d H:i:s');
														$dabba_food = $_POST['dabba_food'];
														 
														$target_dir = "assets/food_img/";
														$target_file = $target_dir . basename($_FILES["food_image"]["name"]);
														
														
														
													
														$status= move_uploaded_file($_FILES["food_image"]["tmp_name"], $target_file);
														if ($status) 
														{
															$food_image = $_FILES["food_image"]["name"];
															$query = "INSERT INTO login (name, email, password, address1, address2, location, pincode, mobile_number, user_type, dabba_food, created_on,dabba_price, food_image) VALUES ('".$hotel_name."', '".$email."','".$password."', '".$address1."', '".$address2."','".$location."','".$pincode."','".$number."','".$user."','".$dabba_food."', '".$created_on."', '".$dabba_price."', '".$food_image."')";	
											
															if ($conn->query($query) === TRUE)
															{
																header("Location: login.php");
															}
															else 
															{
																echo "Error: " . $sql . "<br>" . $conn->error; die;
															}
														}
														else
														{
														header("Location:hotel.php?error=there is a error while uploading the file try later"); die ;
														}

														
														
													}
													else
													{
														header("Location: hotel.php?error=password and confirm password did not match"); die;
													}
												}
												
												else
												{
													header("Location:hotel.php?error=food image is required"); die; 
												}
												
											}
											else
											{	
												header("Location:hotel.php?error=dabba food is required"); die; 
											}
											
										}
									
										else
										{
											header("Location:hotel.php?error=dabba price is required"); die; 
										}
										}	
									
									else
										{
										header("Location:hotel.php?error=number is required"); die; 
										}
									}
								
								else
								{
									header("Location:hotel.php?error=pincode is required"); die; 
								}
							}
							else
							{
								header("Location:hotel.php?error=location is required"); die; 
							}
						}
						else
						{
							header("Location:hotel.php?error=address2 is required"); die; 
						}
					}
					else
					{
						header("Location:hotel.php?error=address1 is required"); die; 
					}
				}
				else
				{
					header("Location:hotel.php?error=cpassword is required"); die; 
				}
			}
			else
			{
				header("Location:hotel.php?error=password is required"); die; 
			}
			
		}	
		else
		{
			header("Location:hotel.php?error=Email is required"); die; 
		}
	}
	
	else
	{
		header("Location:hotel.php?error=Hotel Name is required"); die; 
	}
	
	
?>