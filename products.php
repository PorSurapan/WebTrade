<?php
	session_start();

	$filename = $_FILES["picture"]["name"]; 
    $tempname = $_FILES["picture"]["tmp_name"];
	$folder = "./resource/".$filename; 
	$cat = $_POST['category'];
	

	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "INSERT INTO products (owner,name,description,category,picture,status,hide)
			VALUES('" . $_POST['owner'] . "', '" . $_POST['name'] . "', '" . $_POST['description'] . "',
			'" . $_POST['category'] . "', '" . $_FILES["picture"]["name"] . "', '" . $_POST['status'] . "', '" . $_POST['hide'] . "')";

	$sql2 = "SELECT COUNT(category) FROM products WHERE category = '$cat'";

	mysqli_query($con, $sql2);

	$sql1 = "UPDATE chart SET count='$count'
			 WHERE category = '$cat'";

	mysqli_query($con, $sql1);

if (move_uploaded_file($tempname, $folder))  { 
	$msg = "Image uploaded successfully"; 
}else{ 
	$msg = "Failed to upload image"; 
}
		 

	$result = mysqli_query($con, $sql);
	

	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
			echo $count;
			//header("Location: home.php");	
	} 


	mysqli_close($con);
?>