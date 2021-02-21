<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_username'] == true){
		include("header_admin.html");
	}
?>

<html>
<head>
    <title>ข้อมูลส่วนตัว</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.container { 
  height: 500px;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background: #141e30;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: blue;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 20px;
}

</style>

</head>

<body style="background-color:#243b55">
<div class="container">
  <div class="center">
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
	
	<center>	


<font color="white"><u><h2 style="text-align:center">ข้อมูลส่วนตัวแอดมิน</h2></u></font>

<div class="card">
<?php
		echo " <font color= 'black'><img src='./resource/" .$result['photo']. "' width='100%'/></font>";
	?>

  <h1><?php
					echo  " <font color= 'white'>".$result['username'];
					?></h1>

  <p class="title"><?php
					echo " <font color= 'white'>".$result['roles']."</font>";
					?></p>

  <p><?php
					echo " <font color= 'white'>".$result['tel']."</font>";
					?></p>

  <p><button onclick="location.href='editprofile_admin.php';">แก้ไขโปรไฟล์</button></p>
</div>
<?php } ?>

</body>
</html>