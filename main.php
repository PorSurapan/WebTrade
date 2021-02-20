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
    <title>Trade - สินค้าเทรด</title>
    <link rel="stylesheet" href="show_product.css">

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "manage_product.php?id=" + ind;
        }
    </script>
</head>
<body>
	<table align="center" width="90%">
		<tr>
			<td>
				ค้นหา
				<input type="text" name="search" id="search" placeholder="กรอกชื่อสินค้า" />
			</td>
			<td>
				หมวดหมู่ 
				<select name="category" id="category">
					<option value="ผลิตภัณฑ์สุขภาพ">ทุกประเภท</option>
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
			</td>
			<td>
				สถานะ 
				<select name="status" id="status">
					<option value="ทุกสถานะ">ทุกสถานะ</option>
					<option value="รอเทรด">รอเทรด</option>
					<option value="เทรดแล้ว">เทรดแล้ว</option>
				</select>
			</td>
			<td>
				เรียงจาก
				<select name="sort" id="sort">
					<option value="ใหม่สุดก่อน">ใหม่สุดก่อน</option>
					<option value="เก่าสุดก่อน">เก่าสุดก่อน</option>
				</select>
			</td>
			<td>
				การมองเห็น
				<select name="show" id="show">
					<option value="แสดงทั้งหมด">แสดงทั้งหมด</option>
					<option value="ที่แสดงอยู่">ที่แสดงอยู่</option>
					<option value="ที่ถูกซ่อน">ที่ถูกซ่อน</option>
				</select>
			</td>
		</tr>
	</table>

	<?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM products ORDER BY id DESC";
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
					// echo "<img src='resource/" . $row['picture'] . "'" . "style='width:100%'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='200' height='200'>";
					echo "<h2>" . $row['name'] . "</h2>";
					echo "<p>" . $row['category'] . "</p>";
					echo "<p class='price'>" . $row['status'] . "</p>";
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