<?php
	// Create connection
	$con=mysql_connect('localhost','root','fourteen');
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		mysql_select_db('johogo');
	}
?> 