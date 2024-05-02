<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#Home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php#about">About Us</a>
    </li>
<?php
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1)
{
?>
	<li class="nav-item">
      <a class="nav-link" href="restro.php"> Resturant</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="home_food.php"> Home Food</a>
    </li>
<?php
}
?>
	<li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
<?php
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1)
{
?>
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
		<a class="nav-link" href="all_hotel_orders.php">All Hotel Orders</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="all_home_orders.php">All Home Orders</a>
	</li>
<?php
}
?>
	<li class="nav-item">
		<a class="nav-link" href="logout.php">logout</a>
	</li>
  </ul>
</nav>