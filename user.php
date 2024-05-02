<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v3 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('assets/images/register.png');">
			<div class="inner">
				<form action="user_action.php" method="POST">
					<h3>User Registration</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Name:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<input type="text" class="form-control" name="name" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="email" class="form-control" name="email" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Password</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" class="form-control" name="password" minlength="6" maxlength="6" required />
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Confirm Password</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" class="form-control" name="cpassword" minlength="6" maxlength="6" required />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Address1:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-pin"></i>
								<input type="text" class="form-control" name="address1" maxlength="60" required />
							</div>
						</div>
					
						<div class="form-wrapper">
							<label for="">Address2:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-pin"></i>
								<input type="text" class="form-control" name="address2" maxlength="60" required />
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
								<select name="location" class="form-control" required>
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
									
								</select>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Pincode:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock"></i>
								<input type="text" class="form-control" name="pincode" required />
							</div>
						</div>

					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Mobile Number</label>
							<div class="form-holder">
								<i class="zmdi zmdi-local-phone"></i>
								<input type="text" class="form-control" placeholder="9999999999" minlength="10" maxlength="10" name="number" required />
							</div>
						</div>
					</div>
					<div class="button-holder">
						<button type="submit" name="register_now">Register Now</button>
					</div>
					<!-- </div> -->
				</form>
<?php
	if(isset($_GET['error']) && $_GET['error'] != "")
	{
?>
				<p style="color:red; text-align:center;"><?php echo $_GET['error']; ?></p>
<?php
	}
?>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>