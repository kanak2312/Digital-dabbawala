<?php
	require_once('database.php');
	if(empty($_SESSION))
	{
		header("Location: login.php");
	}

	header("Location: user_order.php");
?>