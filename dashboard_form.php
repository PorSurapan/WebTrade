<?php
session_start();
	if(isset($_SESSION['logged']) && $_SESSION['s_id'] == true)
    include("config_header.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name='viweport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <link rel="stylesheet" href = "form_css.css">
    <title>กระดานรีวิว</title>
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

<script>
  var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
  document.getElementById("currentDateTime").value = dateTime;
</script>

</head>
<body> 
<div class="login-box">
    <h2>กระดานรีวิว</h2>
<form action="dashboard.php" method="post" enctype="multipart/form-data">
        <div class="user-box">
              <label for="picture" class="floatLabel">รูปภาพสินค้า</label>
              <br/><br/>
              <input id="picture" name="picture" type="file" required>
        </div>

        <div class="user-box">
              <input id="description" name="description" type="text" required>  
              <label for="description" class="floatLabel">คำอธิบายสินค้า</label>
            
        </div>
          
        <div class="user-box">
          <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['s_id'];?>">
        </div>


        <div class="user-box">
          <input type="hidden" id="hide" name="hide" value="แสดงอยู่">
        </div>


        <input type="hidden" name="currentDateTime" id="currentDateTime">
<br><br>

<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
        document.getElementById("currentDateTime").value = dateTime;
</script>

        <center>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="โพสต์" id="submit" class="button">
            </a>
</form>
</div>
        </center>
</body>
</html>