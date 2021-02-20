<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_id'] == true)
    include("header_sender.html");
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
<form action="products.php" method="post" enctype="multipart/form-data">
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
              <br/><br/><br/>
              <textarea rows="4" cols="50" id="description" name="description">
                </textarea>
        </div>

        <div class="user-box">
                <label for="category" class="floatLabel">ประเภทสินค้า</label>
                <br/><br/>
                <select id="category" name="category" required>
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
        </div>
          
        <div class="user-box">
          <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['s_id'];?>">
        </div>

        <div class="user-box">
          <input type="hidden" id="status" name="status" value="รอเทรด">
        </div>

        <div class="user-box">
          <input type="hidden" id="hide" name="hide" value="1">
        </div>

        <center>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="ลงเทรดสินค้า" id="submit" class="button">
            </a>
</form>
</div>
        </center>
</body>
</html>