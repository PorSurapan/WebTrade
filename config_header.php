<?php
    $conn=mysqli_connect("localhost", "root", "","trader");
    $conn->query("SET NAMES UTF8");

    $check = isset($_SESSION['s_username']);

    
    if ($check == true)
    {
        $session = $_SESSION['s_username'];

        $sql = "SELECT * FROM profiles WHERE username = '" . $session . "'";
        $rs = $conn->query($sql);
    
        while($row = $rs->fetch_assoc()) {
            $role = $row['roles'];

            if ($role == "ผู้ลงเทรด")
                include("header_sender.html");
            else 
                include("header_receiver.html");
        }
    }
    $conn->close();
?>