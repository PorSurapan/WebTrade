<?php
	session_start();
	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("config_header.php");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - แลกเปลี่ยนสินค้า</title>
    <link rel="stylesheet" href="show_list.css">
    <script type="text/javascript">
        function edt(ind)
        {
            window.location.href = "request_trade.php?id=" + ind;
        }
    </script>
</head>

<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "trader");
        $conn->query("SET NAMES UTF8");
        $sql = "SELECT * FROM exchange WHERE sender = " . " '" . $_SESSION['s_id'] . "' ";
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
					echo "<center><img class='centered-and-cropped' src='resource/" . $row['picture'] . "'" . "width='230' height='230'></center>";
                    echo "<div class='container'>";
                    echo "<h2><center>" . $row['name'] . "</center></h2>";
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