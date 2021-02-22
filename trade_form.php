<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_id'] == true)
    include("header_receiver.html");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name='viweport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <link rel="stylesheet" href = "form_css.css">
    <title>ลงสินค้า</title>
<style>
    .button {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border: none;
    background: none;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body> 
<div class="login-box">
    <h2>สินค้าที่ต้องการเทรด</h2>
<form action="exchange.php" method="post" enctype="multipart/form-data">
        <div class="user-box">
              <label for="picture" class="floatLabel">รูปภาพสินค้า</label>
              <br/><br/>
              <input id="picture" name="picture" type="file" required>
        </div>

        <div class="user-box">       
              <input id="name" name="name" type="text" required>
              <label for="name" class="floatLabel">ชื่อสินค้า</label>
        </div>

        <div class="user-box">
              <label for="description" class="floatLabel">คำอธิบายสินค้า</label>
              <br/><br/>
              <textarea rows="4" cols="50" id="description" name="description">
                </textarea>
        </div>

        <div class="user-box">
              <input id="tel" name="tel" type="text" required>
              <label for="tel" class="floatLabel">เบอร์โทร</label>
        </div>

          
        <div class="user-box">
          <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['s_id'];?>">
        </div>



<?php 
    
    $id = $_GET['pID'];

    $conn=mysqli_connect("localhost", "root", "","trader");
    $conn->query("SET NAMES UTF8");
    $sql = "SELECT * FROM products WHERE id = $id";
    $rs = $conn->query($sql);

        while($row = $rs->fetch_assoc()) {
            $pid = $row['id'];
            $owner = $row['owner'];
        }

        $conn->close();
?>


        <div class="user-box">
          <input type="hidden" id="sender" name="sender" value="<?php echo $pid ?>">
        </div>

        <div class="user-box">
          <input type="hidden" id="product" name="product" value="<?php echo $owner ?>">
        </div>
        

        <center>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="แลกเปลี่ยน" id="submit" class="button">
            </a>
</form>
</div>
        </center>
</body>
</html>