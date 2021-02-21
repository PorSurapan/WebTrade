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
    <title>Trade - จัดการผู้ใช้</title>
    <link rel="stylesheet" href="edit_form.css">

    <script type="text/javascript">
        function switchImg(num) {
            if (num == 0) {
                str = "<img src='resource/sr_blue.png' height='40' onclick='switchImg(1)'>";
                document.getElementById("visual").innerHTML = str;
                document.getElementById("hide").value = "ผู้ลงเทรด";
            } else {
                str = "<img src='resource/sr_green.png' height='40' onclick='switchImg(0)'>";
                document.getElementById("visual").innerHTML = str;
                document.getElementById("hide").value = "ผู้ขอเทรด";
            }
        }
    </script>
</head>

<body onload="getImg();">
    <?php
        $id = $_GET['id'];
        // echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM profiles WHERE id = $id";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $uid = $id;
                $name = $row['username'];
                $pwd = $row['password'];
                $role = $row['roles'];
                $tel = $row['tel'];
                $pic = $row['photo'];
                $status = $row['status'];

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $conn->close(); 
    ?>

        <form action="profile_update.php" method="post" enctype = "multipart/form-data">
            <table align="center">
                <tr>
                    <td width="50%">

                        <table align="center">
                            <tr>
                                <td> <label for="uid">ไอดีผู้ใช้</label> </td>
                                <td> <input type="text" id="uid" name="userID" value="<?php echo $uid; ?>" readonly required> </td>
                            </tr>
                            <tr>
                                <td> <label for="uname">ชื่อผู้ใช้</label> </td>
                                <td> <input type="text" id="uname" name="username" placeholder="ชื่อผู้ใช้" value="<?php echo $name; ?>" required> </td>
                            </tr>
                            <tr>
                                <td> <label for="tel">มือถือ</label> </td>
                                <td> <input type="text" id="tel" name="tel" placeholder="เบอร์มือถือ" value="<?php echo $tel; ?>" required> </td>
                            </tr>
                            <tr>
                                <td> <label for="status">สถานะ</label> </td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="<?php echo $status; ?>" selected hidden ><?php echo $status; ?></option>
                                        <option value="ปกติ">ปกติ</option>
                                        <option value="ถูกระงับ">ถูกระงับ</option>
                                        <option value="ปิดบัญชี">ปิดบัญชี</option>
                                        <option value="ถูกแบนถาวร">ถูกแบนถาวร</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="uImage">รูปโปรไฟล์</label> </td>
                                <td> <br /><br /><input type="file" id="uImage" name="profileImage" onchange="preview()"><br /><br /> </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if ($role != "แอดมิน") { ?>
                                        <br /><label for="visual">บทบาท</label>
                                    <?php } else { } ?>
                                </td>
                                <td>
                                    <br />
                                    <?php if ($role == "ผู้ขอเทรด") { ?>
                                        <p id="visual"><img src='resource/sr_green.png' height='40' onclick='switchImg(0)'></p>
                                    <?php } else if ($role == "ผู้ลงเทรด") { ?>
                                        <p id="visual"><img src='resource/sr_blue.png' height='40' onclick='switchImg(1)'></p>
                                    <?php } else { } ?>
                                    <input type="hidden" id="hide" name="role" value="<?php echo $role; ?>" required>
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
                        <input type="hidden" name="uID" value="<?php echo $id; ?>">
                        <input type="hidden" name="uPwd" value="<?php echo $pwd; ?>">
                    </td>
                </tr>
            </table>
        </form>

</body>
</html>