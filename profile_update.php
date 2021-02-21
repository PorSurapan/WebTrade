<?php
    session_start();
    
    $id = $_POST['uID'];
    $name = $_POST['username'];
    $pwd = $_POST['uPwd'];
    $role = $_POST['role'];
    $tel = $_POST['tel'];
    $pic = $_FILES['profileImage']['name'];
    $status = $_POST['status'];

    if ($pic != null || $pic != "")
    {
        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "UPDATE profiles SET username = '$name', 
                                    password = '$pwd', 
                                    roles = '$role', 
                                    tel = '$tel', 
                                    photo = '$pic', 
                                    status = '$status' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            if (file_exists("resource/" . $_FILES["profileImage"]["name"])){
                echo $_FILES["profileImage"]["name"] . " Already exists. <br />";
            } else {
                move_uploaded_file($_FILES["profileImage"]["tmp_name"], "resource/" . $_FILES["profileImage"]["name"]);
            }

            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main_profiles.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
    else
    {
        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "UPDATE profiles SET username = '$name', 
                                    password = '$pwd', 
                                    roles = '$role', 
                                    tel = '$tel', 
                                    status = '$status' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main_profiles.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
?>