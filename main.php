<?php
	session_start();

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("header_admin.html");
?>

<html>
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
</body>
</html>