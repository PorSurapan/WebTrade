<?php
	session_start();

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
		header("Location: login.html");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - การโฆษณา</title>
    <link rel="stylesheet" href="show_ads.css">
	<script src="searchDate.js"></script>
    <script src="showAds.js"></script>

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "manage_ads.php?id=" + ind;
        }
    </script>
</head>

<body>
	<?php
		if(isset($_GET["search"])) {
			$search = $_GET['search'];
		} else {
			$search = "";
		}
	?>
	
	<table align="center" width="35%">
		<tr align="center">
			<form action="main_ads.php" method="get">
			<td>
				ค้นหา 
				<input list="date" name="search" placeholder="กรอกวันที่" onkeyup="searchDate(this.value)" />
				<datalist id="date">
				</datalist>
				<input class="button button1" type="submit" value="ค้นหา">
			</td>
        </tr>
        <tr align="center">
            <td>
				<a class="button button1" href="ads_form.php">เพิ่มโฆษณา</a>
			</td>
			</form>
		</tr>
	</table>
	

	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");

		if ($search == "")
		{
			$sql = "SELECT * FROM advertising ORDER BY hide DESC, date DESC";
		}
		else
		{
			$sql = "SELECT * FROM advertising WHERE date LIKE '%$search%'";
		}

		//echo $sql;
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 6 == 0) {
						echo "</tr>";
						echo "<tr>";
					}

                    echo "<form action='adsShow.php' method='post'>";
					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='190' height='190'>";
					echo "<p class='price'>วันแสดงโฆษณา</p>";
					echo "<p class='price'>" . $row['date'] . "</p>";
                    echo "<input type='hidden' name='id' value=" . $row['id'] . ">";
					echo "<p><button type='submit'>" . $row['hide'] . "</button></p>";					
                    echo "</div>";
					echo "</td>";
                    echo "</form>";
					$i++;
				}
			echo "</tr>";
		echo "</table>";

        $conn->close();
	?>

</body>
</html>