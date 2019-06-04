<?php
	include('dbcon.php');
	$query = mysqli_query($con,"select * from customer_info");

	$row = array();

	while($r = mysqli_fetch_assoc($query)) {
		$row[] = $r;
	}

	print json_encode($row);
	mysqli_close($con);
?>