<?php  
	$con = mysqli_connect("localhost", "root", "", "test_vue");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to my Database" . mysqli_connect_error();
	}
?>