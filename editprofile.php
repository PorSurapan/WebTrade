<?php session_start() ?>
<?php

	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "UPDATE profiles 
			SET username= '" . $_POST["username"] . "',
			password= '" . $_POST["password"] . "',
			roles= '" . $_POST["role"] . "',
			tel= '" . $_POST["tel"] . "',
			photo= '" . $_POST["photo"] . "'
			WHERE username=" . " '" . $_SESSION['s_username'] . "' ";
			
	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
		$_SESSION["s_username"] = $_POST["username"];
			header("Location: profile.php");
			
	}
	
	mysqli_close($con);
?>