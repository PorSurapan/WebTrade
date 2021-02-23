<?php
session_start();
	if(isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("config_header.php");
	else
        header("Location: login.html");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - แลกเปลี่ยนสินค้า</title>
    <link rel="stylesheet" href="edit_form.css">
    
</head>

<body>



<?php
        $id = $_GET['id'];
        //echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM exchange WHERE id = $id";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $pid = $row['id'];
                $own = $row['owner'];
                $name = $row['name'];
                $des = $row['description'];
                $pic = $row['picture'];
                $status = $row['status'];
                if($status == null || $status == "")
                    $status = '--โปรดเลือก--';

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
                            <tr>
                                <td><br/><br/> <label for="describe">คำอธิบาย</label> </td>
                                <td><br/><br/> <?php echo $des; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="describe">ติดต่อ</label> </td>
                                <td><br/><br/> <?php echo $contact; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="status">สถานะ</label> </td>
                                <td><br/><br/>
                                    <select id="status" name="status" required>
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
                        <input type="hidden"  name="owner" value="<?php echo $own;?>">
                        <input type="hidden" name="prodID" value="<?php echo $product; ?>">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>