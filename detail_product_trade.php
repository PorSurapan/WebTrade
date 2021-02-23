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
    <title>Trade - รายละเอียดสินค้าที่คุณนำไปเทรด</title>
    <link rel="stylesheet" href="edit_form.css">
    
</head>

<body>

<?php
        $id = $_GET['id'];
        $prodt = $_GET['product'];
        //echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM products WHERE id = $prodt";
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
            

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $sql = "SELECT * FROM profiles WHERE id = $own";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $username = $row['username'];
                $tel = $row['tel'];
            

            }
        }
        else
        {
            echo "Execution Error!";
        }

        $sql = "SELECT * FROM exchange WHERE id = $id";
        // echo $sql; //print out for debugging
        $rs=$conn->query($sql);

        if ($rs)
        {
            while($row = $rs->fetch_assoc())
            {
                $pic2 = $row['picture'];
                $name2 = $row['name'];
                $des2 = $row['description'];
                $status2 = $row['status'];
            

            }
        }
        else
        {
            echo "Execution Error!";
        }


        $conn->close(); 
    ?>

        
        <table align="center" width="100%">
            <tr>
                <td width="50%">
                <table>
                <tr>
                    <td>

                        <table >
                            <tr>
                            <td>
                                <h2>สินค้าที่คุณขอเทรด</h2>
                            </td>
                            </tr>
                            <tr>
                                <td> <br/><br/><label for="pname">ชื่อสินค้า</label> </td>
                                <td> <br/><br/><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="describe">คำอธิบาย</label> </td>
                                <td><br/><br/> <?php echo $des; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="describe">สถานะ</label> </td>
                                <td><br/><br/> <?php echo $status; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="username">ชื่อเจ้าของ</label> </td>
                                <td><br/><br/> <?php echo $username; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="tel">เบอร์ติดต่อ</label> </td>
                                <td><br/><br/> <?php echo $tel; ?></td>
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
            <tr>
            <td>
                <br/><br/><hr/>
            </td>
            <td>
                <br/><br/><hr/>
            </td>
            </tr>
            <tr>
            <td>
                        <table >
                        <tr>
                            <td>
                                <h2>สินค้าที่คุณนำไปเทรด</h2>
                            </td>
                            </tr>
                            <tr>
                                <br/><br/>
                                <td> <br/><br/><label for="pname">ชื่อสินค้า</label> </td>
                                <td> <br/><br/><?php echo $name2; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="describe">คำอธิบาย</label> </td>
                                <td><br/><br/> <?php echo $des2; ?></td>
                            </tr>
                            <tr>
                                <td><br/><br/> <label for="describe">สถานะ</label> </td>
                                <td><br/><br/> <?php echo $status2; ?></td>
                            </tr> 
                        </table>
            </td>
            <td>
            <table>
                    <tr>
                                <td> <br /><br /><?php echo " <img src='./resource/" .$pic2. "' width='400px'/>";?><br /><br /> </td>
                            </tr>
                    </table>
            </td>

            </tr>
        </table>     
            <br/><br/>
        
</body>
</html>