<?php
    session_start();

    $name = $_GET["name"];
    
    $conn=mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");

    if ($name != null)
        $sql="SELECT name FROM products WHERE name LIKE '$name%'";
    else
        $sql="SELECT name FROM products WHERE id = 0";

    $rs=$conn->query($sql);

    $all = "";
    while($row = $rs->fetch_assoc()) {
        $all .= $row['name'] . ",";
    }
    echo $all;

    $conn->close();
?>