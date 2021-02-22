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
    <link rel="stylesheet" href="detail_product.css">

    <style>
.button {
  border-radius: 4px;
  background-color: #4CAF50;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
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
        
        <div class='c'>
  <details>
    <summary>ชื่อสินค้า</summary>
    <p>
      <b><?php echo $name;?></b>
    </p>
  </details>

  <details>
    <summary>คำอธิบาย</summary>
    <p>
    <b><?php echo $des;?></b>
    </p>
  </details>

  <details>
    <summary>หมวดหมู่</summary>
    <p>
    <b><?php echo  $cate;?></b>
    </p>
  </details>

  <details>
    <summary>สถานะ</summary>
    <p>
    <b><?php echo  $status;?>
    <input type="hidden"  name="status" value="<?php echo $status; ?>"></b>
    </p>
  </details>

  <details>
    <summary>รูปสินค้า</summary>
    <p>
    <?php echo " <img src='./resource/" .$pic. "' width='400px'/>";?>
    </p>
  </details>

  <form action="trade_form.php" method="get">
    <table align="center">
                <tr align="center">
                    <td>
                        <br /><br />
                        <a href="trade_form.php"><button class="button"><span>แลกเปลี่ยน</span></button>
                        <input type="hidden"  name="pID" value="<?php echo $id; ?>">
                        <input type="hidden"  name="pOwn" value="<?php echo $own; ?>">
                      
                    </td>
                </tr>
            </table>
  </div>
</div>
</form>

    
</body>
</html>
