<?php
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "INSERT INTO products (owner,name,description,category,picture,status,hide)
			VALUES('" . $_POST['owner'] . "', '" . $_POST['name'] . "', '" . $_POST['description'] . "',
			'" . $_POST['category'] . "', '" . $_POST['picture'] . "', '" . $_POST['status'] . "', '" . $_POST['hide'] . "')";
			
	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			header("Location: main.php");
			
	} 
	mysqli_close($con);
?>