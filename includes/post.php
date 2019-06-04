<?php
	include('dbcon.php');
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	$insert = mysqli_query($con, "insert into customer_info(firstname,lastname,email) values('$firstname','$lastname','$email')");

	if($insert)
	{
		echo 'success';
	}
	else
	{
		echo 'error';
	}
?>