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

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $conn->close(); 
    ?>

        <form action="trade.php" method="post" enctype = "multipart/form-data">
        <table align="center">
                <tr>
                    <td width="50%">

                        <table align="center">
                            <tr><br/><br/></tr>
                            <tr>
                                <td> <label for="pname">ชื่อสินค้า</label> <br/><br/></td>
                                <td> <?php echo $name;?> <br/><br/></td>
                                
                            </tr>
                            <tr>
                                <td> <label for="describe">คำอธิบาย</label><br/><br/> </td>
                                <td> <?php echo $des;?><br/><br/></td>
                            </tr>
                            <tr>
                                <td> <label for="category">หมวดหมู่</label><br/><br/> </td>
                                <td> <?php echo  $cate;?><br/><br/></td>
                            </tr>
                            <tr>
                                <td> <label for="status">สถานะ</label><br/><br/> </td>
                                <td> <?php echo  $status;?><br/><br/></td>
                            </tr>
                            <tr>
                                <td> <br /><label for="pimage">รูปสินค้า</label> </td>
                                <td><?php echo " <img src='./resource/" .$pic. "' width='400px'/>";?></td>
                            </tr>
                    </table>
        </table>
        <table align="center">
                <tr align="center">
                    <td>
                        <br /><br />
                        <input type="submit" value="แลกเปลี่ยน">
                        <input type="hidden"  name="pID" value="<?php echo $id; ?>">
                        <input type="hidden"  name="proID" value="<?php echo $_SESSION['s_id'];?>">
                        <input type="hidden"  name="pOwn" value="<?php echo $own; ?>">
                    </td>
                </tr>
            </table>
    </form>
</body>
</html>