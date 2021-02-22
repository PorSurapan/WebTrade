<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true){
		include("config_header.php");
	}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - แลกเปลี่ยนสินค้า</title>
    <link rel="stylesheet" href="edit_form.css">
    
</head>

<body>
<?php
        $id = $_SESSION['s_id'];
        // echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM exchange WHERE sender = $id";
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
                $pic = $row['picture'];
                $status = $row['status'];
                $contact = $row['contact'];
                $sender = $row['sender'];
                $product = $row['product'];

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $conn->close(); 
    ?>

        <form action="trade.php" method="post" enctype = "multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td width="50%">
                <table>
                <tr>
                    <td>

                        <table >
                            <tr>
                                <br/><br/>
                                <td> <label for="pname">ชื่อสินค้า</label> </td>
                                <td> <?php echo $name; ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td> <label for="describe">คำอธิบาย</label> </td>
                                <td> <?php echo $des; ?></td>
                            </tr>
                            <tr>
                                <td> <label for="status">สถานะ</label> </td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="<?php echo $status; ?>" selected hidden ><?php echo $status; ?></option>
                                        <option value="ยอมรับ">ยอมรับ</option>
                                        <option value="ปฏิเสธ">ปฏิเสธ</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                </td>
                <td width="50%">
                    <table>
                    <tr>
                                <td> <br /><br /><?php echo " <img src='./resource/" .$pic. "' width='400px'/>";?><br /><br /> </td>
                            </tr>
                    </table>
                </td>
            </tr>
        </table>     
            
            <table align="center">
                <tr align="center">
                    <td>
                        <br /><br />
                        <input type="submit" value="แลกเปลี่ยน">
                        <input type="hidden" name="pID" value="<?php echo $id; ?>">
                        <input type="hidden"  name="proID" value="<?php echo $_SESSION['s_id'];?>">
                        <input type="hidden" name="pOwn" value="<?php echo $own; ?>">
                        <input type="hidden" name="product" value="<?php echo $product; ?>">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>