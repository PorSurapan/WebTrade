<?php
session_start();
include("header_sender.html");
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="edit_form.css">
 <meta charset="utf-8">
 <title>จัดอันดับ</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
 
 
       function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
 
       ['ประเภทยอดฮิต','จำนวน'],
 
 
 
        <?php 

                    $id = $_SESSION['s_id'];

                    $con = mysqli_connect('localhost','root','','trader');
        			$sql = "SELECT * FROM chart";
        			$rs = $con->query($sql);

        			foreach($rs as $rs_c){

        			echo "['".$rs_c['category']."',".$rs_c['count']."],";

        			 }
        ?> 
 
        ]);
                     
        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'ประเภทที่นิยมลงเทรด',
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