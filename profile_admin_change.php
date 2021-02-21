<?php session_start() ?>
<?php

	$filename = $_FILES["photo"]["name"]; 
    $tempname = $_FILES["photo"]["tmp_name"];
	$folder = "./resource/".$filename; 

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
			photo= '" . $_FILES["photo"]["name"] . "'
			WHERE username=" . " '" . $_SESSION['s_username'] . "' ";
		
		if (move_uploaded_file($tempname, $folder))  { 
			$msg = "Image uploaded successfully"; 
		}else{ 
			$msg = "Failed to upload image"; 
	  }

	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
		$_SESSION["s_username"] = $_POST["username"];
			header("Location: profile_admin.php");
	} 
	mysqli_close($con);
?>

