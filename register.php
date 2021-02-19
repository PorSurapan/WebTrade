<?php
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "INSERT INTO profiles (username,password,roles,tel,photo,status)
			VALUES('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['role'] . "',
			'" . $_POST['tel'] . "', '" . $_POST['photo'] . "', '" . $_POST['status'] . "')";
			
	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			header("Location: login.html");
			
	} 
	mysqli_close($con);
?>