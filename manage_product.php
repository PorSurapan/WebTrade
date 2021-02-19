<?php
	session_start();

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
		//go to login
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - จัดการสินค้า</title>
    <link rel="stylesheet" href="edit_form.css">
</head>

<body id="demo">
    <?php
        $id = $_GET['id'];
        // echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM products WHERE id = $id";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $pid = $id;
                $own = $row['owner'];
                $name = $row['name'];
                $des = $row['description'];
                $cate = $row['category'];
                $pic = $row['picture'];
                $status = $row['status'];
                $hide = $row['hide'];

                // echo $pid;
                // echo $own;
                // echo $name;
                // echo $des;
                // echo $cate;
                // echo $pic;
                // echo $status;
                 // echo $hide;
            }
        }
        else
        {
            echo "Execution Error!";
        }

        $conn->close(); 
    ?>

        <form action="product_update.php" method="post" enctype = "multipart/form-data">
            <table align="center">
                <tr>
                    <td width="50%">

                        <table align="center">
                            <tr>
                                <td> <label for="pname">ชื่อสินค้า</label> </td>
                                <td> <input type="text" id="pname" name="productName" placeholder="ชื่อสินค้า" value="<?php echo $name; ?>" required> </td>
                            </tr>
                            <tr>
                                <td> <label for="describe">คำอธิบาย</label> </td>
                                <td> <input type="text" id="describe" name="description" placeholder="รายละเอียดสินค้า" value="<?php echo $des; ?>" required> </td>
                            </tr>
                            <tr>
                                <td> <label for="category">หมวดหมู่</label> </td>
                                <td> 
                                    <select id="category" name="category">
                                        <option value="<?php echo $cate; ?>" selected hidden ><?php echo $cate; ?></option>
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
                            </tr>
                            <tr>
                                <td> <label for="status">สถานะ</label> </td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="<?php echo $status; ?>" selected hidden ><?php echo $status; ?></option>
                                        <option value="รอเทรด">รอเทรด</option>
                                        <option value="เทรดแล้ว">เทรดแล้ว</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="pimage">รูปสินค้า</label> </td>
                                <td> <br /><input type="file" id="pimage" name="productImage" onchange="preview()"><br /><br /> </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="hide">แสดงสินค้า</label> </td>
                                <td>
                                    <br /><p id="visual" onload="loadImage()"></p>
                                    <script type="text/javascript">
                                        function loadImage() {
                                            alert("Image is loaded");
                                        }
                                    </script>
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
                        <input type="hidden" name="pID" value="<?php echo $id; ?>">
                        <input type="hidden" name="pOwn" value="<?php echo $own; ?>">
                        <input type="hidden" name="hide" value="<?php echo $hide; ?>">
                    </td>
                </tr>
            </table>
        </form>

</body>
</html>