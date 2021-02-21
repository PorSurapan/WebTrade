<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
    <meta charset="UTF-8">
    <meta name='viweport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <link rel="stylesheet" href = "form_css.css">
    <title>สมัครสมาชิก</title>
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
<form action="register.php" method="post">
    <h2>สมัครสมาชิก</h2>

        <div class="user-box">
              <label for="photo" class="floatLabel">อัพโหลด</label>
              <br/><br/>
              <input id="photo" name="photo" type="file" required>
              
        </div>

        <div class="user-box">
              <input id="username" name="username" type="text" required>
              <label for="username" class="floatLabel">ชื่อผู้ใช้</label>
        </div>

        <div class="user-box">
              <input id="password" name="password" type="password" required>
              <label for="password" class="floatLabel">รหัสผ่าน</label>
        </div>

        <div class="user-box"> 
              <input id="confirm_password" name="confirm_password" type="password" required>
              <label for="confirm_password" class="floatLabel">ยืนยันรหัสผ่าน</label>
        </div>    

        <div class="user-box">
            <input id="tel" name="tel" type="text" required>
            <label for="tel" class="floatLabel">เบอร์โทรศัพท์</label>
        </div>

        <div class="user-box">
            <label for="role" class="floatLabel">บทบาท</label>
            <br/><br/>
            <select id="role" name="role" required>
                <option value="empty"></option>
                <option value="ผู้ลงเทรด">ผู้ลงเทรด</option>
                <option value="ผู้ขอเทรด">ผู้ขอเทรด</option>
              </select>
        </div>

        <div class="user-box">
          <input type="hidden" id="status" name="status" value="ปกติ">
        </div>

        <center>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              <input type="submit" value="สร้างบัญชีของฉัน" id="submit" class="button">
            </a>
</form>
</div>
        </center> 
</body>
</html>