<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true)
    include("header_sender.html");
?>

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
    <link rel="stylesheet" href = "editprofile_css.css">
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <!-- test -->
</head>
<body>

<?php
	
	$con = mysqli_connect("localhost", "root", "");
	if(!$con){
		die("Could not connect: " . mysqli_error());
	}
	mysqli_select_db($con, "trader");
	
	$sql = "SELECT * FROM profiles WHERE username = " . " '" . $_SESSION['s_username'] . "' ";
	
	$row = mysqli_query($con, $sql);
	if(!$row)
			die('Error query: ' . mysqli_error());
?>

	<?php while($result = mysqli_fetch_array($row)){ ?>

<form action="editprofile.php" method="post" enctype="multipart/form-data">
    <h2>แก้ไขข้อมูลส่วนตัว</h2>

          <p>
              <label for="photo" class="floatLabel">อัพโหลด</label>
              <br/><br/>
              <input id="photo" name="photo" type="file" required>
          </p>
          <p>
              <label for="username" class="floatLabel">ชื่อผู้ใช้</label>
              <input id="username" name="username" type="text" value=<?php echo $result['username'] ?> required>
          </p>
          <p>
              <label for="password" class="floatLabel">รหัสผ่าน</label>
              <input id="password" name="password" type="password" required>
              
          </p>
           <p>
              <label for="confirm_password" class="floatLabel">ยืนยันรหัสผ่าน</label>
              <input id="confirm_password" name="confirm_password" type="password" required>
              
          <p>
            <label for="tel" class="floatLabel">เบอร์โทรศัพท์</label>
            <input id="tel" name="tel" type="text" value=<?php echo $result['tel'] ?> required>
          </p>
          <p>
            <label for="role" class="floatLabel">บทบาท</label>
            <br/><br/>
            <select id="role" name="role" ?> required>
                
                <option value="sender" <?php if($result['roles']=="sender") echo "selected" ?>>sender</option>
                <option value="receiver" <?php if($result['roles']=="receiver") echo "selected" ?>>receiver</option>
              </select>
          </p>
          <?php } ?>
          <p>
              <input type="submit" value="บันทึกข้อมูล" id="submit">
          </p>
		  
      </form>
</body>
</html>