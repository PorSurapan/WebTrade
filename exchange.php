<?php

	$filename = $_FILES["picture"]["name"]; 
    $tempname = $_FILES["picture"]["tmp_name"];
	$folder = "./resource/".$filename; 

	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "INSERT INTO exchange (owner,name,description,contact,picture,sender,product)
			VALUES('" . $_POST['owner'] . "', '" . $_POST['name'] . "', '" . $_POST['description'] . "',
			'" . $_POST['tel'] . "', '" . $_FILES["picture"]["name"] . "', '" . $_POST['sender'] . "', '" . $_POST['product'] . "')";

if (move_uploaded_file($tempname, $folder))  { 
	$msg = "Image uploaded successfully"; 
}else{ 
	$msg = "Failed to upload image"; 
}
		 

	$result = mysqli_query($con, $sql);
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			header("Location: home.php");
			
	} 
	mysqli_close($con);
?>