<?php
 require_once('database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('assets/images/hotel1.jpg');">
			<div class="inner">
				<form action="hotel_action.php" method="POST" enctype="multipart/form-data">
					<h3>Hotel Registration</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Hotel Name:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<input type="text" name="Hotel_name" class="form-control" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="text" name="email" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" name="password" class="form-control" placeholder="********" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Confirm Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" name="cpassword" class="form-control" placeholder="********" required />
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Address1:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-pin"></i>
								<input type="text" name="address1" class="form-control" placeholder="" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Address2:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-pin"></i>
								<input type="text" name="address2" class="form-control" placeholder="" required />
							</div>
						</div>
					</div>
					<div class="form-group">
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
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Pincode:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock"></i>
								<input type="text" name="pincode" class="form-control" placeholder="" required />
							</div>
						</div>

					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Contact Number:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-local-phone"></i>
								<input type="text"  name="number"class="form-control" placeholder="999-999-9999" maxlength="10" minlength="10" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Dabba Price:</label>
							<div class="form-holder">
							<input type="text" name="dabba_price" class="form-control" placeholder=""  required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper" style="width: 100%; margin-right: 0px;">
							<label for="">Dabba Food:</label>
								<textarea id="" name="dabba_food" rows="4" class="form-control" style="height: auto; padding: 0 10px 0 10px;"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper" name="food_image" style="width: 100%; margin-right: 0px;">
							<label for="">Food Image:</label>
							<input type="file" name="food_image" accept="image/x-png,image/jpg,image/jpeg" required />
						</div>
					</div>
					<!-- <div class="form-group"> 
					<div class="checkbox">
							<label>
								<input type="checkbox"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
								<span class="checkmark"></span>
							</label>
						</div>
						 -->
						<div class="button-holder" name="register">
							<button type="submit">Register Now</button>
						</div>
<?php
						if(isset($_GET['error']) && $_GET['error'] != "")
							{
?>
								<!-- <p style="color:red; text-align:center;"><?php echo $_GET['error']; ?></p> -->
<?php
							}
?>
						
					<!-- </div> -->
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>