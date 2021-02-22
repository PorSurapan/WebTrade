<?php
    session_start();

    $date = $_GET["date"];
    
    $conn=mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");

    if ($date != null)
        $sql="SELECT date FROM advertising WHERE date LIKE '%$date%'";
    else
        $sql="SELECT date FROM advertising WHERE id = 0";

    $rs=$conn->query($sql);

    $all = "";
    while($row = $rs->fetch_assoc()) {
        $all .= $row['date'] . ",";
    }
    echo $all;

    $conn->close();
?>