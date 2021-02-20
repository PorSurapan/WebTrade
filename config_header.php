
<?php 
    
    $conn=mysqli_connect("localhost", "root", "","trader");
    $conn->query("SET NAMES UTF8");
    $sql = "SELECT * FROM profiles WHERE username = " . " '" . $_SESSION['s_username'] . "' ";
    $rs = $conn->query($sql);

        while($row = $rs->fetch_assoc()) {
            $role = $row['roles'];

            if ($role == "sender")
            include("header_sender.html");
            else 
            include("header_receiver.html");
        }

        $conn->close();
?>