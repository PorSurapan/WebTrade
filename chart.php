<?php
session_start();
	if(isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("config_header.php");
	else
        header("Location: login.html");
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="edit_form.css">
 <meta charset="utf-8">
 <title>Trade - ข้อมูลเชิงลึก</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
 
 
       function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
 
       ['ผู้ลงของเทรด','ID'],
 
 
 
        <?php 

                    $id = $_SESSION['s_id'];

                    $con = mysqli_connect('localhost','root','','trader');
        			$sql = "SELECT * FROM products WHERE owner = $id";
        			$rs = $con->query($sql);

        			foreach($rs as $rs_c){

        			echo "['".$rs_c['owner']."',".$rs_c['id']."],";

        			 }
        ?> 
 
        ]);
                     
        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'จำนวนลงสินค้า',
                    },
          bars: 'horizontal', // Required for Material Bar Charts.
          
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
      <br/><br/>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>