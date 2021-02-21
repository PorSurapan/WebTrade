<?php
    session_start();

    $word = $_GET["word"];
    
    $conn = mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");

    if ($word != null)
        $sql = "SELECT text FROM dashboard WHERE text LIKE '%$word%'";
    else
        $sql = "SELECT text FROM dashboard WHERE id = 0";

    $rs = $conn->query($sql);

    $all = "";
    while($row = $rs->fetch_assoc()) {
        $all .= $row['text'] . "^";
    }
    echo $all;

    $conn->close();
?>