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
    <title>Trade - กระดานรีวิว</title>
    <link rel="stylesheet" href="show_post.css">
	<script src="searchPost.js"></script>

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "manage_post.php?id=" + ind;
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

		if(isset($_POST["show"])) {
			$show = $_POST['show'];
		} else {
			$show = "แสดงทั้งหมด";
		}

        if(isset($_POST["sort"])) {
			$sort = $_POST['sort'];
		} else {
			$sort = "ใหม่สุดก่อน";
		}
	?>
	
	<table align="center" width="60%">
		<tr>
			<form action="main_dashboard.php" method="get">
			<td>
				ค้นหา 
				<input list="word" name="search" placeholder="กรอกคีย์เวิร์ด" onkeyup="searchPost(this.value)" />
				<datalist id="word">
				</datalist>
				<input class="button button1" type="submit" value="ค้นหา">
			</td>
			</form>

			<form name="form" action="main_dashboard.php" method="post">
			<td>
                การมองเห็น 
				<select name="show" id="show" onchange="this.form.submit()">
					<option value="<?php echo $show ?>" selected hidden><?php echo $show ?></option>
					<option value="ทั้งหมด">ทั้งหมด</option>
					<option value="แสดง">แสดง</option>
					<option value="ซ่อน">ซ่อน</option>
				</select>
			</td>
			<td>
				เรียงจาก 
				<select name="sort" id="sort" onchange="this.form.submit()">
					<option value="<?php echo $sort ?>" selected hidden><?php echo $sort ?></option>
					<option value="ใหม่สุดก่อน">ใหม่สุดก่อน</option>
					<option value="เก่าสุดก่อน">เก่าสุดก่อน</option>
				</select>
			</td>
			</form>
		</tr>
	</table>
	

	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");

		if ($search == "")
		{
			if ($show == "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน")
                $sql = "SELECT * FROM dashboard ORDER BY id DESC";
            else if ($show == "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
                $sql = "SELECT * FROM dashboard ORDER BY id ASC";
            else if ($show != "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
                $sql = "SELECT * FROM dashboard WHERE hide = '" . $show . "' ORDER BY id ASC";
            else
                $sql = "SELECT * FROM dashboard WHERE hide = '" . $show . "' ORDER BY id DESC";
		}
		else
		{
			$sql = "SELECT * FROM dashboard WHERE text LIKE '%$search%'";
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

					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='180' height='180'>";
					echo "<h2>" . $row['owner'] . "</h2>";
					echo "<p>" . $row['hide'] . "</p>";
					echo "<p class='price'>" . $row['date'] . "</p>";
					echo "<p><button onclick='edt(" . $row['id'] . ")'>จัดการ</button></p>";
					echo "</div>";
					echo "</td>";
					$i++;
				}
			echo "</tr>";
		echo "</table>";

        $conn->close();
	?>

</body>
</html>