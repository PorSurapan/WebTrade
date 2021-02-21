<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true){
		include("config_header.php");
	}
?>

<html>
<head>
    <title>ข้อมูลส่วนตัว</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.card2 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background: #141e30;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: blue;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 20px;
}

</style>

</head>

<body style="background-color:#243b55">

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


<font color="white"><u><h2 style="text-align:center">ข้อมูลส่วนตัว</h2></u></font>

<div class="card2">
<?php
		echo " <font color= 'black'><img src='./resource/" .$result['photo']. "' width='100%'/></font>";
	?>

  <h1><?php
					echo  " <font color= 'white'>".$result['username'];
					?></h1>

  <p><?php
					echo " <font color= 'white'>".$result['roles']."</font>";
					?></p>

  <p><?php
					echo " <font color= 'white'>".$result['tel']."</font>";
					?></p>

  <p><button onclick="location.href='edit_profile_form.php';">แก้ไขโปรไฟล์</button></p>
</div>
<?php } ?>

</body>
</html>

	<br/><br/>
		<center><h2><u><font color="white">สินค้าที่คุณลงเทรด</font></u></h2></center>
	 
	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM products WHERE owner = " . " '" . $_SESSION['s_id'] . "' ";
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center' bgcolor = 'white'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 5 == 0) {
						echo "</tr>";
						echo "<tr>";
					}
					$name = $row['name'];
					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='220' height='200'>";
					echo "<h2><center>" . $row['name'] . "</center></h2>";
					echo "<p><center>" . $row['category'] . "</center></p>";
					echo "<p class='price'><center>" . $row['status'] . "</center></p>";
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
