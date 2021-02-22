<?php
    session_start();
    
    $id = $_POST['dID'];
    $uID = $_POST['userID'];
    $txt = $_POST['txt'];
    $date = $_POST['date'];
    $pic = $_FILES['postImage']['name'];
    $hide = $_POST['hide'];

    if ($pic != null || $pic != "")
    {
        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "UPDATE dashboard SET text = '$txt', 
                                    date = '$date', 
                                    picture = '$pic', 
                                    hide = '$hide' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            if (file_exists("resource/" . $_FILES["postImage"]["name"])){
                echo $_FILES["postImage"]["name"] . " Already exists. <br />";
            } else {
                move_uploaded_file($_FILES["postImage"]["tmp_name"], "resource/" . $_FILES["postImage"]["name"]);
            }

            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main_dashboard.php";';
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
        $sql = "UPDATE dashboard SET text = '$txt', 
                                    date = '$date',  
                                    hide = '$hide' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main_dashboard.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
?>