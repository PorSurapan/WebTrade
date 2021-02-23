<?php
session_start();
	if(isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("config_header.php");
	else
		header("Location: login.html");
?>

<html>
<head>
    <title>Trade - ข้อมูลส่วนตัว</title>
	<link rel="stylesheet" href = "profile_css.css">

<script type = "text/javascript">

function ConfirmDelete()
{
 var del = confirm("คุณแน่ใจว่าจะลบสินค้าชิ้นนี้ใช่หรือไม่?");
 if (del == true)
	return true;
	else
	return false;
}

function ConfirmDelete2()
{
 var del = confirm("คุณแน่ใจว่าจะปิดบัญชีใช่หรือไม่?");
 if (del == true)
	return true;
	else
	return false;
}

</script>
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
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 20px;
}

</style>

</head>

<body>
<div class="container">
  <div class="center">
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

  <h2 style="text-align:center">ข้อมูลส่วนตัว</h2>
<div class="infocardContainer">
  <div id="main">

  <?php
		echo "<img src='./resource/" .$result['photo']. "' width='100%'/></font>";
	?>
  </div>

  <div id="textbois">

    <h1><?php echo $result['username'];?></h1>

    <h4><?php echo $result['roles']."</font>";?></h4>

    <h4><?php echo $result['tel']."</font>";?></h4>

<div id="hotlinks">
<a href="edit_profile_form.php">
        <img id="edit" src="http://cdn.onlinewebfonts.com/svg/img_140266.png" target="_blank"></img>
      </a>
	  <a href="close.php?id= <?php echo $_SESSION['s_id'] ?>" onclick = "return ConfirmDelete2()">
        <img id="del" src="https://icon-library.com/images/cancel-icon-png/cancel-icon-png-2.jpg" target="_blank"></img>
      </a>
      </div>
  </div>
</div>

<?php } ?>


	<br/><br/>
		<center><h2>สินค้าที่คุณลงเทรด</h2></center>
	 
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
	<center><h2>สินค้าที่คุณนำไปเทรด</h2></center>
	 
	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM exchange WHERE owner = " . " '" . $_SESSION['s_id'] . "' ";
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
					echo "<p class='price'><center>" . $row['status'] . "</center></p>";
					echo '<button><a href="detail_product_trade.php?id=' . $row['id']  .'&product=' . $row['product'] . '">รายละเอียด</a></td></button>';
					echo "</div>";
					echo "</td>";

					$i++;
				}
			echo "</tr>";
		echo "</table>";

        $conn->close();
	?>

<?php
		include("footer_dev.php");
?>

</body>
</html>
