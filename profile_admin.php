<?php
session_start();
	if(isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
		header("Location: login.html");
?>

<html>
<head>
    <title>Trade - ข้อมูลส่วนตัว</title>
    <link rel="stylesheet" href = "profileadmin_css.css">

</head>

<body >
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

  
<div class="infocardContainer">
  <div id="main">

  <?php
		echo "<img src='./resource/" .$result['photo']. "' width='100%'/></font>";
	?>
  </div>

  <div id="textbois">

    <h1><?php echo $result['username'];?></h1>

    <h4><?php echo $result['roles']."</font>";?></h4>

    <h4><?php echo $result['tel']."</font>";?></h4>

<div id="hotlinks">
<a href="editprofile_admin.php">
        <img id="edit" src="http://cdn.onlinewebfonts.com/svg/img_140266.png" target="_blank"></img>
      </a>
      </div>
  </div>
</div>

<?php } ?>


</body>
</html>

