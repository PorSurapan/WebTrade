<?php
	session_start();
	include("config_header.php");

	if (!isset($_SESSION['views'])) { 
		$_SESSION['views'] = 0;
	}
	
	$_SESSION['views'] = $_SESSION['views'] + 1;
	$session = $_SESSION['views'];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - สินค้าเทรด</title>
    <link rel="stylesheet" href="show_product.css">
	<link rel="stylesheet" href="img_modal.css">
	<script src="searchProducts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "trade_product.php?id=" + ind;
        }
    </script>
</head>
<body>
	<?php
		$conn=mysqli_connect("localhost", "root", "", "trader");
		$conn->query("SET NAMES UTF8");
		$sql = "SELECT * FROM advertising WHERE hide = 'แสดง' LIMIT 1";

		$rs=$conn->query($sql);
		while($row = $rs->fetch_assoc())
		{
			$path = $row['picture'];
		}
		$conn->close();
	?>

	<input type="hidden" id="session" value="<?php echo $session ?>" />
	<img id="myImg" src="resource/<?php echo $path ?>" style="display: none;">

	<!-- modal -->
	<div id="myModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="img01">
	</div>

	<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the image and insert it inside the modal
		var img = document.getElementById("myImg");
		var modalImg = document.getElementById("img01");
		img.onload = function() {
			var num = document.getElementById("session").value;
			
			if (num == 1) {
				modal.style.display = "block";
				modalImg.src = this.src;
			}
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> close the modal
		span.onclick = function() { 
			modal.style.display = "none";
		}
	</script>












	<?php
		if(isset($_GET["search"])) {
			$search = $_GET['search'];
		} else {
			$search = "";
		}

		if(isset($_POST["category"])) {
			$cate = $_POST['category'];
		} else {
			$cate = "ทุกประเภท";
		}

		if(isset($_POST["status"])) {
			$sta = $_POST['status'];
		} else {
			$sta = "ทุกสถานะ";
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

	<table align="center" width="90%">
		<tr>
			<form action="home.php" method="get">
			<td>
				ค้นหา 
				<input list="name" name="search" placeholder="กรอกชื่อสินค้า" onkeyup="searchProducts(this.value)" />
				<datalist id="name">
				</datalist>
				<input class="button button1" type="submit" value="ค้นหา">
			</td>
			</form>

			<form name="form" action="home.php" method="post">
			<td>
				หมวดหมู่ 
				<select name="category" id="category" onchange="this.form.submit()">
					<option value="<?php echo $cate ?>" selected hidden><?php echo $cate ?></option>
					<option value="ทุกประเภท">ทุกประเภท</option>
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
				<select name="status" id="status" onchange="this.form.submit()">
					<option value="<?php echo $sta ?>" selected hidden><?php echo $sta ?></option>
					<option value="ทุกสถานะ">ทุกสถานะ</option>
					<option value="รอเทรด">รอเทรด</option>
					<option value="เทรดแล้ว">เทรดแล้ว</option>
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
		//  $sql = "SELECT * FROM products ORDER BY id DESC";

		if ($search == "")
		{
			if ($cate == "ทุกประเภท" && $sta == "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products ORDER BY id DESC";
			else if ($cate == "ทุกประเภท" && $sta == "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products ORDER BY id ASC";
			else if ($cate == "ทุกประเภท" && $sta == "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products WHERE hide = '" . $show . "' ORDER BY id ASC";
			else if ($cate == "ทุกประเภท" && $sta != "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE status = '" . $sta . "' AND hide = '" . $show . "' ORDER BY id ASC";
			else if ($cate == "ทุกประเภท" && $sta == "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE hide = '" . $show . "' ORDER BY id DESC";
			else if ($cate == "ทุกประเภท" && $sta != "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE status = '" . $sta . "' ORDER BY id DESC";
			else if ($cate == "ทุกประเภท" && $sta != "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE status = '" . $sta . "' AND hide = '" . $show . "' ORDER BY id DESC";
			else if ($cate == "ทุกประเภท" && $sta != "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE status = '" . $sta . "' ORDER BY id ASC";
			else if ($cate != "ทุกประเภท" && $sta != "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND status = '" . $sta . "' AND hide = '" . $show . "' ORDER BY id ASC";
			else if ($cate != "ทุกประเภท" && $sta != "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort == "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND status = '" . $sta . "' AND hide = '" . $show . "' ORDER BY id DESC";
			else if ($cate != "ทุกประเภท" && $sta != "ทุกสถานะ" && $sort == "ใหม่สุดก่อน" && $show == "แสดงทั้งหมด")
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND status = '" . $sta . "' ORDER BY id DESC";
			else if ($cate != "ทุกประเภท" && $sta == "ทุกสถานะ" && $sort == "ใหม่สุดก่อน" && $show == "แสดงทั้งหมด")
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' ORDER BY id DESC";
			else if ($cate != "ทุกประเภท" && $sta != "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน" )
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND status = '" . $sta . "' ORDER BY id ASC";
			else if ($cate != "ทุกประเภท" && $sta == "ทุกสถานะ" && $show != "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND hide = '" . $show . "' ORDER BY id ASC";
			else if ($cate != "ทุกประเภท" && $sta == "ทุกสถานะ" && $show == "แสดงทั้งหมด" && $sort != "ใหม่สุดก่อน")
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' ORDER BY id ASC";
			else
				$sql = "SELECT * FROM products WHERE category = '" . $cate . "' AND hide = '" . $show . "' ORDER BY id DESC";
		}
		else
		{
			$sql="SELECT * FROM products WHERE name LIKE '$search%'";
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
					// echo "<img src='resource/" . $row['picture'] . "'" . "style='width:100%'>";
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