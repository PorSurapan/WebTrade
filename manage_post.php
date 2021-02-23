<?php
	session_start();

	if (isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
        header("Location: login.html");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - จัดการกระดานรีวิว</title>
    <link rel="stylesheet" href="edit_form.css">

    <script type="text/javascript">
        function switchImg(num) {
            if (num == 0) {
                str = "<img src='resource/sh_green.png' height='40' onclick='switchImg(1)'>";
                document.getElementById("visual").innerHTML = str;
                document.getElementById("hide").value = "แสดง";
            } else {
                str = "<img src='resource/sh_red.png' height='40' onclick='switchImg(0)'>";
                document.getElementById("visual").innerHTML = str;
                document.getElementById("hide").value = "ซ่อน";
            }
        }
    </script>
</head>

<body>
    <?php
        $id = $_GET['id'];
        // echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM dashboard WHERE id = $id";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $dID = $id;
                $own = $row['owner'];
                $txt = $row['text'];
                $date = $row['date'];
                $pic = $row['picture'];
                $hide = $row['hide'];

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $conn->close(); 
    ?>

        <form action="post_update.php" method="post" enctype = "multipart/form-data">
            <table align="center">
                <tr>
                    <td width="50%">

                        <table align="center">
                            <tr>
                                <td> <label for="did">ไอดีผู้ใช้</label> </td>
                                <td> <input type="text" id="did" name="userID" value="<?php echo $own; ?>" readonly required> </td>
                            </tr>
                            <tr>
                                <td> <label for="txt">ข้อความ</label> </td>
                                <td> <input type="text" id="txt" name="txt" placeholder="ข้อความรีวิว" value="<?php echo $txt; ?>" required> </td>
                            </tr>
                            <tr>
                                <td> <label for="dt">วัน-เวลา</label> </td>
                                <td> <input type="text" id="dt" name="date" value="<?php echo $date; ?>" readonly required> </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="dImage">รูปสินค้า</label> </td>
                                <td> <br /><br /><input type="file" id="dImage" name="postImage" onchange="preview()"><br /><br /> </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="visual">การมองเห็น</label> </td>
                                <td>
                                    <br />
                                    <?php if ($hide == "ซ่อน") { ?>
                                        <p id="visual"><img src='resource/sh_red.png' height='40' onclick='switchImg(0)'></p>
                                    <?php } else { ?>
                                        <p id="visual"><img src='resource/sh_green.png' height='40' onclick='switchImg(1)'></p>
                                    <?php } ?>
                                    <input type="hidden" id="hide" name="hide" value="<?php echo $hide; ?>" required>
                                </td>
                            </tr>
                        </table>

                    </td>
                    <td>

                        <table align="center">
                            <tr align="center">
                                <script type="text/javascript">
                                    function preview() {
                                        frame.src=URL.createObjectURL(event.target.files[0]);
                                    }
                                </script>

                                <td></td>
                                <td> <img id="frame" src="resource/<?php echo $pic; ?>" height="350px"/> </td>
                            </tr>
                        </table>

                    </td>
                

            <table align="center">
                <tr align="center">
                    <td>
                        <br /><br />
                        <input type="submit" value="บันทึก">
                        <input type="hidden" name="dID" value="<?php echo $id; ?>">
                    </td>
                </tr>
            </table>
        </form>

        <?php
		include("footer_dev.php");
	?>
</body>
</html>