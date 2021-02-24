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

	if (move_uploaded_file($tempname, $folder))  { 
		$msg = "Image uploaded successfully"; 
	}else{ 
		$msg = "Failed to upload image"; 
	}
		 
	$result = mysqli_query($con, $sql);
	
	if(!$result){
			die('Error query: ' . mysqli_error());
	}else{
		//header("Location: home.php");	
	} 
	mysqli_close($con);


	// ----------------------------------------------------------------------


	$conn = mysqli_connect("localhost", "root", "", "trader");
	$conn->query("SET NAMES UTF8");

	$count = 0;
	$sql = "SELECT * FROM products WHERE category = '$cat'";
	//echo "sql: " . $sql;
	$rs = $conn->query($sql);

	while($row = $rs->fetch_assoc()) {
		$count = $count + 1;
	}
	//echo "count: " . $count;

	mysqli_select_db($conn, "trader");
	$sql1 = "UPDATE chart SET count = '$count' WHERE category = '$cat'";
	$result = mysqli_query($conn, $sql1);
	//echo "sql1: " . $sql1;

	if(!$result){
		die('Error query: ' . mysqli_error());
	} else {
		header("Location: home.php");	
	}

	$conn->close();
?>