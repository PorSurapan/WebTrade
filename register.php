<?php
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	$con->query("SET NAMES UTF8");

	$sql = "SELECT username FROM profiles ORDER BY id";
	$rs = $con->query($sql);

	$usName = $_POST['username'];
	$count = 0;
	while($row = $rs->fetch_assoc()) {
		$db =  $row['username'];

		if ($db == $usName)
			$count = 1;
	}

	if ($count == 0) {
		$sql = "INSERT INTO profiles (username,password,roles,tel,photo,status)
				VALUES('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['role'] . "',
				'" . $_POST['tel'] . "', '" . $_POST['photo'] . "', '" . $_POST['status'] . "')";
				
		$result = mysqli_query($con, $sql);

		if(!$result){
			die('Error query: ' . mysqli_error());
		} else {
			header("Location: login.html");	
		} 
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'if(!alert("มีชื่อผู้ใช้ในระบบแล้ว กรุณาใช้ชื่ออื่น")) document.location = "register_form.php";';
		echo '</script>';
	}
	mysqli_close($con); 
?>