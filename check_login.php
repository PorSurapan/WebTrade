<?php
    session_start();
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $conn=mysqli_connect("localhost", "root", "","trader");
    $conn->query("SET NAMES UTF8");
    $sql = "SELECT * FROM profiles WHERE username = '$username' AND password = '$password'";
    $rs = $conn->query($sql);

    if(!$rs || mysqli_num_rows($rs) == 0) {
        //header("Location: login.html");
        echo '<script type="text/javascript">';
        echo 'if(!alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!")) document.location = "login.html";';
        echo '</script>';
    }
    else
    {
        while($row = $rs->fetch_assoc()) {
            $role = $row['roles'];
            $username = $row['username'];
            $id = $row['id'];
            $status = $row['status'];

            $_SESSION['logged'] = true;
            $_SESSION["s_id"] = $id;
			$_SESSION["s_username"] = $username;
            $_SESSION["s_role"] = $role;

            $conn->close();

            if ($status == "ปกติ") {
                if ($role == "แอดมิน")
			        header("Location: main.php");
                else
                    header("Location: home.php");
            }
            else if ($status == "ถูกระงับ")
            {
                echo '<script type="text/javascript">';
                echo 'if(!alert("ขออภัย บัญชีนี้ถูกระงับชั่วคราว")) document.location = "login.html";';
                echo '</script>';
            }
            else if ($status == "ปิดบัญชี")
            {
                echo '<script type="text/javascript">';
                echo 'if(!alert("ขออภัย บัญชีนี้ถูกปิดไปแล้ว")) document.location = "login.html";';
                echo '</script>';
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'if(!alert("ขออภัย บัญชีนี้ถูกแบนถาวร")) document.location = "login.html";';
                echo '</script>';
            }
        }
    }
?>