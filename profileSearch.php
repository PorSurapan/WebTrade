<?php
    session_start();

    $name = $_GET["name"];
    
    $conn=mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");

    if ($name != null)
        $sql="SELECT username FROM profiles WHERE username LIKE '$name%'";
    else
        $sql="SELECT username FROM profiles WHERE id = 0";

    $rs=$conn->query($sql);

    $all = "";
    while($row = $rs->fetch_assoc()) {
        $all .= $row['username'] . ",";
    }
    echo $all;

    $conn->close();
?>