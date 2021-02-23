<?php
	session_start();

	if (isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("config_header.php");
	else
		header("Location: login.html");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - กระดานรีวิว</title>
    <link rel="stylesheet" href="home_dashboard_css.css">

</head>

<style>
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

<center>
<br/>
<button class="button" onClick="location.href='dashboard_form.php'">เพิ่มรีวิว</button>
<br/><br/><br/>
</center>   

<body style="background-color: #FEFCF5;">
	
	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM dashboard WHERE hide = 'แสดงอยู่'";
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 3 == 0) {
						echo "</tr>";
						echo "<tr>";
					}

					echo "<td bgcolor = '#141e30'>";
                    echo "<br><center><font color='grey' size='1px'>" . $row['date'] . "</font></center>";
                    echo "<div class='container'>";
					echo "<div class='box'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='200' height='200'>";
					echo "<span><b><font color='white' size='2px'>" . $row['text'] . "</font></b></span>";

					echo "</div>";
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