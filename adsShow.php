<?php
    session_start();

    $id = $_POST["id"];
    $show = "แสดง";
    $hide = "ซ่อน";
    
    $conn=mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");
    $sql = "SELECT id FROM advertising ORDER BY id";

    $rs=$conn->query($sql);
    while($row = $rs->fetch_assoc())
    {
        $curID = $row['id'];
        if ($curID == $id) {
            $sql = "UPDATE advertising SET hide = '$show' WHERE id = '$curID'";
            $conn->query($sql);
        }
        else
        {
            $sql = "UPDATE advertising SET hide = '$hide' WHERE id = '$curID'";
            $conn->query($sql);
        }

    }
    $conn->close();
    header("Location: main_ads.php");
?>