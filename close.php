<?php
$_SESSION["s_id"] = $id
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "UPDATE profiles SET status='ปิดบัญชี' WHERE id=$id";
			
	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			header("Location: login.html");
			
	} 
	mysqli_close($con); 
?>