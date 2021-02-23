<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "trader");
    $conn->query("SET NAMES UTF8");
    $sql = "SELECT * FROM profiles WHERE id = '" . $_SESSION['s_id'] . "'";
    $rs = $conn->query($sql);

    while($row = $rs->fetch_assoc()) {
        $username = $row['username'];
        $role = $row['roles'];
        $status = $row['status'];
    }

    $uArr = array($username, $role, $status);
    $uJSON = json_encode($uArr, JSON_UNESCAPED_UNICODE);
    echo $uJSON;
?>