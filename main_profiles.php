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
    <title>Trade - ผู้ใช้งาน</title>
    <link rel="stylesheet" href="show_profiles.css">
	<script src="searchProfiles.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "manage_profile.php?id=" + ind;
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

		if(isset($_POST["role"])) {
			$role = $_POST['role'];
		} else {
			$role = "ทุกบทบาท";
		}

		if(isset($_POST["status"])) {
			$sta = $_POST['status'];
		} else {
			$sta = "ทุกสถานะ";
		}

        if(isset($_POST["sort"])) {
			$sort = $_POST['sort'];
		} else {
			$sort = "ใหม่สุดก่อน";
		}
	?>
	
	<table align="center" width="75%">
		<tr>
			<form action="main_profiles.php" method="get">
			<td>
				ค้นหา 
				<input list="name" name="search" placeholder="กรอกชื่อผู้ใช้" onkeyup="searchProfiles(this.value)" />
				<datalist id="name">
				</datalist>
				<input class="button button1" type="submit" value="ค้นหา">
			</td>
			</form>

			<form name="form" action="main_profiles.php" method="post">
			<td>
				บทบาท 
				<select name="role" id="role" onchange="this.form.submit()">
					<option value="<?php echo $role ?>" selected hidden><?php echo $role ?></option>
					<option value="ทุกบทบาท">ทุกบทบาท</option>
					<option value="แอดมิน">แอดมิน</option>
                    <option value="ผู้ลงเทรด">ผู้ลงเทรด</option>
                    <option value="ผู้ขอเทรด">ผู้ขอเทรด</option>
				</select>
			</td>
			<td>
				สถานะ 
				<select name="status" id="status" onchange="this.form.submit()">
					<option value="<?php echo $sta ?>" selected hidden><?php echo $sta ?></option>
					<option value="ทุกสถานะ">ทุกสถานะ</option>
					<option value="ปกติ">ปกติ</option>
                    <option value="ถูกระงับ">ถูกระงับ</option>
                    <option value="ปิดบัญชี">ปิดบัญชี</option>
					<option value="ถูกแบนถาวร">ถูกแบน</option>
                    
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
			if ($role == "ทุกบทบาท" && $sta == "ทุกสถานะ" && $sort == "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles ORDER BY id DESC";
            else if ($role == "ทุกบทบาท" && $sta == "ทุกสถานะ" && $sort != "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles ORDER BY id ASC";
            else if ($role == "ทุกบทบาท" && $sta != "ทุกสถานะ" && $sort != "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles WHERE status = '" . $sta . "' ORDER BY id ASC";
            else if ($role == "ทุกบทบาท" && $sta != "ทุกสถานะ" && $sort == "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles WHERE status = '" . $sta . "' ORDER BY id DESC";
            else if ($role != "ทุกบทบาท" && $sta != "ทุกสถานะ" && $sort != "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles WHERE roles = '" . $role . "' AND status = '" . $sta . "' ORDER BY id ASC";
            else if ($role != "ทุกบทบาท" && $sta != "ทุกสถานะ" && $sort == "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles WHERE roles = '" . $role . "' AND status = '" . $sta . "' ORDER BY id DESC";
            else if ($role != "ทุกบทบาท" && $sta == "ทุกสถานะ" && $sort == "ใหม่สุดก่อน")
                $sql = "SELECT * FROM profiles WHERE roles = '" . $role . "' ORDER BY id DESC";
            else
                $sql = "SELECT * FROM profiles WHERE roles = '" . $role . "' ORDER BY id ASC";
		}
		else
		{
			$sql="SELECT * FROM profiles WHERE username LIKE '$search%'";
		}

		//echo $sql;
        $rs = $conn->query($sql);
		$i = 0;

		echo "<table align='center'>";
        	echo "<tr>";
				while($row = $rs->fetch_assoc()) {
					if ($i % 8 == 0) {
						echo "</tr>";
						echo "<tr>";
					}

					echo "<td>";
					echo "<div class='card'>";
					echo "<img class='centered-and-cropped' src='resource/" . $row['photo'] . "'" . "width='150' height='150'>";
					echo "<h2>" . $row['username'] . "</h2>";
					echo "<p>" . $row['roles'] . "</p>";
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