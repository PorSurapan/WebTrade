<?php
	$id = $_GET["id"];
	$con = mysqli_connect("localhost", "root", "");
	$con->query("SET NAMES UTF8");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "UPDATE profiles SET status='ปิดบัญชี' WHERE id='$id'";
		
	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			header("Location: login.html");
			
	} 
	mysqli_close($con); 
?>