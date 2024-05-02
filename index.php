<?php
	require_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/home/css/bootstrap.min.css">
    <script src="assets/home/js/bootstrap.min.js"></script>
	
	<!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/vendors/animate/animate.css">
    
    <!-- Bootstrap + FoodHut main styles -->
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <link rel="stylesheet" href="assets/css/background.css">
    <title>Digital Mumbai Dabbawala</title>
</head>
<body>
    <nav class="custom-navbar navbar navbar-expand-lg fixed-top navbar-dark navbar-light" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
<?php
if(isset($_SESSION['id']) && $_SESSION['id'] != ""){
?>
				<li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
<?php	
}
else{
?>
				<li class="nav-item">
                    <a class="nav-link" href="login.php">Sign in</a>
                </li>
				<li class="nav-item" id="register">
                    <a class="nav-link" href="#Registration">Registration</a>
                    <ul class="dropdown">
                        <li><a href="user.php">User</a></li>
                        <li><a href="hotel.php">Hotel</a></li>
                    </ul>
                </li>
<?php	
}
?>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#book-table">Registration</a>
                </li> -->
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logobg1.png" class="brand-img" alt="">
                <span class="brand-txt">Digital Mumbai Dabbawala</span>
            </a>
               
          <ul class="navbar-nav">
<?php
			if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1)
			{
?>
                <li class="nav-item">
                    <a class="nav-link" href="restro.php">Resturants<span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="home_food.php">Home Food</a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="user_order.php">My Orders</a>
				</li>
<?php
			}
?>
<?php
			if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2)
			{
?>
				<li class="nav-item">
                    <a class="nav-link" href="hotel_orders.php">Hotel Orders</a>
                </li>
<?php
			}
?>

<?php
			if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3)
			{
?>
				<li class="nav-item">
                    <a class="nav-link" href="all_hotel_orders.php">All Hotels Orders</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="all_home_orders.php">All Home Orders</a>
                </li>
<?php
			}
?>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                 -->
                <!-- <li class="nav-item">
                    <a href="./components/component/components.html" class="btn btn-primary ml-xl-4">Components</a>
                </li> -->
            </ul>
        </div>
    </nav>
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Digital Mumbai Dabbawala</h1>
            <h2 class="display-4 mb-5">Serve Fresh Food Make Happy Mood</h2>
            
        </div>
    </header>
    <div id="about" class="container-fluid wow fadeIn" id="about"data-wow-duration="1.5s">
        <div class="row">
            <div class="col-lg-6">
                <br><br><br><br><br>
                <iframe width="760" height="415" src="https://www.youtube.com/embed/zxuVCyvhA2A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
                        <h2 class="mb-4">About Us</h2>
                        <p>Since 1890, Dressed in white outfit and traditional Gandhi Cap, Mumbai Army of 5,000 Dabbawalas fulfilling the hunger of almost 200,000 Mumbaikar with home-cooked food that is lug between home and office daily. For more than a century our team have been part of this grime-ridden metropolis-of-dreams <br><p>About 125 years back, a Parsi banker wanted to have home cooked food in office and gave this responsibility to the first ever Dabbawala. Many people liked the idea and the demand for Dabba delivery soared. It was all informal and individual effort in the beginning, but visionary Mahadeo Havaji Bachche saw the opportunity and started the lunch delivery service in its present team-delivery format with 100 Dabbawalas.<p><b></b></p>
                        <p>As the city grew, the demand for Dabba delivery grew too. The coding system created by our forefather is still prominent in 21st century. Initially it was simple colour coding but now since Mumbai is widely spread metro with 3 local train routes, our coding has also evolved into alpha numeric characters.</div>
                </div>
            </div>
        </div>
    </div>
	
		
          
    </form>
    </div>
                     
</body>

</html>