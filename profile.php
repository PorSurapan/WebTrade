<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true)
	include("header_sender.html");
?>


<html>
<head>
    <title>ข้อมูลส่วนตัว</title>
</head>
<!-- test -->
<body>
    
	<?php
	
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "SELECT * FROM profiles WHERE username = " . " '" . $_SESSION['s_username'] . "' ";
	
	$row = mysqli_query($con, $sql);
	if(!$row)
			die('Error query: ' . mysqli_error());
?>

	<?php while($result = mysqli_fetch_array($row)){ ?>
	
	<center>	
<br/>

 <?php
		echo " <font color= 'black'><img src='./resource/" .$result['photo']. "' width='10%'/></font>";
	?>
<br/><br/>
	
<input type="button" onclick="location.href='edit_profile_form.php';" value="Edit Profile" />
<br/>
		
<table "width:80%" cellspacing="2" bgcolor = "#171616">
	<tr>
		<td width="180" align="left">
			
			<tr>
					
			<tr>
				<td>
					<font color="white"><b>Username:</b>
				</td>
				<td>
					<?php
					echo  " <font color= 'white'>".$result['username'];
					?>
				</td>
			</tr>
			
			<tr>
				<td>
					<font color="white"><b>Role:</b>
				</td>
				<td>
					<?php
					echo " <font color= 'white'>".$result['roles']."</font>";
					?>
				</td>
			</tr>
			
			<tr>
				<td>
					<font color="white"><b>Tel.:</b>
				</td>
				<td>
					<?php
					echo " <font color= 'white'>".$result['tel']."</font>";
					?>
				</td>
			</tr>
			
			<tr>
				<td>
					<font color="white"><b>Status:</b>
				</td>
				<td>
					<?php
					echo " <font color= 'white'>".$result['status']."</font>";
					?>
				</td>
			</tr><?php } ?>
		</td><br/>
	</center>
	
</body>
</html>