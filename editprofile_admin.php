<?php
session_start();
if(isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
  include("header_admin.html");
else
  header("Location: login.html");
?>

<style>
.button {
  border: none;
  color: black;
  padding: 10px 30px;
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
    <title>Trade - แก้ไขข้อมูลส่วนตัว</title>
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


<div class="login-box">
  <h2><font color="#8A0041">แก้ไขข้อมูลส่วนตัว</h2></font>
  <form action="profile_admin_change.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
    <input id="photo" name="photo" type="file" required>
    </div>
    <div class="user-box">
    <input id="username" name="username" type="text" value=<?php echo $result['username'] ?> required>
      <label>ชื่อผู้ใช้</label>
    </div>
    <div class="user-box">
    <input id="password" name="password" type="password" required>
      <label>รหัสผ่าน</label>
    </div>
    <div class="user-box">
    <input id="confirm_password" name="confirm_password" type="password" required>
      <label>ยืนยันรหัสผ่าน</label>
    </div>
    <div class="user-box">
    <input id="tel" name="tel" type="text" value=<?php echo $result['tel'] ?> required>
      <label>เบอร์โทรศัพท์</label>
    </div>
    <div class="user-box">
    <input id="role" name="role" type="text" value=<?php echo $result['roles'] ?> readonly>
      <?php } ?>
    </div>
    <center>
      <a>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="บันทึกข้อมูล" id="submit" class="button">
    </a>
  </form>
</div>
    </center>
</form>
</body>
</html>