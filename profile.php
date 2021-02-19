<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true)
	include("header_sender.html");
?>

<html>
<head>
    <title>ข้อมูลส่วนตัว</title>

	<script type = "text/javascript">
	function ConfirmDelete()
	{
 		var del = confirm("คุณแน่ใจว่าจะลบใช่หรือไม่?");
 			if (del == true)
				return true;
			else
				return false;
	}
</script>

	<link rel="stylesheet" href="show_product.css">
</head>

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
	</table>
	</center>

	<br/><br/>
		<center><h2><u>สินค้าที่คุณลงเทรด</u></h2></center>
	 
	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM products WHERE owner = " . " '" . $_SESSION['s_id'] . "' ";
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 5 == 0) {
						echo "</tr>";
						echo "<tr>";
					}
					$name = $row['name'];
					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='200' height='200'>";
					echo "<h2>" . $row['name'] . "</h2>";
					echo "<p>" . $row['category'] . "</p>";
					echo "<p class='price'>" . $row['status'] . "</p>";
					echo '<button><a href="delete_products.php?id=' . $row['id'] . '" onclick = "return ConfirmDelete()" >ลบสินค้าเทรด</a></td></button>';
					echo "</div>";
					echo "</td>";

					$i++;
				}
			echo "</tr>";
		echo "</table>";

        $conn->close();
	?>

	<br/><br/>

</body>
</html>