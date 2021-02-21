<?php
	session_start();
	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("config_header.php");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - สินค้าเทรด</title>
    <link rel="stylesheet" href="show_product.css">

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "trade_product.php?id=" + ind;
        }
    </script>
</head>
<body>
	ค้นหา <input type="text" name="search" id="search" placeholder="กรอกชื่อสินค้า" />

	ค้นหาตามหมวดหมู่ 
	<select name="category" id="category">
		<option value="ผลิตภัณฑ์สุขภาพ">ผลิตภัณฑ์สุขภาพ</option>
		<option value="นาฬิกาและแว่นตา">นาฬิกาและแว่นตา</option>
		<option value="รองเท้า">รองเท้า</option>
		<option value="คอมพิวเตอร์และแล็ปท็อป">คอมพิวเตอร์และแล็ปท็อป</option>
		<option value="กล้องและอุปกรณ์ถ่ายภาพ">กล้องและอุปกรณ์ถ่ายภาพ</option>
		<option value="กีฬาและกิจกรรมกลางแจ้ง">กีฬาและกิจกรรมกลางแจ้ง</option>
		<option value="สื่อบันเทิงภายใน">สื่อบันเทิงภายใน</option>
		<option value="เกมและฮ๊อบบี้">เกมและฮ๊อบบี้</option>
		<option value="ยานยนต์">ยานยนต์</option>
		<option value="ของเล่น">ของเล่น</option>
		<option value="เครื่องใช้ในบ้าน">เครื่องใช้ในบ้าน</option>
		<option value="กระเป๋า">กระเป๋า</option>
		<option value="เครื่องใช้ในบ้าน">เครื่องใช้ในบ้าน</option>
		<option value="เครื่องประดับ">เครื่องประดับ</option>
		<option value="เครื่องใช้ไฟฟ้าภายในบ้าน">เครื่องใช้ไฟฟ้าภายในบ้าน</option>
		<option value="สัตว์เลี้ยง">สัตว์เลี้ยง</option>
		<option value="เครื่องเขียน หนังสือ และดนตรี">เครื่องเขียน หนังสือ และดนตรี</option>
		<option value="อื่น ๆ">อื่น ๆ</option>
	</select>

	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM products WHERE hide = 'แสดงอยู่'";
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 5 == 0) {
						echo "</tr>";
						echo "<tr>";
					}

					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='200' height='200'>";
					echo "<h2>" . $row['name'] . "</h2>";
					echo "<p>" . $row['category'] . "</p>";
					echo "<p class='price'>" . $row['status'] . "</p>";
					echo "<p><button onclick='edt(" . $row['id'] . ")'>แลกเปลี่ยน</button></p>";
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